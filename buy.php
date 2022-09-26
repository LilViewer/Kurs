<?php session_start();
include_once 'config/database.php';
$database = new Database();
$db = $database->getConnection();

$var_value = $_GET['varname'];
$var_value = explode(",",$var_value);
$price_one = $var_value[0];
$price_two = $var_value[1];
if ($var_value[1] != 0) {
	$cupon = round(($price_one-$price_two) / ($price_one/100));
	$price = $var_value[1];
}	
else{
	$price = $var_value[0];
	$cupon = "null";
}

if(isset($_POST['submit_buy']) && $_SESSION['auth']==1){
	
	$zakaz_tovar = $db->query("SELECT tovar.id_tovar,price,discount
		FROM users
		JOIN users_basket ON users.user_id = users_basket.user_id
		JOIN tovar ON users_basket.id_tovar = tovar.id_tovar
		WHERE users_basket.user_id = $_SESSION[id]");


	while($zakazy_tovar = $zakaz_tovar->fetch(PDO::FETCH_ASSOC)){
	$key = $db->query("SELECT key_,tovar_key.id_key
        FROM users_basket 
        JOIN tovar ON users_basket.id_tovar = tovar.id_tovar 
        JOIN tovar_key ON users_basket.id_tovar = tovar_key.id_tovar 
        JOIN key_ ON tovar_key.id_key = key_.id_key 
        WHERE users_basket.id_tovar = $zakazy_tovar[id_tovar] AND user_id = $_SESSION[id]
        LIMIT 1");
		$keys = $key->fetch(PDO::FETCH_ASSOC);
		$crate_histoty = $db->query("INSERT INTO user_history(user_id,id_tovar,date,discount_tovar,cupon,`keys`)
        VALUES ($_SESSION[id],$zakazy_tovar[id_tovar],NOW(),$zakazy_tovar[discount],$cupon,'$keys[key_]')");

        $delet_basket = $db->query("DELETE FROM users_basket WHERE user_id = $_SESSION[id] AND id_tovar = $zakazy_tovar[id_tovar]");

        $delet_key = $db->query("DELETE FROM key_ WHERE id_key = $keys[id_key]");
	}


	$zakaz_akk = $db->query("SELECT akk.id_akk,price_standart,discount
        FROM users
        JOIN user_basket_akk ON users.user_id = user_basket_akk.user_id
        JOIN akk ON user_basket_akk.id_akk = akk.id_akk
        WHERE user_basket_akk.user_id = $_SESSION[id]");


	while($zakazy_tovar = $zakaz_akk->fetch(PDO::FETCH_ASSOC)){
	$key = $db->query("SELECT log,pas,log_akk.id_log_akk
        FROM user_basket_akk
        JOIN akk ON user_basket_akk.id_akk = akk.id_akk 
        JOIN akk_log_akk ON user_basket_akk.id_akk = akk_log_akk.id_akk
        JOIN log_akk ON akk_log_akk.id_log_akk = log_akk.id_log_akk
        WHERE user_basket_akk.id_akk = $zakazy_tovar[id_akk] AND user_id = $_SESSION[id]
        LIMIT 1");
		$keys = $key->fetch(PDO::FETCH_ASSOC);

		$crate_histoty_akk = $db->query("INSERT INTO user_history(user_id,id_akk,date,discount_tovar,cupon,`log`,`pas`)
        VALUES ($_SESSION[id],$zakazy_tovar[id_akk],NOW(),$zakazy_tovar[discount],$cupon,'$keys[log]','$keys[pas]')");
        $delet_basket = $db->query("DELETE FROM user_basket_akk WHERE user_id = $_SESSION[id] AND id_akk = $zakazy_tovar[id_akk]");

        $delet_key = $db->query("DELETE FROM log_akk WHERE id_log_akk = $keys[id_log_akk]");
	}
	// print_r($zakaz_akk);
	// while($allCupon = $allCupons->fetch(PDO::FETCH_ASSOC)){
	// 	if($cupon == $allCupon['cupon']){
	// 		$price_new = round($price - $price/100 * $allCupon['discount']);
	// 		break;
	// 	}
	// }


	header("Location: index.php"); exit();
}

include_once 'objects/tovar.php';
include_once 'objects/akk.php';


$tovar = new Tovar($db);
$akk = new Akk($db);
include_once 'head.php';

?>
<div id="buy">
	<div id="block_buy">
		<label class="label_buy">
			К оплате <?php echo "<b>".$price." ₽</b>" ?>
		</label>
		<label class="cuponsell label <?php echo ($cupon!=0)? "":"cupon_none" ?>">
			<?php echo "- ".$cupon."%"?>
		</label>
		<hr>
		<form action="#" method="post">
			<input type="text" placeholder="Номер карты" maxlength="22" required  name="nomer" class="nomer">
			<div id="down_card">
				<input type="text" placeholder="ММ/ГГ" maxlength="5" required  pattern="[01-12]{2}/[01-31]{2}"  class="year">
				<div id="two_card">
					<label>
						Три цифры на обороте
					</label>
					<input type="password" maxlength="4" placeholder="CVC" name="CVC" required class="CVC">
				</div>
			</div>
			<input type="submit" name="submit_buy" value="Купить" class="button">
		</form>
	</div>
</div>


<footer>
	<hr>
	<div id="grid_footer">	
		<div id="logo_footer">
			<a href="index.php"><img src="content/icon/logo.png" width="60" ></a>
		</div>
		<div id="info_footer">
			<!-- <label><a href="">Последние поступления</a></label> -->
			<!-- <label><a href="">Новинки</a></label> -->
			<!-- <label><a href="">О компании</a></label> -->
			<label><a href="cat.php">Каталог</a></label>
			<label><a href="basket.php">Корзина</a></label>
			<label><a href="hearth.php">Желаемое</a></label>
			<!-- <label><a href="">Пользовательское соглашение</a></label> -->
			<!-- <label><a href="">Лидеры продаж</a></label> -->
			<!-- <label><a href="">Ожидаимые</a></label> -->
			<label><a href="<?php echo ($_SESSION['auth']==1)? 'help.php':'' ?>">Поддержка</a></label>
			<!-- <label><a href="">Политика конфиденциальности</a></label> -->
			<label><a href="<?php echo ($_SESSION['auth']==1)? 'cabinet.php':'' ?>">Личный кабинет</a></label>
			<!-- <label><a href="">Лотерея</a></label> -->
			<!-- <label><a href="">Купоны</a></label> -->
		</div>
	</div>
	<label id="doptext">
		Платформа для продажи цифровых товаров. Торговый агрегатор по оказанию услуг в сфере торговли. Все закупаемые ключи приобретаются у официальных поставщиков. Все названия продуктов, компаний и марок, логотипы и товарные знаки являются собственностью соответствующих владельцев.
	</label>
</footer>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="/slick/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<!-- библиотека jQuery -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- плагин Masked Input -->
<script src="js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="libs/script_mask.js"></script>

</body>
</html>

<!-- <footer>
	<hr>
	<div id="grid_footer">	
		<div id="logo_footer">
			<a href="index.php"><img src="content/icon/logo.png" width="60" ></a>
		</div>
		<div id="info_footer">
			<label><a href="">Последние поступления</a></label>
			<label><a href="">Новинки</a></label>
			<label><a href="">О компании</a></label>
			<label><a href="">Пользовательское соглашение</a></label>
			<label><a href="">Лидеры продаж</a></label>
			<label><a href="">Ожидаимые</a></label>
			<label><a href="">Поддержка</a></label>
			<label><a href="">Политика конфиденциальности</a></label>
			<label><a href="">Личный кабинет</a></label>
			<label><a href="">Лотерея</a></label>
			<label><a href="">Купоны</a></label>
		</div>
	</div>
	<label id="doptext">
		Платформа для продажи цифровых товаров. Торговый агрегатор по оказанию услуг в сфере торговли. Все закупаемые ключи приобретаются у официальных поставщиков. Все названия продуктов, компаний и марок, логотипы и товарные знаки являются собственностью соответствующих владельцев.
	</label>
</footer>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="/slick/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script> -->
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="libs/script_mask.js"></script>
</body>
</html> -->