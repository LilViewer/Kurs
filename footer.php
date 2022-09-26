<?php session_start(); ?>
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
<script type="text/javascript" src="libs/script1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>