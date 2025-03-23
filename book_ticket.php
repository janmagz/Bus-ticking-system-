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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $bus_name = $_POST['bus_name'];
        $seat_number = $_POST['seat_number'];
        $user_id = $_SESSION['user_id'];

        $stmt = $pdo->prepare('INSERT INTO tickets (user_id, bus_name, seat_number) VALUES (?, ?, ?)');
        $stmt->execute([$user_id, $bus_name, $seat_number]);

        header('Location: dashboard.php');
        exit;
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>