<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: kurset.php"); 
    exit;
}

echo "Welcome, Admin ". $_SESSION['email'];
?>
<h2>Go back to <a href="homepage.php">Home</a></h2>
</body>
</html>