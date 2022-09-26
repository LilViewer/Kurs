<?php

include_once 'config/database.php';
include_once 'objects/tovar.php';
include_once 'objects/akk.php';
$database = new Database();
$db = $database->getConnection();
$var_value = $_GET['varname'];

$tovar = new Tovar($db);
$akk = new Akk($db);

$stmt = $tovar->slider_tovar($var_value);

include_once 'head.php';
?>
<div id="line">
	<div id="green_line">

	</div>
</div>
<section class="vertical-center slider">
	<?php

	$chet = 1;
	$name = $stmt->fetch(PDO::FETCH_ASSOC);
	while($chet != 6){
		echo "<div><img src='content/screan/".$name[name]."/".$chet.".jpg'></div>";
		$chet++;
	}

	?>
</section>
<div id="black_slider">

</div>
<div id="slide_tovar_info">
	<label id="slide_name">
		<?php echo $name[name]?>
	</label>
	<div id="slide_info">
		<?php 
		$stmtt = $tovar->readKey($var_value); 
		$key = $stmtt->fetchAll(PDO::FETCH_ASSOC);
		?>
		<div class="grid_tovar one">
			<div class="grid_true">
				<div class="circle <?php echo (COUNT($key) >= 1)? 'green':'red' ?>">

				</div>
				<label class="cicle_text">
					<?php echo (COUNT($key) >= 1)? 'В наличии':'Отсуствует' ?>
				</label>
			</div>
			<div>
				<div class="circle <?php echo (COUNT($key) >= 1)? 'green':'red' ?>">

				</div>
				<label class="cicle_text">
					<?php echo (COUNT($key) >= 1)? 'Остатоль '.COUNT($key).' keys':'Ключей нет' ?>
				</label>
			</div>
		</div>
		<div class="grid_tovar two">
			<a href="index.php" class="but <?php echo (COUNT($key) >= 1)? 'button':'but_none' ?>">В корзину</a>
			<label>
				<?php echo $name[price]." ₽" ?>
			</label>
			<label class="line-through">
				<?php echo round($name[price] + (($name[price]/100) * $name[discount]))." ₽" ?>
			</label>
		</div>
	</div>
</div>

<div id="tovar_description">
	<div class="tovar_trailer">
		<label class="label">
			Трейлер
		</label>
		<video autoplay controls >
			<source src="content/trailer/<?php echo $name[name]?>.webm" type='video/webm; codecs="vp8, vorbis"'>
		</video>
		<div class="janr">
			<div class="janr_block">
				<label>
					Жанр
				</label>
				<label class="block_two">
					<?php 
					$genre = $tovar->readGenre($var_value);
					$genre = $genre->fetchAll(PDO::FETCH_ASSOC);
					$chet = 0 ;
					while (COUNT($genre) !=$chet) {
						echo "<a href='genre.php?varname=<?php echo $genre[$chet][name_genre]?>'>".$genre[$chet][name_genre]."</a>".($chet < COUNT($genre)-1? ", " : ".");
						$chet++;
					}
					?>
				</label>
			</div>
			<div class="janr_block">
				<label>
					Дата выхода
				</label>
				<label class="block_two">
					<?php 
					$date = $tovar->slider_tovar($var_value);
					$date = $date->fetch(PDO::FETCH_ASSOC);
					echo $date[date_release];
					?>
				</label>
			</div>
			<div class="janr_block">
				<label>
					Издатель
				</label>
				<label class="block_two">
					<?php 
					$publisher = $tovar->readPublisher($var_value);
					$publisher = $publisher->fetchAll(PDO::FETCH_ASSOC);
					$chet = 0 ;
					while (COUNT($publisher) !=$chet) {
						echo "<a href='publisher.php?varname=<?php echo $publisher[$chet][name_publisher]?>'>".$publisher[$chet][name_publisher]."</a>".($chet < COUNT($publisher)-1? ", " : ".");
						$chet++;
					}
					?>
				</label>
			</div>
			<div class="janr_block">
				<label>
					Разработчик
				</label>
				<label class="block_two">
					<?php 
					$developer = $tovar->readDeveloper($var_value);
					$developer = $developer->fetchAll(PDO::FETCH_ASSOC);
					$chet = 0 ;
					while (COUNT($developer) !=$chet) {
						echo "<a href='developer.php?varname=<?php echo $developer[$chet][name_developer]?>'>".$developer[$chet][name_developer]."</a>".($chet < COUNT($developer)-1? ", " : ".");
						$chet++;
					}
					?>
				</label>
			</div>
		</div>
	</div>
	<div class="tovar_hr">
		
	</div>
	<div class="tovar_description">
		<label class="label">
			Описание
		</label>
		<label class="description">
			<?php
				$description = $tovar->slider_tovar($var_value);
				$description = $description->fetch(PDO::FETCH_ASSOC);
				print_r($description[description]);
			?>
		</label>
	</div>
</div>
<?php
include_once 'footer.php';
?>