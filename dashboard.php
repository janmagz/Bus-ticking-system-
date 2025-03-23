<?php
session_start();
if (!file_exists('config.php')) {
    die('Configuration file not found.');
}
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

try {
    $user_id = $_SESSION['user_id'];

    // Fetch user's tickets
    $stmt = $pdo->prepare('SELECT * FROM tickets WHERE user_id = ?');
    $stmt->execute([$user_id]);
    $tickets = $stmt->fetchAll();
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Welcome to your Dashboard</h2>
    <a href="logout.php">Logout</a>

    <h3>Your Tickets</h3>
    <ul>
        <?php foreach ($tickets as $ticket): ?>
            <li>Bus: <?php echo $ticket['bus_name']; ?>, Seat: <?php echo $ticket['seat_number']; ?>, Date: <?php echo $ticket['booking_date']; ?></li>
        <?php endforeach; ?>
    </ul>

    <h3>Book a Ticket</h3>
    <form method="POST" action="book_ticket.php">
        <label for="bus_name">Bus Name:</label>
        <input type="text" id="bus_name" name="bus_name" required>
        <br>
        <label for="seat_number">Seat Number:</label>
        <input type="number" id="seat_number" name="seat_number" required>
        <br>
        <button type="submit">Book Ticket</button>
    </form>
</body>
</html>