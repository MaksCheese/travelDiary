<?php
    session_start();
    require_once 'connect.php';

    $country = $_POST['country'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $dateTravel = $_POST['dateTravel'];

    $userLogin = $_SESSION['user']['userLogin'];
    
    mysqli_query($link, "CREATE TABLE IF NOT EXISTS `travelD`.`".$userLogin."` (`id` INT NOT NULL AUTO_INCREMENT , 
                                                                `country` VARCHAR(100) NULL ,
                                                                `description` VARCHAR(4000) NULL ,
                                                                `price` VARCHAR(50) NULL ,
                                                                `dateTravel` varchar(50) NULL,
                                                                `photoTravel` VARCHAR(255) NULL ,
                                                                PRIMARY KEY (`id`)) ENGINE = InnoDB;");
    

    $path = 'uploads/travelImages/' . time() . $_FILES['photoTravel']['name'];
            if(!move_uploaded_file($_FILES['photoTravel']['tmp_name'], '../' . $path)){
                $_SESSION['message'] = 'Ошибка при загрузке изображения';
                header('Location: ../addTravel.php');
            }            
            mysqli_query($link, "INSERT INTO `".$userLogin."` SET id = NULL,
                                                                country = '$country',
                                                                description = '$description',
                                                                price = '$price',
                                                                dateTravel = '$dateTravel',
                                                                photoTravel = '$path'");
            header('Location: ../main.php');
            