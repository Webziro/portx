<?php
// Raw connection test - show actual error
header('Content-Type: text/plain');
echo "=== RAW CONNECTION TEST ===\n";
echo "Timestamp: " . date('Y-m-d H:i:s') . "\n";
echo "HTTP_HOST: " . ($_SERVER['HTTP_HOST'] ?? 'CLI') . "\n\n";

$credentials = [
    'local' => ['host' => 'localhost', 'db' => 'portfolio_db', 'user' => 'root', 'pass' => ''],
    'prod' => ['host' => 'localhost', 'db' => 'huwesdio_stanley_db', 'user' => 'huwesdio_stanley_db', 'pass' => 'z4D7h98DENSbn9qQ4WfP'],
];

foreach ($credentials as $name => $c) {
    try {
        $p = new PDO("mysql:host={$c['host']};dbname={$c['db']};charset=utf8mb4", $c['user'], $c['pass']);
        echo "[$name] CONNECTED to {$c['db']} as {$c['user']}\n";
    } catch (PDOException $e) {
        echo "[$name] FAILED: " . $e->getMessage() . "\n";
    }
}

require_once __DIR__ . '/include/db.php';

header('Content-Type: text/plain');

echo "=== DATABASE DIAGNOSTIC FOR AMAZIRO.NAME.NG ===\n";
echo "Timestamp: " . date('Y-m-d H:i:s') . "\n";
echo "HTTP_HOST: " . ($_SERVER['HTTP_HOST'] ?? 'CLI') . "\n";
echo "PDO Connection Status: " . ($pdo ? "CONNECTED" : "FAILED") . "\n\n";

if ($pdo) {
    try {
        // Force seed execution
        seed_portfolio_data($pdo);
        echo "Executed seed_portfolio_data() successfully.\n\n";

        foreach (['profile', 'services', 'projects', 'blogs', 'credentials', 'users'] as $t) {
            $cnt = $pdo->query("SELECT COUNT(*) FROM `$t`")->fetchColumn();
            echo "Table `$t`: $cnt rows\n";
        }

        echo "\nProfile Name: " . ($pdo->query("SELECT full_name FROM profile WHERE id=1")->fetchColumn() ?: 'NONE') . "\n";
        echo "Sample Project: " . ($pdo->query("SELECT title FROM projects LIMIT 1")->fetchColumn() ?: 'NONE') . "\n";
    } catch (Exception $e) {
        echo "Query Error: " . $e->getMessage() . "\n";
    }
} else {
    echo "Could not connect to database. Check credentials in include/db.php.\n";
}
