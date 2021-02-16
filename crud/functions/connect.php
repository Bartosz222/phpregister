<?php

$serverName = 'localhost';
$user = 'root';
$passwd = '';
$db = 'cars';

$conn = mysqli_connect($serverName, $user, $passwd, $db);
mysqli_set_charset($conn, "UTF8");

if(!$conn){
    die('Błąd połączenia'.mysqli_connect_error());
}