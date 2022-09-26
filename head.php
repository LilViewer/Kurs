<?php session_start(); 

include_once 'config/database.php';
$database = new Database();
$db = $database->getConnection();
include_once 'objects/tovar.php';
$tovar = new Tovar($db);
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <title>ViewerShop</title>
  <meta charset="UTF-8 with BOM">
  <link rel="shortcut icon" href="content/icon/logo.png" type="image/png">
  <link rel="stylesheet" type="text/css" href="/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="/slick/slick-theme.css"/>
  <link rel="stylesheet" type="text/css" href="../libs/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body style="background-color: black">
  <header>
    <div class="flex_left">
      <a href="index.php"><img src="content/icon/logo.png" width="60"></a>
    </div>
    <div id="block_cat_search">
      <a href="cat.php" class="button">
       Каталог игр
     </a>
     <form action="#" method="post" id="block_search">
       <input type="text" name="search" maxlength="40" id="search">
       <input  type="submit"  name="but_search" id="but_search" >
       <!-- <img src="content/icon/lupa.png" width="40">  -->
     </form>
   </div>
   <div  class="flex_right">

    <?php echo ($_SESSION['auth'] != 1)? '<a href="log.php" class="button">Войти</a>':'<a href=cabinet.php ><img src="../content/icon/cabinet.png" class="cabinet"></a>'?>
    <!-- <a href="log.php" class="button">Войти</a> -->

    <a href="hearth.php">
      <img src="content/icon/heart.png" class="img_head">
    </a>
    <?php
    $stmt = $tovar->kol_basket($_SESSION['id']);
    $basketOne = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = $tovar->kol_basketTwo($_SESSION['id']);
    $basketTwo = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $kol_hearth = $tovar->kol_hearth($_SESSION['id']);
    $kol_hearth = $kol_hearth->fetchAll(PDO::FETCH_ASSOC);
    $kol_hearthTwo = $tovar->kol_hearthTwo($_SESSION['id']);
    $kol_hearthTwo = $kol_hearthTwo->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="circleH onecircle <?php echo ((Count($kol_hearth)+Count($kol_hearthTwo))==0)? "display_none":"" ?>">
      <?php echo ((Count($kol_hearth)+Count($kol_hearthTwo))>9)? "+9":(Count($kol_hearth)+Count($kol_hearthTwo))?>
    </div>
    <a href="basket.php">
     <img src="content/icon/buy.png" class="img_head buy ">
   </a>
   <div class="circleH twocircle <?php echo ((Count($basketOne)+Count($basketTwo))==0)? "display_none":"" ?>">
     <?php echo ((Count($basketOne)+Count($basketTwo))>9)? "+9":(Count($basketOne)+Count($basketTwo))?>
   </div>
 </div>
</header>