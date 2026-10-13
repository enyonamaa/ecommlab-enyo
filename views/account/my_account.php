<?php
require_once __DIR__ . '/../../core/core.php';
require_login();
include __DIR__ . '/../layout/header.php';
?>

<h1>My Account</h1>
<p>Name: <?= htmlspecialchars($_SESSION['customer_name'] ?? '') ?></p>
<p>Email: <?= htmlspecialchars($_SESSION['customer_email'] ?? '') ?></p>

<?php include __DIR__ . '/../layout/footer.php'; ?>