<?php 
include_once 'head.php';
include_once 'config/database.php';
include_once 'objects/tovar.php';
$database = new Database();
$db = $database->getConnection();
$var_value = $_GET['varname'];
$tovar = new Tovar($db);
$all = $tovar->slider_tovar($var_value);
$all = $all->FETCH(PDO::FETCH_ASSOC);
include_once 'objects/akk.php';
$akk = new Akk($db);






?>

<div id="editing_block">
	<form action="#" method="post">
		<div class="editing_edit">
			<label>данные</label>
			<div>
				<input type="text" name="log" placeholder="log">
				<input type="text" name="pas" placeholder="pas">
			</div>
		</div>
		<input type="submit" class="button" name="key_but" value="добавить данные">
	</form>
	<hr>
	<form action="#" method="post">
		<div class="editing_edit">
			<label>Связь</label>
			<select multiple name="Akk[]" size="5">
				<?php 
				$chet = null;
				$readAkkAll = $akk->readAkkAll();
				while ($readAkkAlls = $readAkkAll->FETCH(PDO::FETCH_ASSOC)) {
					$readAkksvaz = $akk->readAkksvaz();
					while ($readAkksvazs = $readAkksvaz->fetch(PDO::FETCH_ASSOC)) {
						if($readAkkAlls[id_log_akk] == $readAkksvazs[id_log_akk]){
							$chet = $readAkksvazs[id_log_akk];
						}
					}
					if($chet == $readAkkAlls[id_log_akk]){
						continue;
					}
					?>

					<option value="<?php echo $readAkkAlls[id_log_akk] ?>">
						<?php echo "L: ".$readAkkAlls[log]." P: ".$readAkkAlls[pas] ?>
					</option>
					<?php
				}
				?>
			</select>
		</div>
		<input type="submit" class="button" name="key_but_key" value="добавить данные">
		<input type="submit" class="button" name="key_but_delet" value="удалить данные для товара">
	</form>
</div>

<?php
if (isset($_POST['key_but'])) {
	$CreateAkkOne = $akk->CreateAkkOne($_POST['log'],$_POST['pas']);
	$SELECTAkk = $akk->SELECTAkk($_POST['log'],$_POST['pas']);
	$SELECTAkks = $SELECTAkk->fetch(PDO::FETCH_ASSOC);
	$CreateAkkTwos = $akk->CreateAkkTwo($var_value,$SELECTAkks[id_log_akk]);
}
if (isset($_POST['key_but_delet'])) {
	$Deletakk = $akk->Deletakk($var_value);
}
if (isset($_POST['key_but_key'])) {
	$chet = null;
	foreach ($_POST['Akk'] as $key) {
		$readTovarAkk = $akk->readTovarAkk($var_value);
		while ($readTovarAkks = $readTovarAkk->FETCH(PDO::FETCH_ASSOC)) {
			if($key == $readTovarAkks[id_log_akk]){
				$chet = $readTovarAkks[id_log_akk]; 
			}
		}
		if ($chet == $key) {
			continue;
		}
		else{
			$UpdateTovarKey = $akk->UpdateTovarKey($var_value,$key);
		}
	}
}

include_once 'footer.php';
?>