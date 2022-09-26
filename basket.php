<?php session_start();

include_once 'config/database.php';
$database = new Database();
$db = $database->getConnection();

if(isset($_POST['buy']) && $_SESSION['auth']==1){
	$cupon = mb_strtoupper($_POST['cupon']);
	$price = $_POST['buy'];

	$allCupons = $db->query("SELECT * FROM cupon");
	while($allCupon = $allCupons->fetch(PDO::FETCH_ASSOC)){
		if($cupon == $allCupon['cupon']){
			$price_new = round($price - $price/100 * $allCupon['discount']);
			break;
		}
	}
	header("Location: buy.php?varname=$price,$price_new "); exit();
}

include_once 'objects/akk.php';
include_once 'objects/tovar.php';

$var_value = $_GET['varname'];

$tovar = new Tovar($db);
$akk = new Akk($db);


include_once 'head.php';

$stmt = $tovar->kol_basket($_SESSION['id']);
$basketOne = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt = $tovar->kol_basketTwo($_SESSION['id']);
$basketTwo = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['crossakk']) && $_SESSION['auth'] == 1){
	$var_value = $_POST['crossakk'];
	$akk_basket_delet = $akk->akk_basket_delet($_SESSION['id'],$var_value);
}

if(isset($_POST['cross']) && $_SESSION['auth'] == 1){
	$var_value = $_POST['cross'];
	$akk_basket_delet = $tovar->tovar_basket_delet($_SESSION['id'],$var_value);
}

if(isset($_POST['buy']) && $_SESSION['auth'] == 1){
	$var_value = $_POST['cross'];
	$akk_basket_delet = $tovar->tovar_basket_delet($_SESSION['id'],$var_value);
}
?>
<div id="basket">
	<div id="basket_one">
		<label class="label_basket">
			Мой заказ <b><?php echo (Count($basketOne)+Count($basketTwo));?></b>
		</label>
		<hr>
		<?php 
		$zakazy = $tovar->zakazy($_SESSION['id']);
		$price = 0;
		while($zakaz = $zakazy->fetch(PDO::FETCH_ASSOC)){
			$price+=$zakaz[price]
			?>
			<div class="tovar_basket">
				<div class="zakaz_img" style="background-image: url('content/tovar-image/<?php echo $zakaz[name] ?>.jpg')">

				</div>
				<div class="zakaz_info">
					<label >
						<?php echo $zakaz[name] ?>
					</label>
					<label class="info_zakaz">
						<?php echo $zakaz[price]." ₽"?>
						<?php echo "<b>".round($zakaz[price] + (($zakaz[price]/100) * 100-$zakaz[discount]))." ₽</b>"?>
						<?php echo "<label>-".$zakaz[discount]." ₽</label>"?>
					</label>
					<label id="description">
						<?php echo $zakaz[description]?>
					</label>
				</div>
				<form action="#" method="POST">
					<img src="content/icon/cross.png" class="cross_img">
					<input type="submit" name="cross" class="cross" value="<?php echo $zakaz[id_tovar]?>">
				</form>
			</div>
			<hr>
			<?php
		}
		?>
		<?php 
		$zakazy = $akk->zakazy_akk($_SESSION['id']);
		while($zakaz = $zakazy->fetch(PDO::FETCH_ASSOC)){
			$price+=$zakaz[price_standart]
			?>
			<div class="tovar_basket">
				<div class="zakaz_img" style="background-image: url('content/static-image/<?php echo $zakaz[id_akk]?>.jpg')">
					
				</div>
				<div class="zakaz_info">
					<label >
						<?php echo $zakaz[name] ?>
					</label>
					<label class="info_zakaz">
						<?php echo $zakaz[price_standart]." ₽"?>
						<?php echo "<b>".round($zakaz[price_standart] + (($zakaz[price_standart]/100) * 100-$zakaz[discount]))." ₽</b>"?>
						<?php echo "<label>-".$zakaz[discount]." ₽</label>"?>
					</label>
					<label id="description">
						<?php echo $zakaz[description]?>
					</label>
				</div>
				<form action="#" method="POST">
					<img src="content/icon/cross.png" class="cross_img">
					<input type="submit" name="crossakk" class="cross" value="<?php echo $zakaz[id_akk]?>">
				</form>
			</div>
			<hr>
			<?php
		}
		?>
	</div>


	<div id="basket_two">
		<label class="label_basket">
			Итог <b><?php echo $price?> ₽</b>
		</label>
		<form action="#" method="POST">
			<input type="text" name="cupon" placeholder ="Ввести купон" >
			<hr>

			<label class="sss buttonn">
				Купить
			</label>
			<input type="submit" name="buy" class="sub_buy" value="<?php echo $price?>">

		</form>
	</div>
</div>
<?php
include_once 'footer.php';
?>
