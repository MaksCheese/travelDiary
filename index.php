<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/registerStyle.css">
    
</head>
<body>
    <h1>Добро пожаловать в Дневник Путешествий!</h1>
    <h3>Зарегестрируйтесь, чтобы начать!</h3>
    <div class="form">
        <form action="inc/register.php" enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="">Имя</label>
                <input type="text" placeholder="Введите Ваше имя" name="userName">
            </div>
    
            <div class="mb-3">
                <label for="">Логин</label>
                <input type="text" placeholder="Введите Ваш логин" name="userLogin">
            </div>    
            <div class="mb-3">
                <label for="">Год рождения</label>
                <input type="date" name="birthDay" id="" placeholder="Введите дату рождения">    
            <div class="mb-3">
                <label for="">Почта</label>
                <input type="text" placeholder="Введите Ваш email" name="userEmail">
            </div>    
            <div class="block1">
                <div class="col">
                    <div class="mb-3">
                        <label for="">Фото профиля</label>
                        <input type="file" name="userPhoto">
                    </div>            
                    <div class="mb-3">
                        <label for="">Пароль</label>
                        <input type="password" placeholder="Введите пароль" name="password">
                    </div>            
                    <div class="mb-3">
                        <label for="">Подтверждение пароля</label>
                        <input type="password" placeholder="Подтвердите пароль" name="passwordCheck">
                    </div>
                </div>
                <div class="block3">
                    <label>Немного информации о себе:</label>
                    <textarea name="aboutUser" placeholder="Расскажите немного о себе" style="height:200px ; width: 400px"></textarea>
                </div>
            </div>
    
            <button type="submit">Зарегестрироваться</button>
            <p>
                У вас есть аккаунт? | <a href="authorizePage.php">авторизироваться</a>
            </p>
            <?php 
                if($_SESSION['message']){
                    echo '<p class="msg">' . $_SESSION['message'] . '</p>';
                }
                unset($_SESSION['message']);
            ?>
        </form>
    </div>
</body>
</html>