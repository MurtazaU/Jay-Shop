<?php


// 4 Variables

$dbname = 'zayshop';
$host = 'localhost';
$username = 'root';
$password = '';

$dsn = "mysql:host=$host; dbname=$dbname" ;

try{
    $con = new PDO($dsn, $username, $password);
}
catch(Exception $e){
    echo $e->getMessage();
}







?>