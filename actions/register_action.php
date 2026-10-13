<?php
require_once __DIR__ . '/../core/core.php';
require_once __DIR__ . '/../controllers/CustomerController.php';

if ($_SERVER['REQUEST METHOD'] !== 'POST') {
    redirect(BASE_URL . 'views/register.php');
}

$data = [
    'name' => trim(strip_tags($_POST['full_name'] ?? '')),
    'email' => trim($_POST['email'] ?? ''),
    'pass' => $_POST['password'] ?? '',
    'country' => trim(strip_tags($_POST['country'] ?? '')),
    'city' => trim(strip_tags($_POST['city'] ?? '')),
    'contact' => trim(strip_tags($_POST['contact'] ?? '')),
];

if (in_array('', [$data['name'], $data['email'], $data['pass'], $data['country'], $data['contact']], true)) {
    $_SESSION['error'] = 'All fields are required.';
    redirect(BASE_URL . '/views/register.php');
}

if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = 'Invalid email address.';
    redirect(BASE_URL . '/views/reister.php');
}

if (strlen($data['pass']) < 6) {
    $_SESSION['error'] = 'Passowrds must be at least 6 characters long.';
    redirect(BASE_URL . '/views/register.php');
}

$ctrl = new CustomerController();

$result = $ctrl->register($data);

if ($result['success']) {
    $_SESSION['customer_id'] = $result['id'];
    $_SESSION['customer_name'] = $data['name'];
    $_SESSION['customer_email'] = $data['email'];

    $_SESSION['user_role'] = 2;

    redirect(BASE_URL . '/views/account/my_account.php');

}

$_SESSION['error'] = $result['error'];
redirect(BASE_URL . '/views/register.php');