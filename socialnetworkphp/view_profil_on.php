<?php
session_start();
// se connecter à la db sur myadmin
$engine = "mysql";
$host = "localhost";
$port = 8889; 
$dbname = "projetphp";
$username = "root";
$password = "root"; 
$pdo = new PDO("$engine:host=$host:$port;dbname=$dbname", $username, $password);
$bdd = new PDO("$engine:host=$host:$port;dbname=$dbname", $username, $password);




