<?php
    session_start();
    require_once 'inc/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новая запись</title>
    <link rel="stylesheet" href="css/addTravel.css">
    <link rel="stylesheet" href="css/navBar.css">
</head>
<body>
    <?php include 'templates/nav.php';?>
    <h1>Новое путешествие:</h1>
    <div class="form">
        <form action="inc/addTravel.php" method="post" enctype="multipart/form-data">
            <div class="mb-3 add">
                <label>Страна:<br></label>
                <input name="country" type="text" placeholder="Введите название страны">
            </div>
            <div class="mb-3 add">
                <label>Описание путешествия<br></label>
                <textarea name="description" style="width: 500px; height: 200px;" placeholder="Введите Ваши впечатления"></textarea>
            </div>
            <div class="mb-3">
                <label for="">Дата путешествия:</label>
                <input type="date" name="dateTravel" id="" placeholder="Введите дату рождения">    
            <div class="mb-3">
            <div class="mb-3 add">
                <label>Стоимость:<br></label>
                <input name="price" type="text" placeholder="Введите стоимость">
            </div>
            <div class="mb-3 add">
                <label>Фото:<br></label>
                <input type="file" name="photoTravel">
            </div>
            <button class="newTravel" type="submit">Добавить путешествие</button>
        </form>
    </div>
</body>
</html>