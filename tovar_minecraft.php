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

if(isset($_POST['buy_b']) && $_SESSION['auth'] == 1){
  $tovar_basket_yes = $tovar->tovar_basket_yes($_SESSION['id'],$var_value);
  $tovar_basket_yes = $tovar_basket_yes->fetch(PDO::FETCH_ASSOC);
  if ($tovar_basket_yes == null) {
    $create_basket = $tovar->create_basket($_SESSION['id'],$var_value);
  }
}

if(isset($_POST['but_img']) && $_SESSION['auth'] == 1){

	$akk_hearth_yes = $akk->akk_hearth_yes($_SESSION['id'],$var_value);
	$akk_hearth_yes = $akk_hearth_yes->fetch(PDO::FETCH_ASSOC);
	if ($akk_hearth_yes == null) {
		$create_hearth_akk = $akk->create_hearth_akk($_SESSION['id'],$var_value);
	}
	else{
		$akk_hearth_delet = $akk->akk_hearth_delet($_SESSION['id'],$var_value);	
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
	$stmt = $akk->slider_tovar($var_value);
	$name = $stmt->fetch(PDO::FETCH_ASSOC);
	while($chet != 6){
		echo "<div><img src='content/screan/Minecraft/".$chet.".jpg'></div>";
		$chet++;
	}

	?>
</section>
<div class=" <?php echo ($_SESSION[login] == 'VIEWER')? 'admin_blcok':'display_none' ?> ">
		<a class='button' href="editing_akk.php?varname=<?php echo $name[id_akk]?> ">
			Отредоктировать
		</a>
	</div>
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
		$akk_hearth = $akk->akk_hearth($_SESSION['id'],$var_value);
		$akk_hearth = $akk_hearth->fetchAll(PDO::FETCH_ASSOC);
		if(COUNT($akk_hearth)>=1){
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
		$stmtt = $akk->readKey($var_value); 
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
					<?php echo (COUNT($key) >= 1)? 'Остатоль '.COUNT($key).' аккаунтов':'аккаунтов нет' ?>
				</label>
			</div>
		</div>
		<div class="grid_tovar two">
			<!-- <a href="basket.php?varname=<?php echo $_SESSION['id']?>" class="but <?php echo (COUNT($key) >= 1)? 'button':'but_none' ?>">В корзину</a> -->
			<form action="#" method="POST" class="gf">
				<label class="label_tovar_akk <?php echo (COUNT($key) >= 1)? 'button':'but_none' ?>">
					В корзину
				</label>
				<input  type="submit" name="buy_b" value="<?php echo $name[id_tovar] ?>"   class="sa " >
			</form>
			<label class="price_onet">
				<?php echo +$name[price_standart] ?> ₽
			</label>
			<!-- <label class="price_twot">
				<?php echo $name[price_standart]+$name[price_infinite]-$name[price_standart] ?> ₽
			</label> -->
		</div>
		<!-- <div id="garant">
			<label class="garant_name">
				Гарантия
			</label>
			<label class="price_one prise">
				0 ₽
			</label>
			<label class="price_two prise">
				<?php echo +$name[price_infinite]-$name[price_standart] ?> ₽
			</label>
			<div class="gerant_info">
				<img src="content/icon/garant.png">
			</div>
			<div class="buttons">
				<button class="but_active but_one">
					Стандарт
				</button>
				<button class="but_two">
					Вечная
				</button>
			</div>
		</div> -->
	</div>
</div>

<div id="tovar_description">
	<div class="tovar_trailer">
		<label class="label">
			Трейлер
		</label>
		<video autoplay controls >
			<source src="content/trailer/Minecraft.webm" type='video/webm; codecs="vp8, vorbis"'>
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
						$genre = $akk->readGenre($var_value);
						$genre = $genre->fetchAll(PDO::FETCH_ASSOC);
						$chet = 0 ;
						while (COUNT($genre) !=$chet) {
							echo $genre[$chet][name_genre].($chet < COUNT($genre)-1? ", " : ".");
							$chet++;
						}
						?>
					</label>
					<label class="block_two">
						<?php 
						$date = $akk->slider_tovar($var_value);
						$date = $date->fetch(PDO::FETCH_ASSOC);
						echo $date[date_release];
						?>
					</label>
					<label class="block_two">
						<?php 
						$publisher = $akk->readPublisher($var_value);
						$publisher = $publisher->fetchAll(PDO::FETCH_ASSOC);
						$chet = 0 ;
						while (COUNT($publisher) !=$chet) {
							echo $publisher[$chet][name_publisher].($chet < COUNT($publisher)-1? ", " : ".");
							$chet++;
						}
						?>
					</label>
					<label class="block_two">
						<?php 
						$developer = $akk->readDeveloper($var_value);
						$developer = $developer->fetchAll(PDO::FETCH_ASSOC);
						$chet = 0 ;
						while (COUNT($developer) !=$chet) {
							echo $developer[$chet][name_developer].($chet < COUNT($developer)-1? ", " : ".");
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
				$description = $akk->slider_tovar($var_value);
				$description = $description->fetch(PDO::FETCH_ASSOC);
				print_r($description[description]);
				?>
			</label>
		</div>
	</div>
	<?php 
	$sistem = $akk->slider_tovar($var_value);
	$sistem = $sistem->fetch(PDO::FETCH_ASSOC);
	?>
	<div id="tovar_sistem">
		<div class="tovar_sistem">
			<label class="label">
				Системные требования
			</label>
			<div class="sistem">
				<button class="butt but_activeen" id="min">
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
					<textarea name="comm">

					</textarea>
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
			$comm = $akk->readComm($var_value);
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
		if ($_SESSION['auth'] == 1 && !empty($_POST['comm'])) {
			$akk->createComm($var_value,$_SESSION['login'],$_POST['comm'],date('Y-m-d'));
		}
	}
	?>
	<?php
	include_once 'footer.php';
	?>