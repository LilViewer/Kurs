<?php session_start();

include_once 'config/database.php';
$database = new Database();
$db = $database->getConnection();

if(isset($_POST['but_search'])){

  $text = mb_strtoupper($_POST[search]);

  $search = $db->query("SELECT id_tovar
        FROM tovar 
        WHERE name = '".$text."'");
  $searchs = $search->fetch(PDO::FETCH_ASSOC);
  if($searchs[id_tovar]>=1){
    header("Location: tovar.php?varname=$searchs[id_tovar] "); exit();
  }

}

include_once 'objects/tovar.php';
include_once 'objects/akk.php';


$tovar = new Tovar($db);
$akk = new Akk($db);
include_once 'head.php';

include_once 'slider.php';




?>
<div id="chest">
	<label class="label">
		аккаунты Minecraft
	</label>
	<div id="chest_grid">
		<?php
		$stmt = $akk->readAll();
		while($name = $stmt->fetch(PDO::FETCH_ASSOC)){
			$readAkk = $akk->readAkk($name[id_akk]); 
			$key = $readAkk->fetchAll(PDO::FETCH_ASSOC);
			?>
			<div class="chest hover" style="background-image: url('../content/static-image/<?php echo $name[id_akk] ?>.jpg');">
				<a class='aaa' href="tovar_minecraft.php?varname=<?php echo $name[id_akk]?> ">
					<form action="#" method="POST" class="gf">
						<input  type="submit" name="buy_b_akk" value="<?php echo $name[id_akk] ?>"   class=" ss" >
						<label class="button_active <?php echo (COUNT($key) >= 1)? 'button':'but_nonen' ?>">
							В корзину
						</label>
					</form>
					<div class="name_chest">
						<?php echo $name[name]?>
					</div>
					<label>
						<?php echo $name[case_description]?>
					</label>
					<label class="price_chest">
						<?php echo $name[price_standart]." ₽"?>
					</label>
				</a>
			</div>
			<?php
		}
		?>
		<div>
			
		</div>
		<img src="content/static-image/Group342.png" width="300px" >
	</div>
</div>
<div id="block_index">
	<label class="label">
		Все товары
	</label>
	<div id="block_index_grid">
		<?php
		$stmt = $tovar->readAll();
		while($name = $stmt->fetch(PDO::FETCH_ASSOC)){
			?>
			<div class="tovar hover" >
				<a href="tovar.php?varname=<?php echo $name[id_tovar]?>">
					<img class="tovar_img" src="content/tovar-image/<?php echo $name[name] ?>.jpg" >
					<div class="tovar_black">

					</div>
					<?php 

					$stmtt = $tovar->readKey($name[id_tovar]); 
					$key = $stmtt->fetchAll(PDO::FETCH_ASSOC);
					
					?>
					<form action="#" method="POST" class="gf">
						<input  type="submit" name="buy_bs" value="<?php echo $name[id_tovar] ?>"   class=" ss " >
						<label class=" button_active <?php echo (COUNT($key) >= 1)? 'button':'but_nonen' ?>">
							В корзину
						</label>
					</form>
					<div class="discount_tovar">
						<label class="name_tovar">
							<?php echo $name[name] ?>
						</label>
						<label class="label sell_tovar">
							<?php echo "-".$name[discount]."%"?>
						</label>
						<label class="price_tovar">
							<?php echo $name[price]." ₽" ?>
						</label>
					</div>
				</a>
			</div>
			<?php
		}
		if(isset($_POST['buy_b_akk']) && $_SESSION['auth'] == 1){
			$var_value = $_POST['buy_b_akk'];
			$akk_basket_yes = $akk->akk_basket_yes($_SESSION['id'],$var_value);
			$akk_basket_yes = $akk_basket_yes->fetch(PDO::FETCH_ASSOC);
			$stmtt = $akk->readAkk($var_value); 
			$key = $stmtt->fetchAll(PDO::FETCH_ASSOC);
			if (($akk_basket_yes == null) && (+COUNT($key)>=1)) {
				$create_basket = $akk->create_basket_akk($_SESSION['id'],$var_value);
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
			}
		}
		?>
	</div>
</div>
<?php
include_once 'footer.php';
?>