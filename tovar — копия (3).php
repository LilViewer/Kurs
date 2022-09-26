<?php 

include_once 'config/database.php';
include_once 'objects/tovar.php';
$database = new Database();
$db = $database->getConnection();
$var_value = $_GET['varname'];

$tovar = new Tovar($db);




include_once 'head.php';

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
<div id="line">
	<div id="green_line">

	</div>
</div>
<section class="vertical-center slider">
	<?php

	$chet = 1;
	$stmt = $tovar->slider_tovar($var_value);
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
		<?php 

		echo $name[name];
		?>
		<form action="#" method="POST">
			<input type="submit" class="but_img" value="" name="but_img">
		</form>
		<?php
		$tovar_hearth = $tovar->tovar_hearth($_SESSION['id'],$var_value);
		$tovar_hearth = $tovar_hearth->fetchAll(PDO::FETCH_ASSOC);
		if(COUNT($tovar_hearth)>=1){
			$heart = "heart_point";
		}
		else{
			$heart = "heart";
		}
		echo '<img src="content/icon/'.$heart.'.png" width="30" class="img_heart">';

		?>
		

		
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
			<form action="#" method="POST" >
				<input type="submit" name="buy_b" value="В корзину"  class="but buy_b <?php echo (COUNT($key) >= 1)? 'button':'but_none' ?>" >
			</form>
			<label class="price_b">
				<?php echo $name[price]." ₽" ?>
			</label>
			<label class="line-through">
				<?php echo round($name[price] + (($name[price]/100) * 100-$name[discount]))." ₽" ?>
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
						Жанр:
					</label>
					<label>
						Дата выхода:
					</label>
					<label>
						Издатель:
					</label>
					<label>
						Разработчик:
					</label>
				</div>
				<div class="janr_block_two">
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
					<label class="block_two">
						<?php 
						$date = $tovar->slider_tovar($var_value);
						$date = $date->fetch(PDO::FETCH_ASSOC);
						echo $date[date_release];
						?>
					</label>
					<label class="block_two">
						<?php 
						$publisher = $tovar->readPublisher($var_value);
						$publisher = $publisher->fetchAll(PDO::FETCH_ASSOC);
						$chet = 0 ;
						while (COUNT($publisher) !=$chet) {
							echo "<a href='publisher.php?varname=<?php echo $publisher[0][id_publisher]?>'>".$publisher[$chet][name_publisher]."</a>".($chet < COUNT($publisher)-1? ", " : ".");
							$chet++;
						}
						?>
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
	$sistem = $tovar->slider_tovar($var_value);
	$sistem = $sistem->fetch(PDO::FETCH_ASSOC);
	?>
	<div id="tovar_sistem">
		<div class="tovar_sistem">
			<label class="label">
				Системные требования
			</label>
			<div class="sistem">
				<button class="butt but_active" id="min">
					Минимальные
				</button>
				<button class="butt" id="rec">
					Рекомендуемые
				</button>
				<div class="min sistems">
					<div class=" info">
						<div class="info_two">
							<div>
								ОС:
							</div>
							<div>
								<?php echo $sistem[min_OS]?>
							</div>
						</div>
						<div class="info_two">
							<div>
								Процессор:
							</div>
							<div>
								<?php echo $sistem[min_Processor]?>
							</div>
						</div>
						<div class="info_two">
							<div>
								Оперативная память:
							</div>
							<div>
								<?php echo $sistem[min_RAM]." Гб"?>
							</div>
						</div>
						<div class="info_two">
							<div>
								Видеокарта:
							</div>
							<div>
								<?php echo $sistem[min_Video_Card]?>
							</div>
						</div>
						<div class="info_two">
							<div>
								Место на диске:
							</div>
							<div>
								<?php echo $sistem[Size]." Гб"?>
							</div>
						</div>
					</div>
				</div>
				<div class="rec sistems">
					<div class=" info">
						<div class="info_two">
							<div>
								ОС:
							</div>
							<div>
								<?php echo $sistem[rec_OS]?>
							</div>
						</div>
						<div class="info_two">
							<div>
								Процессор:
							</div>
							<div>
								<?php echo $sistem[rec_Processor]?>
							</div>
						</div>
						<div class="info_two">
							<div>
								Оперативная память:
							</div>
							<div>
								<?php echo $sistem[rec_RAM]." Гб"?>
							</div>
						</div>
						<div class="info_two">
							<div>
								Видеокарта:
							</div>
							<div>
								<?php echo $sistem[rec_Video_Card]?>
							</div>
						</div>
						<div class="info_two">
							<div>
								Место на диске:
							</div>
							<div>
								<?php echo $sistem[Size]." Гб"?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="tovar_hr">

		</div>
		<div class="tovar_otziv">
			<label class="label">
				Отзыв
			</label>
			<div class="otziv">
				<form action="#" method="POST">
					<textarea name="comm" maxlength='200' placeholder="30 символов и больше"></textarea>
					<input type="submit" name="comm_but" class="button comm" value="Отправить">
				</form>
			</div>
		</div>
	</div>

	<div id="comments">
		<label class="label">
			Комментарии 
		</label>
		<div class="comments">
			<?php
			$comm = $tovar->readComm($var_value);
			$comm = $comm->fetchAll(PDO::FETCH_ASSOC);
			$chet=0;
			while(COUNT($comm) !=$chet){
				echo "<div class='commm'>";
				echo "<div><label class='date'>".$comm[$chet]['date']."</label></div>";
				echo "<div><label class='author'>".$comm[$chet]['author_comm']."</label></div>";
				echo "<div><label class='text_comm'>".$comm[$chet]['text_comm']."</label></div>";
				echo "</div>";
				$chet++;
			}
			?>
		</div>
	</div>
	<?php
	if (isset($_POST['comm_but'])) {
		if ($_SESSION['auth'] == 1 && (strlen($_POST['comm']) >=30) ) {
			$tovar->createComm($var_value,$_SESSION['login'],$_POST['comm'],date('Y-m-d'));
		}
	}
	?>
	<?php
	include_once 'footer.php';
	?>