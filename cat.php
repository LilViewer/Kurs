<?php session_start();
include_once 'config/database.php';
include_once 'objects/tovar.php';
$database = new Database();
$db = $database->getConnection();
$var_value = $_GET['varname'];
$tovar = new Tovar($db);
include_once 'head.php';
?>

<div id="cat">
	<div class="strong">
		Каталог
		<hr>
	</div>
	<div id="cat_spisoc">
		<div class="grid_cat">
			<label>
				<b>Жанры</b>
			</label>
			<?php
			$genre = $tovar->readGenreAll();
			while ($genres = $genre->fetch(PDO::FETCH_ASSOC)) {
				echo  "<div><a href='genre.php?varname=$genres[id_genre]'>".$genres[name_genre]."</a></div>";
			}
			?>
		</div>
		<div class="grid_cat">
			<label>
				<b>Издатель</b>
			</label>
			<?php
			$publisher = $tovar->readPublisherAll();
			while ($publishers = $publisher->fetch(PDO::FETCH_ASSOC)) {
				echo  "<div><a href='publisher.php?varname=$publishers[id_publisher]'>".$publishers[name_publisher]."</a></div>";
			}
			?>
		</div>
		<div class="grid_cat">
			<label>
				<b>Разработчик</b>
			</label>
			<?php
			$developer = $tovar->readDeveloperAll();
			while ($developers = $developer->fetch(PDO::FETCH_ASSOC)) {
				echo  "<div><a href='developer.php?varname=$developers[id_developer]'>".$developers[name_developer]."</a></div>";
			}
			?>
		</div>
	</div>
</div>

<?php
include_once 'footer.php';
?>