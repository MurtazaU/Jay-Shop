<?php
include('../database-connection.php');
session_start();

$orignaluseremail = $_SESSION['user_email'];
$sql = $con -> prepare('delete from users where useremail = ?');
$sql -> bindParam(1,$orignaluseremail);
$sql -> execute();

header('location: ../registration/register.php');

session_unset();
session_destroy();




?>