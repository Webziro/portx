<?php
    // Pull experience start year from database
    require_once __DIR__ . '/db.php';
    $profileRow = $pdo->query("SELECT experience_start_year FROM profile WHERE id=1")->fetch();
    $startYear = $profileRow ? (int)$profileRow['experience_start_year'] : 2021;

    $now = new DateTime();
    $currentYear = (int)$now->format('Y');
    $years = max(1, $currentYear - $startYear);
    $displayYears = '+' . $years;