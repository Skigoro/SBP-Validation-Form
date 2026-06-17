<?php
require_once __DIR__ . '/db.php';

function redirect($status) {
    header('Location: index.php?status=' . $status);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('error');
}

$email = trim($_POST['email'] ?? '');
$ward = trim($_POST['ward'] ?? '');
$sbpNo = trim($_POST['sbpNo'] ?? '');
$applicationNo = trim($_POST['applicationNo'] ?? '');
$businessName = trim($_POST['businessName'] ?? '');
$typeOfBusiness = trim($_POST['typeOfBusiness'] ?? '');
$townMarket = trim($_POST['townMarket'] ?? '');
$amountPaid = trim($_POST['amountPaid'] ?? '');
$comment = trim($_POST['comment'] ?? '');

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)
    || empty($ward)
    || empty($sbpNo)
    || empty($applicationNo)
    || empty($businessName)
    || empty($typeOfBusiness)
    || empty($townMarket)
    || $amountPaid === ''
    || !is_numeric($amountPaid)
) {
    redirect('error');
}

try {
    $pdo = getDbConnection();
// check for duplicate
    $check = $pdo->prepare(
        "SELECT id FROM sbp_applications
         WHERE application_no = :application_no
            OR sbp_no = :sbp_no"
    );
    
    $check->execute([
        ':application_no' => $applicationNo,
        ':sbp_no' => $sbpNo
    ]);
    
    if ($check->fetch()) {
        redirect('duplicate');
    }
    $stmt = $pdo->prepare(
        'INSERT INTO sbp_applications
        (email, ward, sbp_no, application_no, business_name, type_of_business, town_market, amount_paid, comment)
        VALUES
        (:email, :ward, :sbp_no, :application_no, :business_name, :type_of_business, :town_market, :amount_paid, :comment)'
    );

    $stmt->execute([
        ':email' => $email,
        ':ward' => $ward,
        ':sbp_no' => $sbpNo,
        ':application_no' => $applicationNo,
        ':business_name' => $businessName,
        ':type_of_business' => $typeOfBusiness,
        ':town_market' => $townMarket,
        ':amount_paid' => number_format((float)$amountPaid, 2, '.', ''),
        ':comment' => $comment !== '' ? $comment : null,
    ]);

    redirect('success');
} catch (PDOException $e) {
    redirect('error');
}
