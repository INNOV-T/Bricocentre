<?php
$host = 'localhost';
$user = 'root';
$pwd = '';
$dbname = 'bricocentre';
try {
    $connection = new PDO("mysql:host=$host;dbname=$dbname", $user, $pwd);
} catch (Exception $e) {
    echo "erreur" . $e->getMessage() . "</br>";
    exit();
}
