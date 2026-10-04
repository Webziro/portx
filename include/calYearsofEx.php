<?php
// Pull experience start year from database
require_once __DIR__ . '/db.php';
$startYear = 2021;
if (isset($pdo) && $pdo) {
    try {
        $profileRow = $pdo->query("SELECT experience_start_year FROM profile WHERE id=1")->fetch();
        if ($profileRow && !empty($profileRow['experience_start_year'])) {
            $startYear = (int) $profileRow['experience_start_year'];
        }
    } catch (\Exception $e) {
        error_log($e->getMessage());
    }
}

$now = new DateTime();
$currentYear = (int) $now->format('Y');
$years = max(1, $currentYear - $startYear);
$displayYears = '+' . $years;
?>