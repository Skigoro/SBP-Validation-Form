CREATE DATABASE IF NOT EXISTS nyandarua_sbp CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE nyandarua_sbp;

CREATE TABLE IF NOT EXISTS sbp_applications (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    ward VARCHAR(100) NOT NULL,
    sbp_no VARCHAR(100) NOT NULL,
    application_no VARCHAR(100) NOT NULL,
    business_name VARCHAR(255) NOT NULL,
    type_of_business VARCHAR(255) NOT NULL,
    town_market VARCHAR(255) NOT NULL,
    amount_paid DECIMAL(10,2) NOT NULL,
    comment TEXT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
