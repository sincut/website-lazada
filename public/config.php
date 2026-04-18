<?php
// config.php

$DB_HOST = "localhost";
$DB_NAME = "anakwrpf_lazada";
$DB_USER = "anakwrpf_sincut";
$DB_PASS = "@Inikuncinya098";

try {
    $pdo = new PDO(
        "mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4",
        $DB_USER,
        $DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    http_response_code(500);
    exit("Database connection failed");
}