<?php

$host = 'localhost';
$dbName = 'hotel';
$user = 'root';
$pwd = '';

try {
    $maDB = new PDO("mysql:host=$host;dbname=$dbName", $user, $pwd, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    echo "Error :" . $e->getMessage();
}
