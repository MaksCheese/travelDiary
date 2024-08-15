<?php
    session_start();
    require_once 'connect.php';

    $userName = $_POST['userName'];
    $userLogin = $_POST['userLogin'];
    $birthDay = $_POST['birthDay'];
    $userEmail = $_POST['userEmail'];
    $password = $_POST['password'];
    $passwordCheck = $_POST['passwordCheck'];
    $aboutUser = $_POST['aboutUser'];

    mysqli_query($link, "CREATE TABLE IF NOT EXISTS `travelD`.`users` (`id` INT NOT NULL AUTO_INCREMENT , 
                                                        `userName` VARCHAR(255) NULL , 
                                                        `userLogin` VARCHAR(255) NULL , 
                                                        `birthDay` VARCHAR(255) NULL, 
                                                        `userEmail` VARCHAR(255) NULL ,  
                                                        `password` VARCHAR(255) NULL ,  
                                                        `userPhoto` VARCHAR(500) NULL ,  
                                                        `aboutUser` VARCHAR(4000) NULL ,  
                                                        PRIMARY KEY (`id`)) ENGINE = InnoDB;");

    $checkLogin = mysqli_query($link, "SELECT * FROM users WHERE userLogin = '$userLogin'");
    
    if(mysqli_num_rows($checkLogin) > 0) {
        $_SESSION['message'] = 'Такой логин уже существует!';
        header('Location: ../index.php');
    } else {
        if($password === $passwordCheck) {

            $password = sha1($password);

            $path = 'uploads/avatarsImgs/' . time() . $_FILES['userPhoto']['name'];
            if(!move_uploaded_file($_FILES['userPhoto']['tmp_name'], '../' . $path)){
                $_SESSION['message'] = 'Ошибка при загрузке изображения';
                header('Location: ../index.php');
            }
            
            mysqli_query($link, "INSERT INTO `users` (`id`, `userName`, `userLogin`, `birthDay`,`userEmail`, `password`, `userPhoto`, `aboutUser`) 
                                VALUES (NULL, '$userName', '$userLogin', '$birthDay', '$userEmail', '$password', '$path', '$aboutUser')");
            $_SESSION['message'] = 'Регистрация прошла успешно!';
            header('Location: ../authorizePage.php');
        } else {
            $_SESSION['message'] = 'Пароли не совпадают';
            header('Location: ../index.php');
        }
    }
    