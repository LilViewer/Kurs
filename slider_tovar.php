<?php
require_once 'config/database.php';
require_once 'objects/tovar.php';
$database = new Database();
$db = $database->getConnection();

$tovar = new Tovar($db);
$var_value = $_GET['varname'];
$stmt = $tovar->slider_tovar($var_value);
?> 
<div id="line">
  <div id="green_line">

  </div>
</div>
<section class="vertical-center slider">
  <?php
  while($name = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo "<div>";
    ?>
    <div id="slider_tovar">
      <label class="slider_name">
       <?php echo $name[name]; ?>
     </label>
     <div id="slider_grid">
      <button class="button">
        В корзину
      </button>
      <label id="price_slide">
        <?php echo $name[price]." ₽"; ?>
      </label>
      <label id="discount_slide">
        <?php echo "-".$name[discount]."%"; ?>
      </label>
    </div>
  </div>
  <?php
  echo "<img src='content/tovar-image/".$name[name].".jpg'></div>";
}
?>
</section>
<?php


?>
<div id="black_slider">

</div>

<div class="keys " id="keys_one" >
  <div>
    Кейсы с ключами
  </div>
  <label>
    Испытай удачу! Наши самые
    лучшие рандомы, которые мы
    улучшали в течение нескольких
    лет.
  </label>
  <a href=""><img src="content/icon/row3.png"></a>
</div>

<div class="keys " id="keys_two" >
  <div>
    Кейсы с аккаунтами
  </div>
  <label>
    Испытай удачу! Наши самые
    лучшие рандомы, которые мы
    улучшали в течение нескольких
    лет.
  </label>
  <a href=""><img src="content/icon/row3.png"></a>
</div>

<?php 
$stmt = $tovar->tovar_day(); 
$keys = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<div class="keys_gorizont hover" id="keys_three" >
    <button class="button_active" value="<?php echo $keys[id_tovar]?>">
      В корзину
    </button>
  <div>
    <label>Товар дня:</label><br>
    <?php echo $keys[name]?>
  </div>
  <label id="keys_discount">
    <?php echo "-".$keys[discount]."%"?>
  </label>
  <label id="keys_price">
    <?php echo $keys[price]." ₽"?>
  </label>
</div>

<div class="keys_gorizont " id="keys_four" >
  <div>
    Лотерея
  </div>
  <label>
    Выигрывай игры покупая товар
  </label>
  <a href=""><img src="content/icon/row3.png"></a>
</div>


