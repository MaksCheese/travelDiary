<?php 
    session_start();
    require_once 'inc/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="stylesheet" href="css/registerStyle.css">
    
</head>
<body>
    <h1>Рады приветствовать Вас!</h1>
    <div class="form">
        <form action="inc/authorize.php" method="post">
            <div class="mb-3">
                <label for="">Логин</label>
                <input type="text" placeholder="Введите Ваш логин" name="userlogin">
            </div>    
            <div class="mb-3">
                <label for="">Пароль</label>
                <input type="password" placeholder="Введите пароль" name="password">
            </div>
            <button type="submit">Войти</button>
            <p>
                У вас есть аккаунт? | <a href="index.php">зарегестрироваться</a>
            </p>
        </form>
        <?php 
                if($_SESSION['message']){
                    echo '<p class="msg">' . $_SESSION['message'] . '</p>';
                }
                unset($_SESSION['message']);
            ?>
    </div>
</body>
</html>