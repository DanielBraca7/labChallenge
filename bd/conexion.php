<?php

//configuramos la conexion a la base de datos

$host = "localhost";
$dbname = "informe_ventas";
$user="root";
$password="";

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}