<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logout</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <p class="logout-message">You have been logged out. <a href="login.php">Login again</a></p>
    </div>
</body>
</html>