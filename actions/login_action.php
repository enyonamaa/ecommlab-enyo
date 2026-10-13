<?php

require_once __DIR__ . '/../core/cor.php';
require_once __DIR__ . '/../controllers/CustomerController.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect(BASE_URL . '/views/login.php');
}

$email = trim($_POST['email'] ?? '');
$pass = $_POST['password'] ?? '';

if ($email === '' || $pass === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = 'PLease enter a valid email and password.';
    redirect(BASE_URL . '/views/login.php');
}

$ctrl = new CustomerController();
$result = $ctrl->login($email, $pass);

if (isset($result['error'])) {
    $_SESSION['error'] = $result['error'];
    redirect(BASE_URL . '/views/login.php');
}

$_SESSION['customer_id'] = $result['customer_id'];
$_SESSION['customer_name'] = $result['customer_name'];
$_SESSION['customer_email'] = $result['customer_email'];
$_SESSION['user_role'] = (int)$result['user_role'];


redirect(BASE_URL . '/index.php');