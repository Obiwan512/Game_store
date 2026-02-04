<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap">


    <title>Game Store</title>
</head>
<body>
    <header>
        <h1>Game Store</h1>
        <nav>
            <a href="index.php">Home🏠</a>
            <?php if(isset($_SESSION['loggedin'])): ?>
                <span>Welcome, <?php echo $_SESSION['username']; ?>!</span>
                <a href="profile.php">Profile👽</a>
                <a href="logout.php">Logout💀</a>
            <?php else: ?>
                <a href="login.php">Login🔑</a>
                <a href="register.php">Register✍</a>
            <?php endif; ?>
        </nav>
    </header>
    <main>
