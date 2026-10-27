<?php 

$host = "localhost";
$user = "root";
$password = "";
$dbname = "Diaz";
$dsn = "mysql:host={$host};dbname={$dbname}";

try {
    $pdo = new PDO($dsn, $user, $password);
    
    // Set PDO error mode to exception for easier debugging
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Set default fetch mode to associative array
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Set timezone
    $pdo->exec("SET time_zone = '+08:00';");

} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

?>