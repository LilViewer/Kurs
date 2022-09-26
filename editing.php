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




if(isset($_POST['editing_but'])){
	$err = [];

	if(strlen($_POST['name']) == 0)
	{
		$err[] = "Название пустое";
	}
	if($_POST['price'] <= 0)
	{
		$err[] = "цена неправильная";
	}
	if($_POST['discount'] <= 0)
	{
		$err[] = "Скидка неправильная";
	}
	if($_POST['date_release'] == 0)
	{
		$err[] = "Дата неправильная";
	}
	if(strlen($_POST['description']) == 0)
	{
		$err[] = "Описание пустое";
	}

	if(COUNT($_POST['genre']) == 0){
		$err[] = "ЖАнр отсуствует";
	}
	if(COUNT($_POST['publisher']) == 0){
		$err[] = "издатель отсуствует";
	}
	if(COUNT($_POST['developer']) == 0){
		$err[] = "разработчик отсуствует";
	}
	if(strlen($_POST['min_OS']) == 0)
	{
		$err[] = "поле min_OS пустое";
	}
	if(strlen($_POST['min_Processor']) == 0)
	{
		$err[] = "поле min_Processor пустое";
	}
	if($_POST['min_RAM'] == 0)
	{
		$err[] = "поле min_RAM пустое";
	}
	if(strlen($_POST['min_Video_Card']) == 0)
	{
		$err[] = "поле min_Video_Card пустое";
	}
	if(strlen($_POST['rec_OS']) == 0)
	{
		$err[] = "поле rec_OS пустое";
	}
	if(strlen($_POST['rec_Processor']) == 0)
	{
		$err[] = "поле rec_Processor пустое";
	}
	if($_POST['rec_RAM'] == 0)
	{
		$err[] = "поле rec_RAM пустое";
	}
	if(strlen($_POST['rec_Video_Card']) == 0)
	{
		$err[] = "поле rec_Video_Card пустое";
	}
	if($_POST['Size'] == 0)
	{
		$err[] = "поле Size пустое";
	}
	if(count($err) != 0){
		print "<b>При регистрации произошли следующие ошибки:</b><br>";
		foreach($err AS $error)
		{
			print $error."<br>";
		}
	}
	else{
		$update = $tovar->UpdateTovar($var_value,$_POST['name'],$_POST['price'],$_POST['discount'],$_POST['date_release'],$_POST['description'],$_POST['min_OS'],$_POST['min_Processor'],$_POST['min_RAM'],$_POST['min_Video_Card'],$_POST['rec_OS'],$_POST['rec_Processor'],$_POST['rec_RAM'],$_POST['rec_Video_Card'],$_POST['Size']);

		$chet = null;
		$deletGenre = $tovar->DeletGenre($var_value);
		foreach ($_POST['genre'] as $key) {
			$readGenre = $tovar->readGenre($var_value);
			while ($readGenres = $readGenre->FETCH(PDO::FETCH_ASSOC)) {
				if($key == $readGenres[id_genre]){
					$chet = $readGenres[id_genre]; 
				}
			}
			if ($chet == $key) {
				continue;
			}
			else{
				$UpdateTovarGenre = $tovar->UpdateTovarGenre($var_value,$key);
			}
		}

		$chet = null;
		$deletPublisher = $tovar->DeletPublisher($var_value);
		foreach ($_POST['publisher'] as $key) {
			$readPublisher = $tovar->readPublisher($var_value);
			while ($readPublishers = $readPublisher->FETCH(PDO::FETCH_ASSOC)) {
				if($key == $readPublishers[id_publisher]){
					$chet = $readPublishers[id_publisher]; 
				}
			}
			if ($chet == $key) {
				continue;
			}
			else{
				$UpdateTovarPublisher = $tovar->UpdateTovarPublisher($var_value,$key);
			}
		}

		$chet = null;
		$deletDeveloper = $tovar->DeletDeveloper($var_value);
		foreach ($_POST['developer'] as $key) {
			$readDeveloper = $tovar->readDeveloper($var_value);
			while ($readDevelopers = $readDeveloper->FETCH(PDO::FETCH_ASSOC)) {
				if($key == $readDevelopers[id_developer]){
					$chet = $readDevelopers[id_developer]; 
				}
			}
			if ($chet == $key) {
				continue;
			}
			else{
				$UpdateTovarPublisher = $tovar->UpdateTovarDeveloper($var_value,$key);
			}
		}

		// foreach ($_POST['genre'] as $key) {

		// }
		



	}
}



?>

<div id="editing_block">
	<form action="#" method="post">
		<div class="editing_edit">
			<label>Название</label>
			<input type="text" name="name" value="<?php echo $all[name] ?>">
		</div>
		<div class="editing_edit">
			<label>Цена</label>
			<input type="number" name="price" value="<?php echo $all[price] ?>">
		</div>
		<div class="editing_edit">
			<label>Скидка</label>
			<input type="number" name="discount" value="<?php echo $all[discount] ?>">
		</div>
		<div class="editing_edit">
			<label>Дата релиза(формат гггг-мм-дд)</label>
			<input type="text" name="date_release" value="<?php echo $all[date_release] ?>">
		</div>
		<div class="editing_edit">
			<label>Описание</label>
			<textarea  name="description"><?php echo $all[description] ?></textarea>
		</div>

		<div class="editing_edit">
			<label>
				Жанры
			</label>
			<select multiple='multiple' name="genre[]" size="5">
				<?php 
				$chet = null;
				$allgenre = $tovar->AllGenre();
				while ($allgenres = $allgenre->FETCH(PDO::FETCH_ASSOC)) {
					$genre = $tovar->readGenre($var_value);
					while ($genres = $genre->fetch(PDO::FETCH_ASSOC)) {
						if($genres[id_genre] == $allgenres[id_genre]){
							?>
							<option selected value="<?php echo $allgenres[id_genre] ?>">
								<?php echo $allgenres[name_genre] ?>
							</option>
							<?php
							$chet = $genres[id_genre];
						}
					}
					if($chet == $allgenres[id_genre]){
						continue;
					}
					?>

					<option value="<?php echo $allgenres[id_genre] ?>">
						<?php echo $allgenres[name_genre] ?>
					</option>
					<?php
				}
				?>
			</select>
		</div>

		<div class="editing_edit">
			<label>
				Издатель
			</label>
			<select multiple name="publisher[]" size="5">
				<?php 
				$chet = null;
				$allpublisher = $tovar->AllPublisher();
				while ($allpublishers = $allpublisher->FETCH(PDO::FETCH_ASSOC)) {
					$publisher = $tovar->readPublisher($var_value);
					while ($publishers = $publisher->fetch(PDO::FETCH_ASSOC)) {
						if($publishers[id_publisher] == $allpublishers[id_publisher]){
							?>
							<option selected value="<?php echo $allpublishers[id_publisher] ?>">
								<?php echo $allpublishers[name_publisher] ?>
							</option>
							<?php
							$chet = $publishers[id_publisher];
						}
					}
					if($chet == $allpublishers[id_publisher]){
						continue;
					}
					?>

					<option value="<?php echo $allpublishers[id_publisher] ?>">
						<?php echo $allpublishers[name_publisher] ?>
					</option>
					<?php
				}
				?>
			</select>
		</div>


		<div class="editing_edit">
			<label>
				Разработчик
			</label>
			<select multiple name="developer[]" size="5">
				<?php 
				$chet = null;
				$alldeveloper = $tovar->AllDeveloper();
				while ($alldevelopers = $alldeveloper->FETCH(PDO::FETCH_ASSOC)) {
					$developer = $tovar->readDeveloper($var_value);
					while ($developers = $developer->fetch(PDO::FETCH_ASSOC)) {
						if($developers[id_developer] == $alldevelopers[id_developer]){
							?>
							<option selected value="<?php echo $alldevelopers[id_developer] ?>">
								<?php echo $alldevelopers[name_developer] ?>
							</option>
							<?php
							$chet = $developers[id_developer];
						}
					}
					if($chet == $alldevelopers[id_developer]){
						continue;
					}
					?>

					<option value="<?php echo $alldevelopers[id_developer] ?>">
						<?php echo $alldevelopers[name_developer] ?>
					</option>
					<?php
				}
				?>
			</select>
		</div>
		<div class="editing_edit">
			<label>Мин ОС</label>
			<input type="text" name="min_OS" value="<?php echo $all[min_OS] ?>">
		</div>
		<div class="editing_edit">
			<label>min_Processor</label>
			<input type="text" name="min_Processor" value="<?php echo $all[min_Processor] ?>">
		</div>
		<div class="editing_edit">
			<label>min_RAM</label>
			<input type="number" name="min_RAM" value="<?php echo $all[min_RAM] ?>">
		</div>
		<div class="editing_edit">
			<label>min_Video_Card</label>
			<input type="text" name="min_Video_Card" value="<?php echo $all[min_Video_Card] ?>">
		</div>
		<div class="editing_edit">
			<label>rec_OS</label>
			<input type="text" name="rec_OS" value="<?php echo $all[rec_OS] ?>">
		</div>
		<div class="editing_edit">
			<label>rec_Processor</label>
			<input type="text" name="rec_Processor" value="<?php echo $all[rec_Processor] ?>">
		</div>
		<div class="editing_edit">
			<label>rec_RAM</label>
			<input type="number" name="rec_RAM" value="<?php echo $all[rec_RAM] ?>">
		</div>
		<div class="editing_edit">
			<label>rec_Video_Card</label>
			<input type="text" name="rec_Video_Card" value="<?php echo $all[rec_Video_Card] ?>">
		</div>
		<div class="editing_edit">
			<label>Size</label>
			<input type="number" name="Size" value="<?php echo $all[Size] ?>">
		</div>
		<input class="button" type="submit" name="editing_but" value="Внести изменения">
	</form>
	<hr>
	<div  class="editing_edit">
		<label>
			Добавить фотографии(слайдер) <!-- (только если есть название товара) -->
		</label>
		<form action="#" method="POST" enctype="multipart/form-data">
			<input  type="file" name="myscrean">
			<input class="button" type="submit" name="submit" value="добавить">
			<input class="button" type="submit" name="del_screan" value="удалить">
		</form>
	</div>
	<hr>
	<div  class="editing_edit">
		<label>
			Добавить трейлер <!-- (только если есть название товара) -->
		</label>
		<form action="#" method="POST" enctype="multipart/form-data">
			<input  type="file" name="mytrailer">
			<input class="button" type="submit" name="submit" value="добавить">
			<input class="button" type="submit" name="del_trailer" value="удалить">
		</form>
	</div>
	<hr>
	<div  class="editing_edit">
		<label>
			Добавить постер  <!-- (только если есть название товара) -->
		</label>
		<form action="#" method="POST" enctype="multipart/form-data">
			<input  type="file" name="myposter">
			<input class="button" type="submit" name="submit" value="добавить">
			<input class="button" type="submit" name="del_poster" value="удалить">
		</form>
	</div>
	<!-- <hr>
	<form action="#" method="post">
		<div class="editing_edit">
			<label>Ключ</label>
			<input type="text" name="key_text">
		</div>
		<input type="submit" name="key_but" value="добавить ключ">
	</form> -->
	<hr>
	<form action="#" method="post">
		<div class="editing_edit">
			<label>Связь</label>
			<select multiple name="tovar[]" size="5">
				<?php 
				$chet = null;
				$readKeyAll = $tovar->readKeyAll();
				while ($readKeyAlls = $readKeyAll->FETCH(PDO::FETCH_ASSOC)) {
					$readKeysvaz = $tovar->readKeysvaz();
					while ($readKeysvazs = $readKeysvaz->fetch(PDO::FETCH_ASSOC)) {
						if($readKeyAlls[id_key] == $readKeysvazs[id_key]){
							$chet = $readKeysvazs[id_key];
						}
					}
					if($chet == $readKeyAlls[id_key]){
						continue;
					}
					?>

					<option value="<?php echo $readKeyAlls[id_key] ?>">
						<?php echo $readKeyAlls[key_] ?>
					</option>
					<?php
				}
				?>
			</select>
		</div>
		<input type="submit" class="button" name="key_but_key" value="добавить ключ">
		<input type="submit" class="button" name="key_but_delet" value="удалить ключи для товара">
	</form>
	<hr>
	<form action="#" method="post">
		<div class="editing_edit">
			<label>Ключ добавить</label>
			<input type="text" name="key_text">
		</div>
		<input type="submit" class="button" name="key_but" value="добавить ключ">
	</form>
</div>

<?php
if (isset($_POST['key_but_delet'])) {
	$DeletKey = $tovar->DeletKey($var_value);
}
if (isset($_POST['key_but_key'])) {
	$chet = null;
	foreach ($_POST['tovar'] as $key) {
		$readTovarKey = $tovar->readTovarKey($var_value);
		while ($readTovarKeys = $readTovarKey->FETCH(PDO::FETCH_ASSOC)) {
			if($key == $readTovarKeys[id_key]){
				$chet = $readTovarKeys[id_key]; 
			}
		}
		if ($chet == $key) {
			continue;
		}
		else{
			$UpdateTovarKey = $tovar->UpdateTovarKey($var_value,$key);
		}
	}
}
if (isset($_POST['key_but'])) {
	$CreateKeyOne = $tovar->CreateKeyOne($_POST['key_text']);
	$SELECTKey = $tovar->SELECTKey($_POST['key_text']);
	$SELECTKeys = $SELECTKey->fetch(PDO::FETCH_ASSOC);
	$CreateKeyTwos = $tovar->CreateKeyTwo($var_value,$SELECTKeys[id_key]);
}

if(isset($_POST['del_screan'])){
	$dir='content/screan/'.$all[name];
	print_r($dir);
	array_map('unlink', glob("$dir/*.*"));
	rmdir($dir);
}
if(isset($_POST['del_trailer'])){
	$result = glob("content/trailer/".$all[name].'.'.'*');
	unlink($result[0]);
}
if(isset($_POST['del_poster'])){
	$result = glob("content/tovar-image/".$all[name].'.'.'*');
	unlink($result[0]);
}

mkdir('content/screan/'.$all[name]);
$count_screan = count(scandir('content/screan/'.$all[name].'/'))-1;
if($count_screan != 6){
	$path = 'content/screan/'.$all[name].'/'; // директория для загрузки scandir — Получает список файлов и каталогов, расположенных по указанному пути
	$ext = array_pop(explode('.',$_FILES['myscrean']['name'])); // расширение array_pop — Извлекает последний элемент массива explode — Разбивает строку с помощью разделителя
	$new_name = $count_screan.'.'.$ext; // новое имя с расширением
	$full_path = $path.$new_name; // полный путь с новым именем и расширением

	if($_FILES['myfile']['error'] == 0){
		move_uploaded_file($_FILES['myscrean']['tmp_name'], $full_path); //move_uploaded_file — Перемещает загруженный файл в новое место
	}
}
$result = glob('content/trailer/'.$all[name].'.*');
if(COUNT($result) == 0){
	$path = 'content/trailer/'; // директория для загрузки scandir — Получает список файлов и каталогов, расположенных по указанному пути
	$ext = array_pop(explode('.',$_FILES['mytrailer']['name'])); // расширение array_pop — Извлекает последний элемент массива explode — Разбивает строку с помощью разделителя
	$new_name = $all[name].'.'.$ext; // новое имя с расширением
	$full_path = $path.$new_name; // полный путь с новым именем и расширением

	if($_FILES['myfile']['error'] == 0){
		move_uploaded_file($_FILES['mytrailer']['tmp_name'], $full_path); //move_uploaded_file — Перемещает загруженный файл в новое место
	}
}
$result = glob('content/tovar-image/'.$all[name].'.*');
if(COUNT($result) == 0){
	$path = 'content/tovar-image/'; // директория для загрузки scandir — Получает список файлов и каталогов, расположенных по указанному пути
	$ext = array_pop(explode('.',$_FILES['myposter']['name'])); // расширение array_pop — Извлекает последний элемент массива explode — Разбивает строку с помощью разделителя
	$new_name = $all[name].'.'.$ext; // новое имя с расширением
	$full_path = $path.$new_name; // полный путь с новым именем и расширением

	if($_FILES['myfile']['error'] == 0){
		move_uploaded_file($_FILES['myposter']['tmp_name'], $full_path); //move_uploaded_file — Перемещает загруженный файл в новое место
	}
}

include_once 'footer.php';
?>