<?php

include_once 'config/database.php';
include_once 'objects/tovar.php';
include_once 'objects/akk.php';
$database = new Database();
$db = $database->getConnection();

$tovar = new Tovar($db);
$akk = new Akk($db);
include_once 'head.php';
include_once 'slider.php';
?>
<div id="chest">
	<label class="label">
		Сундуки Minecraft
	</label>
	<div id="chest_grid">
		<?php
		$stmt = $akk->readAll();
		while($name = $stmt->fetch(PDO::FETCH_ASSOC)){
			?>

			<div class="chest hover" style="background-image: url('../content/static-image/<?php echo $name[id_akk] ?>.jpg');">
				<button class="button_active" value="<?php echo $keys[id_akk]?>">
					Перейти
				</button>
				<div>
					<?php echo $name[name]?>
				</div>
				<label>
					<?php echo $name[case_description]?>
				</label>
				<label class="price_chest">
					<?php echo $name[price_standart]." ₽"?>
				</label>
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
				<img src="content/tovar-image/<?php echo $name[name] ?>.jpg">
				<div class="tovar_black">
					
				</div>
				<a href="tovar.php?varname=<?php echo $name[id_tovar]?>" class="button_active">
					В корзину
				</a>
				<div class="discount_tovar">
					<label class="name_tovar">
						<?php echo $name[name] ?>
					</label>
					<label class="label sell_tovar">
						<? echo "-".$name[discount]."%" ?>
					</label>
					<label class="price_tovar">
						<?php echo $name[price]." ₽" ?>
					</label>
				</div>
			</div>
			<?php
		}
		print_r($name);
		?>
	</div>
</div>
<?php
include_once 'footer.php';
?>