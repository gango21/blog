<?php

$host ='localhost';
$dbname ='test';
$user='root';
$password='';

$_ENV["DB"] = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);


?>
