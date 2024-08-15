<?php
    session_start();
    require_once 'inc/connect.php';       
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" href="css/main.css">
    
</head>
<body>
    <button class="btnExit"><a class="exit" href="inc/logout.php">Выход</a></button>
    <h1>Дневник Путешествий</h1>
    <div class="general">
        <div class="infoUser">
            <?php
            $userID = $_GET['id'];

            $aboutUser = mysqli_query($link, "SELECT * FROM `users` WHERE `id` = $userID");
            $userArr = mysqli_fetch_all($aboutUser);
            foreach($userArr as $usArr){ 
            ?>
            <div class="imgInfo">
                <img src="<?php print_r($usArr[6]);?>" style="height: 200px; width: 200px;">
            </div>
            <div class="textInfo">
                <div class="userName"><p class="userData">Имя:<br></p><?php echo $usArr[1];?></div>
                <?php 
                    $date = mysqli_query($link, "SELECT birthDay FROM users WHERE userLogin = '$usArr[3]'");
                    $date = date('d.m.Y');
                ?>
                <div class="birthDay"><p class="userData">Дата рождения:<br></p><?php echo $date;?></div>
                <div class="aboutUser"><p class="userData">Информация о пользователе:<br></p><?php echo $usArr[7];?></div>
            </div>

            
        </div>
        <div class="content">
            <div class="blockTravel">
                <div class="addTravel">
                    
                </div>
                <?php
                    // $userLogin = $usArr[2];
                    $travels = mysqli_query($link, "SELECT * FROM $usArr[2]");
                    if(!$travels){
                        print_r("Error!!!!" . mysqli_error($link));
                    } else{
                        $travels = mysqli_fetch_all($travels);
                        foreach($travels as $travel){                        
                ?>
                            <div class="travel">
                                <div class="col">
                                    <div class="aboutTravel">
                                        <div class="leftCol">
                                            <img src="<?php echo $travel[5];?>" style="width: 150px; height: 150px" alt=""><p></p>
                                        </div>
                                        <div class="rightCol">
                                            <h3>Страна: <?php echo $travel[1];?> </h3>
                                            <p class="descTravel"><h3>Дата:</h3> <?php echo $travel[4];?></p>
                                            <p class="descTravel"><h3>Стоимость:</h3> <?php echo $travel[3];?></p>
                                               
                                        </div>
                                    </div>
                                    <div class="desc">
                                        <p class="descTravel"><h3>Описание:</h3> <?php echo $travel[2];?></p>  
                                    </div>
                                </div>
                            </div>        
                <?php 
                        }
                    }
                };
                ?>
            </div>
            
        </div>
        <div class="otherUsers">
        <?php
                $users = mysqli_query($link, "SELECT id, userLogin FROM users");
                
                $usersAll = mysqli_fetch_all($users);
                foreach($usersAll as $usArr){
            ?>
                <div class="anyUser">
                    <p class="descTravel" style="font-size: 25px"><a href="anotherUser.php?id=<?= $usArr[0];?>" style="text-decoration: none; color: black;"><?= $usArr[1];?></a></p>
                </div>
            <?php
                }
            ?>
        </div>
    </div>
</body>
</html>