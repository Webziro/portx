<?php
// Database Configuration
if ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '127.0.0.1') {
    // Local (XAMPP)
    $host = 'localhost';
    $db   = 'portfolio_db';
    $user = 'root';
    $pass = '';
} else {
    // Production (Shared Hosting)
    $host = 'localhost';
    $db   = 'huwesdio_stanley_db';
    $user = 'huwesdio_stanley_db';
    $pass = 'z4D7h98DENSbn9qQ4WfP';
}

$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
