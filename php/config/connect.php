<?php
$user="root";
$password="123";
$host="localhost";
$db="primex";
$dbh='mysql:host='.$host.';dbname='.$db.';char set=utf8';
$pdo=new PDO($dbh, $user, $password);
$connect = mysqli_connect("localhost", "root", "123", "primex");  
if (!$connect){
    die('error');
}
?>