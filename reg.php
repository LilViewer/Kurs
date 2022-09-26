<?
// Страница регистрации нового пользователя
// Соединямся с БД
$link=mysqli_connect("localhost", "root", "root", "kurs");

if(isset($_POST['but_reg']))
{
    $err = [];

    // проверям логин
    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['Name_reg']))
    {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    }

    if(strlen($_POST['Name_reg']) < 3 or strlen($_POST['Name_reg']) > 30)
    {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    }

    // проверяем, не сущестует ли пользователя с таким именем
    $query = mysqli_query($link, "SELECT user_id FROM users WHERE user_login='".mysqli_real_escape_string($link, mb_strtoupper($_POST['Name_reg']))."'");
    if(mysqli_num_rows($query) > 0)
    {
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    }

    // проверяем, не сущестует ли пользователя с такой почтой
    $query = mysqli_query($link, "SELECT user_id FROM users WHERE email='".mysqli_real_escape_string($link, mb_strtoupper($_POST['Email_reg']))."'");
    if(mysqli_num_rows($query) > 0)
    {
        $err[] = "Пользователь с такой почтой уже существует в базе данных";
    }

    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {

        $login = $_POST['Name_reg'];
        $login = mb_strtoupper($login);

        $password = $_POST['Password_reg'];
        $password = mb_strtoupper($password);

        $email = $_POST['Email_reg'];
        $email = mb_strtoupper($email);

        mysqli_query($link,"INSERT INTO users SET user_login='".$login."', user_password='".$password."',email='".$email."'");
        header("Location: log.php"); exit();
    }
    else
    {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
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
                <a class="but  left blur " id="log_but" href="log.php">
                    Ввойти
                </a>
                <a class="but but_active right blur " id="reg_but" href="reg.php">
                    Регистрация
                </a>
                <span class="kagkopam"></span>
            </legend>
            <div class="block_reg">
                <form action="#" method="POST">
                    <div class="blur log_grid">
                        <div class="grid_input">
                            <div>
                                Name
                            </div>
                            <input type="text" name="Name_reg" >
                        </div>
                        <div class="grid_input">
                            <div>
                                Email
                            </div>
                            <input type="email" name="Email_reg" >
                        </div>
                        <div class="grid_input">
                            <div>
                                Password
                            </div>
                            <input type="password" name="Password_reg" >
                        </div>
                    </div>
                    <div class="but_reg" >
                        <input type="submit" name="but_reg" class="button" value="Регистрация">
                    </div>
                </form>
            </div>
        </fieldset>
    </div>



    <script type="text/javascript" src="libs/sctipt1.js"></script>
</body>
</html>