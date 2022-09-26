<?php session_start();

include_once 'config/database.php';
$database = new Database();
$db = $database->getConnection();

if(isset($_POST['enter']))
{
	$err = [];

    // проверям логин
	if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['name']))
	{
		$err[] = "Логин может состоять только из букв английского алфавита и цифр";
	}

	if(strlen($_POST['name']) < 3 or strlen($_POST['name']) > 30)
	{
		$err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
	}

    // проверяем, не сущестует ли пользователя с таким именем
	$query = mysqli_query($link, "SELECT user_id FROM users WHERE user_login='".mysqli_real_escape_string($link, mb_strtoupper($_POST['name']))."'");
	if(mysqli_num_rows($query) > 0)
	{
		$err[] = "Пользователь с таким логином уже существует в базе данных";
	}

    // проверяем, не сущестует ли пользователя с такой почтой
	$query = mysqli_query($link, "SELECT user_id FROM users WHERE email='".mysqli_real_escape_string($link, mb_strtoupper($_POST['email']))."'");
	if(mysqli_num_rows($query) > 0)
	{
		$err[] = "Пользователь с такой почтой уже существует в базе данных";
	}

	if(mb_strtoupper($_POST[old_pas]) != mb_strtoupper($_POST[new_pas]))
	{
		$err[] = "пароли не повторяются";
	}

    // Если нет ошибок, то добавляем в БД нового пользователя
	if(count($err) == 0)
	{

		$login = $_POST['name'];
		$login = mb_strtoupper($login);

		$password = $_POST['new_pas'];
		$password = mb_strtoupper($password);

		$email = $_POST['email'];
		$email = mb_strtoupper($email);

		mysqli_query($link,"UPDATE users SET user_login = '".$_POST[name]."',email = '".$_POST[email]."',user_password = '".$_POST[new_pas]."',");
		header("Location: log.php"); exit();
	}
	else
	{
		print "<b>При регистрации произошли следующие ошибки:</b><br>";
		foreach($err AS $error)
		{
			print $error."<br>";
		}
	}
}

if(isset($_POST['destroy'])) {
	session_destroy();
	header("Location: index.php"); exit();
}
include_once 'objects/tovar.php';
include_once 'objects/akk.php';

$var_value = $_GET['varname'];

$tovar = new Tovar($db);
$akk = new Akk($db);

if(isset($_POST['num_delet'])){
	$num_delet=$_POST['num_delet'];
	$delettovar = $tovar->DeletTovar($num_delet);
}


if(isset($_POST['create_but'])){
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
		$create = $tovar->CreateTovar($_POST['name'],$_POST['price'],$_POST['discount'],$_POST['date_release'],$_POST['description'],$_POST['min_OS'],$_POST['min_Processor'],$_POST['min_RAM'],$_POST['min_Video_Card'],$_POST['rec_OS'],$_POST['rec_Processor'],$_POST['rec_RAM'],$_POST['rec_Video_Card'],$_POST['Size']);

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
			print_r($key);
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
			print_r($key);
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
	}
}
if(isset($_POST['create_gen'])){
	$err = [];

	$genreall = $tovar->readGenreAll();
	while ($genrealls = $genreall->FETCH(PDO::FETCH_ASSOC)) {
		if(mb_strtoupper($_POST['gen_name_create']) == $genrealls['name']){
			$err[] = "Такой жанр уже есть";
		}
	}
	if(strlen($_POST['gen_name_create']) == 0)
	{
		$err[] = "Название пустое";
	}
	if(count($err) != 0){
		print "<b>При создание жанра произошли следующие ошибки:</b><br>";
		foreach($err AS $error)
		{
			print $error."<br>";
		}
	}
	else{
		$create = $tovar->createGenre(mb_strtoupper($_POST['gen_name_create']));
	}
}
if(isset($_POST['editing_gen'])){
	$err = [];
	$genreall = $tovar->readGenreAll();
	while ($genrealls = $genreall->FETCH(PDO::FETCH_ASSOC)) {
		if(mb_strtoupper($_POST['gen_name_editing']) == $genrealls['name']){
			$err[] = "Такой жанр уже есть";
		}
	}
	if(strlen($_POST['gen_name_editing']) == 0)
	{
		$err[] = "Название пустое";
	}
	if($_POST['gen_num_editing'] <= 0)
	{
		$err[] = "номер неправильная";
	}
	if(count($err) != 0){
		print "<b>При редактирование жанра произошли следующие ошибки:</b><br>";
		foreach($err AS $error)
		{
			print $error."<br>";
		}
	}
	else{
		$create = $tovar->UpdateGenre($_POST['gen_num_editing'],mb_strtoupper($_POST['gen_name_editing']));
	}
}
if(isset($_POST['del_gen_but'])){
	$err = [];
	if($_POST['gen_num_delet'] <= 0)
	{
		$err[] = "номер неправильная";
	}
	if(count($err) != 0){
		print "<b>При удаление жанра произошли следующие ошибки:</b><br>";
		foreach($err AS $error)
		{
			print $error."<br>";
		}
	}
	else{
		$create = $tovar->DeletGenres($_POST['gen_num_delet']);
	}
}
if(isset($_POST['create_dev'])){
	$err = [];

	$developerall = $tovar->readDeveloperAll();
	while ($developeralls = $developerall->FETCH(PDO::FETCH_ASSOC)) {
		if(mb_strtoupper($_POST['dev_name_editing']) == $developeralls['name']){
			$err[] = "Такой жанр уже есть";
		}
	}
	if(strlen($_POST['dev_name_create']) == 0)
	{
		$err[] = "Название пустое";
	}
	if(count($err) != 0){
		print "<b>При создание жанра произошли следующие ошибки:</b><br>";
		foreach($err AS $error)
		{
			print $error."<br>";
		}
	}
	else{
		$create = $tovar->createDeveloper(mb_strtoupper($_POST['dev_name_create']));
	}
}
if(isset($_POST['editing_dev'])){
	$err = [];
	$developerall = $tovar->readDeveloperAll();
	while ($developeralls = $developerall->FETCH(PDO::FETCH_ASSOC)) {
		if(mb_strtoupper($_POST['dev_name_editing']) == $developeralls['name']){
			$err[] = "Такой разработчика уже есть";
		}
	}
	if(strlen($_POST['dev_name_editing']) == 0)
	{
		$err[] = "Название пустое";
	}
	if($_POST['dev_num_editing'] <= 0)
	{
		$err[] = "номер неправильная";
	}
	if(count($err) != 0){
		print "<b>При редактирование разработчика произошли следующие ошибки:</b><br>";
		foreach($err AS $error)
		{
			print $error."<br>";
		}
	}
	else{
		$create = $tovar->UpdateDeveloper($_POST['dev_num_editing'],mb_strtoupper($_POST['dev_name_editing']));
	}
}
if(isset($_POST['del_dev_but'])){
	$err = [];
	if($_POST['dev_num_delet'] <= 0)
	{
		$err[] = "номер неправильная";
	}
	if(count($err) != 0){
		print "<b>При удаление разработчика произошли следующие ошибки:</b><br>";
		foreach($err AS $error)
		{
			print $error."<br>";
		}
	}
	else{
		$create = $tovar->DeletDevelopers($_POST['dev_num_delet']);
	}
}

if(isset($_POST['create_pub'])){
	$err = [];

	$publisherall = $tovar->readPublisherAll();
	while ($publisheralls = $publisherall->FETCH(PDO::FETCH_ASSOC)) {
		if(mb_strtoupper($_POST['pub_name_create']) == $publisheralls['name']){
			$err[] = "Такой издатель уже есть";
		}
	}
	if(strlen($_POST['pub_name_create']) == 0)
	{
		$err[] = "Название пустое";
	}
	if(count($err) != 0){
		print "<b>При создание издателя произошли следующие ошибки:</b><br>";
		foreach($err AS $error)
		{
			print $error."<br>";
		}
	}
	else{
		$create = $tovar->createPublisher(mb_strtoupper($_POST['pub_name_create']));
	}
}
if(isset($_POST['editing_pub'])){
	$err = [];
	$publisherall = $tovar->readPublisherAll();
	while ($publisheralls = $publisherall->FETCH(PDO::FETCH_ASSOC)) {
		if(mb_strtoupper($_POST['pub_name_editing']) == $publisheralls['name']){
			$err[] = "Такой издатель уже есть";
		}
	}
	if(strlen($_POST['pub_name_editing']) == 0)
	{
		$err[] = "Название пустое";
	}
	if($_POST['pub_num_editing'] <= 0)
	{
		$err[] = "номер неправильная";
	}
	if(count($err) != 0){
		print "<b>При редактирование издателя произошли следующие ошибки:</b><br>";
		foreach($err AS $error)
		{
			print $error."<br>";
		}
	}
	else{
		$create = $tovar->UpdatePublisher($_POST['pub_num_editing'],mb_strtoupper($_POST['pub_name_editing']));
	}
}
if(isset($_POST['del_pub_but'])){
	$err = [];
	if($_POST['pub_num_delet'] <= 0)
	{
		$err[] = "номер неправильная";
	}
	if(count($err) != 0){
		print "<b>При удаление издателя произошли следующие ошибки:</b><br>";
		foreach($err AS $error)
		{
			print $error."<br>";
		}
	}
	else{
		$create = $tovar->DeletPublishers($_POST['pub_num_delet']);
	}
}


include_once 'head.php';
?>

<div id="cabinet">
	<div id="block_one_cabinet">
		<form action="#" method="post" id="form">
			<div id="panel">
				<input type="button" name="profil"  id="but_profil" value="Профиль" class="button but_active">
				<input type="button" name="cabinet" id="but_cabinet" value="Личные данные" class=" button">
				<input type="button" name="history" id="but_history"  value="История покупок" class="button">
				<input type="button" name="admin" id="but_admin"  value="Админ" class="button <?php echo ($_SESSION[login] == 'VIEWER')? '':'display_none' ?>">
				<!-- <input type="button" name="key" id="but_key"  value="Ключи" class="button <?php echo ($_SESSION[login] == 'VIEWER')? '':'display_none' ?>"> -->
			</div>
			<input type="submit" name="destroy" value="Выход" class="button">
		</form>
	</div>

	<?php
	$users = $tovar->users($_SESSION['id']);
	$users = $users->fetch(PDO::FETCH_ASSOC);

	$count_buy = $tovar->count_buy($_SESSION['id']);
	$count_buy = $count_buy->fetchAll(PDO::FETCH_ASSOC);

	$history = $tovar->history($_SESSION['id']);

	$history_akk = $akk->history_akk($_SESSION['id']);
	?>

	<div id="block_two_cabinet">
		<div id="profil">
			<div>
				<label class="strong">
					<b><?php echo $users[user_login] ?></b>
				</label>
				<hr>
				<label class="strong">
					Игр куплено <b><?php echo COUNT($count_buy) ?></b>
				</label>
				<div class="keys_akk <?php echo (COUNT($count_buy)==0)? "dis_none":"" ?> ">
					<label>
						Наименование:
					</label>
					<label>
						Данные товара:
					</label>
					<?php 
					while ($historys_akk = $history_akk->fetch(PDO::FETCH_ASSOC)) {
						?>
						<label>
							<?php echo $historys_akk[name] ?>
						</label>
						<div class="akk_log">
							<label class="small">
								<?php echo "Логин: <b>".$historys_akk[log] ?></b>
							</label>
							<label class="small">
								<?php echo "Пароль: <b>".$historys_akk[pas]?></b>
							</label>
						</div>
						<?php
					}
					?>
					<hr><hr>
					<?php
					while($historys = $history->fetch(PDO::FETCH_ASSOC)) {

						?>
						<label>
							<?php echo $historys[name] ?>
						</label>
						<div class="akk_log">
							<label class="small">
								<?php echo "Ключ: <b>".$historys[keys] ?></b>
							</label>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>

		<div id="cabinett">
			<form action="#" method="post">
				<label class="asd">
					Личные данные
				</label>
				<div class="daniu">
					<div class="stroc">
						<label>
							Name:
						</label>
						<input type="text" name="name" placeholder="<?php echo $users[user_login] ?>">
					</div>
					<div class="stroc">
						<label>
							email:
						</label>
						<input type="email" name="email" placeholder="<?php echo $users[email] ?>">
					</div>

					<label>
						<hr>
						Смена пароля:
					</label>
					<div class="stroc">
						<label>
							новый пароль:
						</label>
						<input type="password" name="old_pas" placeholder="от 3 до 30">
					</div>
					<div class="stroc">
						<label>
							повторите пароль:
						</label>
						<input type="password" name="new_pas" placeholder="от 3 до 30">
					</div>
					<input type="submit" name="enter" value="подтвердить изменения">
				</div>
			</form>
		</div>

		<div id="historys">
			<div class="names">
				<label>
					наименование
				</label>
				<label>
					Тип
				</label>
				<label>
					цена/скидка/купон
				</label>
				<label>
					Дата
				</label>
			</div>
			<div class ="names">
				<?php

				$history_akk = $akk->history_akk($_SESSION['id']);
				while ($historys_akk = $history_akk->fetch(PDO::FETCH_ASSOC)) {
					?>

					<label>
						<?php echo $historys_akk[name] ?>
					</label>
					<label>
						Аккаунт
					</label>
					<label id="price_dis">
						<label>
							<?php echo $historys_akk[price_standart]." ₽" ?>
						</label>
						<label class="label">
							<?php echo "-".$historys_akk[discount_tovar]."%" ?>
						</label>
						<label class="label">
							<?php echo ($historys_akk[cupon]!=null)? "-".$historys_akk[cupon]."%":"нет" ?>
						</label>
					</label>
					<label>
						<?php echo $historys_akk[date] ?>
					</label>

					<?php
				}
				?>
				<hr><hr><hr><hr>
				<?php

				$history = $tovar->history($_SESSION['id']);
				while($historys = $history->fetch(PDO::FETCH_ASSOC)) {
					?>

					<label>
						<?php echo $historys[name] ?>
					</label>
					<label>
						ключ
					</label>
					<label id="price_dis">
						<label>
							<?php echo $historys[price]." ₽" ?>
						</label>
						<label class="label">
							<?php echo "-".$historys[discount_tovar]."%" ?>
						</label>
						<label class="label">
							<?php echo ($historys[cupon]!=null)? "-".$historys[cupon]."%":"нет" ?>
						</label>
					</label>
					<label>
						<?php echo $historys[date] ?>
					</label>

					<?php
				}
				?>
			</div>
			<div>
				
			</div>
		</div>
		<div id="admin">
			<div id="admin_panel">
				<label class="button but_active" id="but_tov">
					товар
				</label>
				<label class="button" id="but_gen">
					Жанр
				</label >
				<label class="button" id="but_dev">
					Разработчик
				</label >
				<label class="button" id="but_pub">
					Издатель
				</label>
			</div>
			<hr>
			<div id="tov">
				<form action="#" method="post">
					<label>
						<b>Удалить товар</b>
					</label>
					<div class="editing_edit">
						<label>Номер товара</label>
						<input type="number" name="num_delet">
					</div>
					<input class="button" type="submit" name="delet_but" value="удалить">
					<hr>
					<label>
						<b>Создание товара</b>
					</label>
					<div class="editing_edit">
						<label>Название</label>
						<input type="text" name="name" >
					</div>
					<div class="editing_edit">
						<label>Цена</label>
						<input type="text" name="price" >
					</div>
					<div class="editing_edit">
						<label>Скидка</label>
						<input type="number" name="discount" >
					</div>
					<div class="editing_edit">
						<label>Дата релиза(формат гггг-мм-дд)</label>
						<input type="text" name="date_release" >
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
						<input type="text" name="min_OS" >
					</div>
					<div class="editing_edit">
						<label>min_Processor</label>
						<input type="text" name="min_Processor">
					</div>
					<div class="editing_edit">
						<label>min_RAM</label>
						<input type="number" name="min_RAM" >
					</div>
					<div class="editing_edit">
						<label>min_Video_Card</label>
						<input type="text" name="min_Video_Card" >
					</div>
					<div class="editing_edit">
						<label>rec_OS</label>
						<input type="text" name="rec_OS" >
					</div>
					<div class="editing_edit">
						<label>rec_Processor</label>
						<input type="text" name="rec_Processor">
					</div>
					<div class="editing_edit">
						<label>rec_RAM</label>
						<input type="number" name="rec_RAM" >
					</div>
					<div class="editing_edit">
						<label>rec_Video_Card</label>
						<input type="text" name="rec_Video_Card" >
					</div>
					<div class="editing_edit">
						<label>Size</label>
						<input type="number" name="Size" >
					</div>
					<input class="button" type="submit" name="create_but" value="Создать">
					<hr>
				</form>
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
			</div>

			<div id="gen" class="dis_none">
				<form action="#" method="POST">
					<label>
						<b>Удалить Жанр</b>
					</label>
					<div class="editing_edit">
						<label>Номер жанра</label>
						<input type="number" name="gen_num_delet">
					</div>
					<input class="button" type="submit" name="del_gen_but" value="удалить">
					<hr>
					<label>
						<b>Отредактировать Жанр</b>
					</label>
					<div class="editing_edit">
						<label>Номер жанра</label>
						<input type="number" name="gen_num_editing">
					</div>
					<div class="editing_edit">
						<label>Название жанра</label>
						<input type="text" name="gen_name_editing">
					</div>
					<input  class="button"type="submit" name="editing_gen" value="Отредактировать">
					<hr>
					<label>
						<b>Создать Жанр</b>
					</label>
					<div class="editing_edit">
						<label>Название жанра</label>
						<input type="text" name="gen_name_create">
					</div>
					<input class="button" type="submit" name="create_gen" value="создать">
				</form>
			</div>
			<div id="dev" class="dis_none">
				<form action="#" method="POST">
					<label>
						<b>Удалить разработчика</b>
					</label>
					<div class="editing_edit">
						<label>Номер разработчика</label>
						<input type="number" name="dev_num_delet">
					</div>
					<input class="button" type="submit" name="del_dev_but" value="удалить">
					<hr>
					<label>
						<b>Отредактировать разработчика</b>
					</label>
					<div class="editing_edit">
						<label>Номер разработчика</label>
						<input type="number" name="dev_num_editing">
					</div>
					<div class="editing_edit">
						<label>Название разработчика</label>
						<input type="text" name="dev_name_editing">
					</div>
					<input  class="button"type="submit" name="editing_dev" value="Отредактировать">
					<hr>
					<label>
						<b>Создать разработчика</b>
					</label>
					<div class="editing_edit">
						<label>Название разработчика</label>
						<input type="text" name="dev_name_create">
					</div>
					<input class="button" type="submit" name="create_dev" value="создать">
				</form>
			</div>
			<div id="pub" class="dis_none">
				<form action="#" method="POST">
					<label>
						<b>Удалить издателя</b>
					</label>
					<div class="editing_edit">
						<label>Номер издателя</label>
						<input type="number" name="pub_num_delet">
					</div>
					<input class="button" type="submit" name="del_pub_but" value="удалить">
					<hr>
					<label>
						<b>Отредактировать издателя</b>
					</label>
					<div class="editing_edit">
						<label>Номер издателя</label>
						<input type="number" name="pub_num_editing">
					</div>
					<div class="editing_edit">
						<label>Название издателя</label>
						<input type="text" name="pub_name_editing">
					</div>
					<input  class="button"type="submit" name="editing_pub" value="Отредактировать">
					<hr>
					<label>
						<b>Создать издателя</b>
					</label>
					<div class="editing_edit">
						<label>Название издателя</label>
						<input type="text" name="pub_name_create">
					</div>
					<input class="button" type="submit" name="create_pub" value="создать">
				</form>
			</div>
		</div>
	</div>
</div>



<?php

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
include_once 'footer.php'
?>