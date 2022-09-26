<?php session_start();
include_once 'config/database.php';
include_once 'objects/tovar.php';
include_once 'objects/akk.php';
$database = new Database();
$db = $database->getConnection();
$var_value = $_GET['varname'];
$tovar = new Tovar($db);
$akk = new Akk($db);
include_once 'head.php';
$helpUser = $tovar->helpUser($_SESSION['id']);
$helpUsers = $helpUser->fetchAll(PDO::FETCH_ASSOC);
?>

<div id="help">
	<label>
		<b>
			Задать вопрос
		</b>
	</label>
	<br>
	<label>
		Задайте вопрос и вам ответят по почте которую вы указали при регистрации
	</label>
	<hr>
	<form action="#" method="post">
		<textarea name="help"></textarea>
		<input type="submit" name="help_but">
	</form>

	<div class="<?php echo (COUNT($helpUsers)==0)? 'dis_none':'' ?>">
		<label>
			<b>
				Ваши вопросы
			</b>
		</label>
		<div class="comments">
			<?php
			$helpUser = $tovar->helpUser($_SESSION['id']);
			while($helpUsers = $helpUser->fetch(PDO::FETCH_ASSOC)){
				echo "<div class='commm'>";
				echo "<div><label class='date'>".$helpUsers['date']."</label></div>";
				echo "<div><label class='author'>".$helpUsers['user_login']."</label></div>";
				echo "<div><label class='text_comm'>".$helpUsers['text']."</label></div>";
				echo "</div>";
			}
			?>
		</div>
	</div>
</div>

<?php

if(isset($_POST['help_but'])){
	if ($_POST['help']!=null) {
		$helps = $tovar->help($_SESSION['id'],$_POST['help']);
	}
}

include_once 'footer.php';
?>