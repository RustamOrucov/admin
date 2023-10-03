<?php
session_start();
ob_start();
define('DB_HOST','localhost');
define('DB_NAME','project_1');
define('DB_USER','root');
define('DB_PASSWORD','');

try{
     $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
   $db->query('SET CHARSET utf8');

}catch(\PDOException $th){
     echo $th->getMessage();
}

