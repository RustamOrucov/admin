<?php


if(!isset($_SERVER['HTTP_REFERER'])){

     header('Location:login.php');

}

 if(!isset($_SESSION['user']['id'])){
    header('Location: login.php');
    die;
 }


 logout();


