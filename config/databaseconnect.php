<?php
include_once(__DIR__ . '/mysql.php');

try {
    $pdo_connexion = new PDO(
        "mysql:host={$host_value};dbname={$database_name};charset=utf8",
        $database_user,
        $database_password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );
} catch (\Exception $error) {
    die("Connextion a la BASE DE DONNEE ECHOUée: {$e->getMessage()}");
}
?>