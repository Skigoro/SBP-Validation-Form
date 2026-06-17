<?php
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$database = 'nyandarua_sbp';

try {
    $pdo = new PDO("mysql:host=$host;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);

    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$database` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    $pdo->exec("USE `$database`");
    $pdo->exec(
        "CREATE TABLE IF NOT EXISTS `sbp_applications` (
            `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
            `email` VARCHAR(255) NOT NULL,
            `ward` VARCHAR(100) NOT NULL,
            `sbp_no` VARCHAR(100) NOT NULL,
            `application_no` VARCHAR(100) NOT NULL,
            `business_name` VARCHAR(255) NOT NULL,
            `type_of_business` VARCHAR(255) NOT NULL,
            `town_market` VARCHAR(255) NOT NULL,
            `amount_paid` DECIMAL(10,2) NOT NULL,
            `comment` TEXT NULL,
            `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4"
    );

    echo "Database '$database' and table 'sbp_applications' created or already exist.";
} catch (PDOException $e) {
    echo 'Setup failed: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
}
