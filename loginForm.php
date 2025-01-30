<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link rel="stylesheet" href="loginForm.css">
</head>
<body>
<?php
session_start();
include_once 'Database.php';
include_once 'User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $connection = $db->getConnection();
    $user = new User($connection);

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($user->login($email, $password)) {
        header("Location: kurset.php");
        exit;
    } else {
        echo "<script>alert('Invalid login credentials!');</script>";
    }
}
?>

    <div class="loginForm">
        <h2>Login</h2>
        <form id="loginForm" method="POST" action="loginForm.php">
            <label for="logIn-email">Email:</label>
            <input type="email" id="logIn-email" name="email" placeholder="Enter your email" required>
            <label for="logIn-password">Password:</label>
            <input type="password" id="logIn-password" name="password" placeholder="Enter your password" required>
            <button type="submit">Log In</button>
            <p>Don't have an account? <a href="signupForm.php">Sign Up</a></p>
            <p><a href="homepage.php">Go back</a></p>
        </form>
    </div>
<script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        const email = document.getElementById('logIn-email').value;
        const password = document.getElementById('logIn-password').value;

        if (!validateLogInForm(email, password)) {
            event.preventDefault();  
        }
    });

    function validateLogInForm(email, password) {
        if (email.trim() === "" || password.trim() === "") {
            alert('Email and password cannot be empty.');
            return false;
        }
        return true;
    }
</script>
</body>
</html>
