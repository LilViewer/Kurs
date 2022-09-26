<?php session_start();

include_once 'config/database.php';
$database = new Database();
$db = $database->getConnection();
include_once 'objects/akk.php';
include_once 'objects/tovar.php';

$tovar = new Tovar($db);
$akk = new Akk($db);

if(isset($_POST['buy_b_akk']) && $_SESSION['auth'] == 1){
	$var_value = $_POST['buy_b_akk'];
	$akk_basket_yes = $akk->akk_basket_yes($_SESSION['id'],$var_value);
	$akk_basket_yes = $akk_basket_yes->fetch(PDO::FETCH_ASSOC);
	$stmtt = $akk->readAkk($var_value); 
	$key = $stmtt->fetchAll(PDO::FETCH_ASSOC);
	if (($akk_basket_yes == null) && (+COUNT($key)>=1)) {
		$create_basket = $akk->create_basket_akk($_SESSION['id'],$var_value);
		$akk_basket_delet = $akk->akk_hearth_delet($_SESSION['id'],$var_value);
	}
}

if(isset($_POST['buy_bs']) && $_SESSION['auth'] == 1){
	$var_value = $_POST['buy_bs'];
	$tovar_basket_yes = $tovar->tovar_basket_yes($_SESSION['id'],$var_value);
	$tovar_basket_yes = $tovar_basket_yes->fetch(PDO::FETCH_ASSOC);
	$stmtt = $tovar->readKey($var_value); 
	$key = $stmtt->fetchAll(PDO::FETCH_ASSOC);
	if (($tovar_basket_yes == null) && (+COUNT($key)>=1)) {
		$create_basket = $tovar->create_basket($_SESSION['id'],$var_value);
		$akk_basket_delet = $tovar->tovar_hearth_delet($_SESSION['id'],$var_value);
	}
}






include_once 'head.php';

$stmt = $tovar->kol_hearth($_SESSION['id']);
$basketOne = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt = $tovar->kol_hearthTwo($_SESSION['id']);
$basketTwo = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['crossakk']) && $_SESSION['auth'] == 1){
	$var_value = $_POST['crossakk'];
	$akk_basket_delet = $akk->akk_hearth_delet($_SESSION['id'],$var_value);
}

if(isset($_POST['cross']) && $_SESSION['auth'] == 1){
	$var_value = $_POST['cross'];
	$akk_basket_delet = $tovar->tovar_hearth_delet($_SESSION['id'],$var_value);
}
?>
<div id="basket">
	<div id="basket_one">
		<label class="label_basket">
			Список желаемого <b><?php echo (Count($basketOne)+Count($basketTwo));?></b>
		</label>
		<hr>
		<?php 
		$zakazy = $tovar->hearth($_SESSION['id']);
		$price = 0;
		while($zakaz = $zakazy->fetch(PDO::FETCH_ASSOC)){
			$price+=$zakaz[price];
			$stmtt = $tovar->readKey($zakaz[id_tovar]); 
			$key = $stmtt->fetchAll(PDO::FETCH_ASSOC);
			?>
			<div class="tovar_basket ">
				<div class="zakaz_img hover" style="background-image: url('content/tovar-image/<?php echo $zakaz[name] ?>.jpg')">
					<form action="#" method="POST" class="gff">
						<input  type="submit" name="buy_bs" value="<?php echo $zakaz[id_tovar] ?>"   class=" ss" >
						<label class="button_active smal <?php echo (COUNT($key) >= 1)? 'button':'but_nonen' ?>">
							В корзину
						</label>
					</form>
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
		$zakazy = $akk->hearth_akk($_SESSION['id']);
		while($zakaz = $zakazy->fetch(PDO::FETCH_ASSOC)){
			$price+=$zakaz[price_standart];
			$readAkk = $akk->readAkk($zakaz[id_akk]); 
			$key = $readAkk->fetchAll(PDO::FETCH_ASSOC);
			?>
			<div class="tovar_basket ">
				<div class="zakaz_img hover" style="background-image: url('content/static-image/<?php echo $zakaz[id_akk] ?>.jpg')">
					<form action="#" method="POST" class="gff">
						<input  type="submit" name="buy_b_akk" value="<?php echo $zakaz[id_akk] ?>"   class=" ss" >
						<label class="button_active smal <?php echo (COUNT($key) >= 1)? 'button':'but_nonen' ?>">
							В корзину
						</label>
					</form>
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


	<div id="basket_two_two">
		<label class="label_basket_two">
			Итог <b><?php echo $price?> ₽</b>
		</label>
	</div>
</div>
<?php
include_once 'footer.php';
?>
