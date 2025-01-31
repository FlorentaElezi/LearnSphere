<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: loginForm.php");
    exit;
}

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    include_once 'Database.php';
    include_once 'User.php';

    $db = new Database();
    $connection = $db->getConnection();
    $user = new User($connection);

    if ($user->deleteUser($userId)) {
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Error: User could not be deleted.";
    }
} else {
    echo "No user ID provided.";
}
?>
