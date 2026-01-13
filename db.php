<?php
session_start(); // Esențial pentru login

$host = 'mysql'; 
$port = 3306;
$db = 'studenti';
$user = 'user'; 
$pass = 'password'; 
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Eroare conectare DB: " . $e->getMessage());
}
?>