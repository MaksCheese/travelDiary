<?php
    $link = mysqli_connect('localhost', 'root', '', 'travelD');

    if(!$link){
        $error = mysqli_error($link);
        echo "Error: $error";
    }