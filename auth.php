<?php
session_start();
require_once 'functions.php';
$login = $_POST['login'];
$password = $_POST['password'];

$result = queryMysql("SELECT `login`, `forename`, `password` FROM `users` WHERE login='$login'");
$row = $result->fetch();

if($password == $row['password']){
    $_SESSION['login'] = $row['login']; 
    $_SESSION['username'] = $row['forename']; 
    header('Location: /');
}else{
    echo 'error';
}
?>