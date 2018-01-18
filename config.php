<?php
 
$databaseHost = 'localhost';
$databaseName = 'testek13';
$databaseUsername = 'root';
$databasePassword = '';
 
try {
    // http://php.net/manual/en/pdo.connections.php
    $dbConn = new PDO("mysql:host={$databaseHost};dbname={$databaseName}", "root", "");
    
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Caso ocorra o erro tem a exceção
    // More on setAttribute: http://php.net/manual/en/pdo.setattribute.php
} catch(PDOException $e) {
    echo $e->getMessage();
}
 
?>