<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Website</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css">
</head>
<body>
    <header>
        <a href="<?= BASE_URL ?>/index.php">Home</a>
        <form action="<?= BASE_URL ?>/views/search_results.php" method="GET">
            <input type="text" name="search" placeholder="Search">
            <button type="submit">Search</button>
        </form>

        <nav>
            <?php if (is_logged_in()): ?>
                Welcome <?= htmlspecialchars($_SESSION['customer_name'] ?? '') ?> |
                <a href="<?= BASE_URL ?>/views/account/my_account.php">My Account</a> |
                <a href="<?= BASE_URL ?>/logout.php">Logout</a>
            <?php else: ?>
                <a href="<?= BASE_URL ?>/views/register.php">Register</a> |
                <a href="<?= BASE_URL ?>/views/login.php">Login</a>
            <?php endif; ?>
        </nav>    
    </header>   
    
<main>