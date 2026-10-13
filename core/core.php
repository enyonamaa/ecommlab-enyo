<?php
session_start();
date_default_timezone_set('Africa/Accra');

define('BASE_URL', '/~enyonam.attipoe/ecommerce_class/shoppn');
require_once __DIR__ . '/db_class.php';

function get_ip() {
    return $_SERVER['REMOTE_ADDR'];
}

function redirect($url) {
    header("Location: $url");
    exit;
}

function is_logged_in() {
    return isset($_SESSION['customer_id']);
}

function is_admin() {
    return isset($_SESSION['usser_role']) && (int)$_SESSION['user_role'] === 1;
}

function require_login() {
    if (!is_logged_in()) {
        redirect(BASE_URL . '/views/login.php');
    }
}

function require_admin() {
    if (!is_admin()) {
        $_SESSION['error'] = 'Access denied.';
        redirect(BASE_URL . '/index.php');
    }
}