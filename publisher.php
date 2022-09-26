<?php session_start();
include_once 'config/database.php';
$database = new Database();
$db = $database->getConnection();
include_once 'objects/tovar.php';
$tovar = new Tovar($db);
include_once 'head.php';
$var_value = $_GET['varname'];
var_dump($var_value);

if(isset($_POST['but_img']) && $_SESSION['auth'] == 1){

	$tovar_hearth_yes = $tovar->tovar_hearth_yes($_SESSION['id'],$var_value);
	$tovar_hearth_yes = $tovar_hearth_yes->fetch(PDO::FETCH_ASSOC);
	if ($tovar_hearth_yes == null) {
		$create_heart = $tovar->create_hearth($_SESSION['id'],$var_value);
	}
	else{

		$tovar_hearth_delet = $tovar->tovar_hearth_delet($_SESSION['id'],$var_value);	
	}
}


if(isset($_POST['buy_b']) && $_SESSION['auth'] == 1){
	$tovar_basket_yes = $tovar->tovar_basket_yes($_SESSION['id'],$var_value);
	$tovar_basket_yes = $tovar_basket_yes->fetch(PDO::FETCH_ASSOC);
	if ($tovar_basket_yes == null) {
		$create_basket = $tovar->create_basket($_SESSION['id'],$var_value);
	}
}
?>
<div id="publisher">
	
	<div id="block_index_grid">
		<?php
		$stmt = $tovar->readPublisherCat($var_value);
		while($name = $stmt->fetch(PDO::FETCH_ASSOC)){
			// print($name);
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