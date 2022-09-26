<?php require_once 'config/database.php';
require_once 'objects/tovar.php';
$database = new Database();
$db = $database->getConnection();
$tovar = new Tovar($db);
$stmt = $tovar->readNameOne();



?> 
<div id="line">
  <div id="green_line">

  </div>
</div>
<section class="vertical-center slider" id="section">
  <?php
  while($name = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
    <div >
      <div id="slider_tovar">
        <label id="slide_name">
          <a  href="tovar.php?varname=<?php echo $name[id_tovar]?>">
          <?php 
          echo $name[name];
          echo '</a>';
          $stmtt = $tovar->readKey($name[id_tovar]); 
          $key = $stmtt->fetchAll(PDO::FETCH_ASSOC);
          $tovar_hearth = $tovar->tovar_hearth($_SESSION['id'],$name[id_tovar]);
          $tovar_hearth = $tovar_hearth->fetchAll(PDO::FETCH_ASSOC);
          if(COUNT($tovar_hearth)>=1){
            $heart = "heart_point";
          }
          else{
            $heart = "heart";
          }
          ?>
          <form action="#" method="POST">
            <input style="background-image: url('content/icon/<?php echo $heart?>.png')" type="submit" class="but_img_two" value="<?php echo $name[id_tovar] ?>" name="but_img">
          </form>
          <?php

        // echo '<img src="content/icon/'.$heart.'.png" width="30" id="img_heart_two">';

          ?>



        </label>
          <form action="#" method="POST" class="gf">
            <label class="label_tovar buttonn <?php echo (COUNT($key) >= 1)? 'button':'but_none' ?>">
              В корзину
            </label>
            <input class="" type="submit" name="buy_b"  value="<?php echo $name[id_tovar] ?>"   id="ff" >
          </form>
          <label id="price_slide">
            <?php echo $name[price]." ₽"; ?>
          </label>
          <label id="discount_slide">
            <?php echo "-".$name[discount]."%"; ?>
          </label>
      </div>
      <?php
      echo "<img id='spec_img' src='content/tovar-image/".$name[name].".jpg'>";
      ?>
    </div>
    <?php 
  } 
  ?>
</section>

<?php
if(isset($_POST['buy_b']) && $_SESSION['auth'] == 1 ){
  $var_value = $_POST['buy_b'];
  $stmtt = $tovar->readKey($var_value); 
  $key = $stmtt->fetchAll(PDO::FETCH_ASSOC);
  $tovar_basket_yes = $tovar->tovar_basket_yes($_SESSION['id'],$var_value);
  $tovar_basket_yes = $tovar_basket_yes->fetch(PDO::FETCH_ASSOC);
  if ($tovar_basket_yes == null && COUNT($key)>=1) {
    $create_basket = $tovar->create_basket($_SESSION['id'],$var_value);
  }
}

if(isset($_POST['but_img']) && $_SESSION['auth'] == 1){
  $var_value = $_POST['but_img'];
  $tovar_hearth_yes = $tovar->tovar_hearth_yes($_SESSION['id'],$var_value);
  $tovar_hearth_yes = $tovar_hearth_yes->fetch(PDO::FETCH_ASSOC);
  if ($tovar_hearth_yes == null) {
    $create_heart = $tovar->create_hearth($_SESSION['id'],$var_value);
  }
  else{

    $tovar_hearth_delet = $tovar->tovar_hearth_delet($_SESSION['id'],$var_value); 
  }
}

?>
<div id="black_slider">

</div>

<!-- <div class="keys " id="keys_one" >
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

  <a class="button_active" href="basket.php?varname=<?php echo $keys[id_tovar]?>">
    В корзину
  </a>
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
  <a href="" class="tdi"><img src="content/icon/row3.png"></a>
</div>
-->

