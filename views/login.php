<?php

require_once __DIR__ . '/../core/core.php';
include __DIR__ . 'layout/header.php';

?>


<?php

if (isset($_SESSION['error'])) {
    echo '<p>' . htmlspecialchars($_SESSION['error']) . '</p>';
    unset($_SESSION['error']);
}

?>

<form action="<?= BASE_URL ?> /actions/login_action.php" method="POST">
    <p>
        <label>Email</label><br>
        <input type="email" name="email" required>
    </p>

    <p>
        <label>Password</label><br>
        <input type="password" name="password" required>
    </p>

    <button type="submit">Login</button>

</form>

<p>Don't have an account? <a href="register.php">Register</a></p>

<?php include __DIR__ . '/layout/footer.php'; ?>