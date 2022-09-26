<?
// Страница авторизации

// Соединямся с БД
$link=mysqli_connect("localhost", "root", "root", "kurs");

if(isset($_POST['but_log']))
{
    // Вытаскиваем из БД запись, у которой логин равняеться введенному
    $query = mysqli_query($link,"SELECT user_id, user_password,user_login FROM users WHERE user_login='".mysqli_real_escape_string($link,$_POST['Name_log'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);

    // Сравниваем пароли
    if($data['user_password'] === mb_strtoupper($_POST['Password_log']))
    {
        session_start();
        //Пишем в сессию информацию о том, что мы авторизовались:
        $_SESSION['auth'] = true; 

            //Пишем в сессию логин и id пользователя (их мы берем из переменной $data!):
        $_SESSION['id'] = $data['user_id']; 
        $_SESSION['login'] = $data['user_login']; 
        header("Location: index.php"); exit();
    }
    else
    {
        print "Вы ввели неправильный логин/пароль";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>ViewerShop</title>
    <link rel="stylesheet" type="text/css" href="libs/style.css">
</head>
<body id="log">
    <div id="logins" >
        <fieldset>
            <legend >
                <a class="but but_active left blur " id="log_but" href="log.php">
                    Ввойти
                </a>
                <a class="but right blur " id="reg_but" href="reg.php">
                    Регистрация
                </a>
                <span class="kagkopam"></span>
            </legend>
            <div class="block_log">
                <form action="#" method="POST">
                    <div class="blur log_grid">
                        <div class="grid_input">
                            <div>
                                Name
                            </div>
                            <input type="text" name="Name_log" >
                        </div>
                        <div class="grid_input">
                            <div>
                                Password
                            </div>
                            <input type="password" name="Password_log" >
                        </div>
                    </div>
                    <div class="but_log">
                        <input type="submit" name="but_log" class="button" value="Логин">
                    </div>
                </form>
            </div>
        </fieldset>
    </div>



    <script type="text/javascript" src="libs/sctipt1.js"></script>
</body>
</html>