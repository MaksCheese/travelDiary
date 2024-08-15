<?php
    session_start();
    require_once 'connect.php';

    $userlogin = $_POST['userlogin'];
    $password = sha1($_POST['password']);

    $checkUser = mysqli_query($link, "SELECT * FROM users WHERE userLogin = '$userlogin' AND password = '$password'");

    if(mysqli_num_rows($checkUser) > 0){
        $user = mysqli_fetch_assoc($checkUser);
        $_SESSION['user'] =[
            "id" => $user['id'],
            "userName" => $user['userName'],
            "userLogin" => $user['userLogin'],
            "birthDay" => $user['birthDay'],
            "userPhoto" => $user['userPhoto'],
            "userEmail" => $user['userEmail'],
            "aboutUser" => $user['aboutUser'],
        ];
        header('Location: ../main.php');

    } else{
        $_SESSION['message'] = 'Неверный логин или пароль';
        header('Location: ../authorizePage.php');
    }