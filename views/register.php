<?php
require_once __DIR__ . '/../core/core.php';
include __DIR__ . '/layout/header.php';
?>


<h1>Register</h1>

<?php
if (isset($_SESSION['error'])) {
    echo '<p>' . htmlspecialchars($_SESSION['error']) . '</p>';
    unset($_SESSION['error']);
}
?>

<form id="registerForm" action="<?= BASE_URL ?>/actions/register_action.php" method="POST" novalidate>
    <p>
        <label>Full Name</label><br>
        <input type="text" name="full_name">
        <span class="error-msg"></span>
    </p>
    <p>
        <label>Email</label><br>
        <input type="email" name="email">
        <span class="error-msg"></span>
    </p>
    <p>
        <label>Password</label><br>
        <input type="password" name="password">
        <span class="error-msg"></span>
    </p>
    <p>
        <label>Country</label><br>
        <select name="country">
            <option value="">-- Select --</option>
            <option>Ghana</option>
            <option>Nigeria</option>
            <option>Kenya</option>
            <option>South Africa</option>
            <option>Other</option>
        </select>
        <span class="error-msg"></span>
    </p>
    <p>
        <label>City</label><br>
        <input type="text" name="city">
        <span class="error-msg"></span>
    </p>
    <p>
        <label>Contact Number</label><br>
        <input type="text" name="contact">
        <span class="error-msg"></span>
    </p>

    <button type="submit">Register</button>
</form>

<p>Already have an account? <a href="login.php">Login</a></p>

<script src="<?= BASE_URL ?>/js/validate.js"></script>
<?php include __DIR__ . '/layout/footer.php'; ?>