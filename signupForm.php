<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="loginForm.css">
</head>
<body>
<?php
include_once 'Database.php';
include_once 'User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $connection = $db->getConnection();
    $user = new User($connection);

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($user->register($username, $email, $password)) {
        header("Location: loginForm.php"); 
        exit;
    } else {
        echo "<p style='color:red;'>Error registering user!</p>";
    }
}
?>
    <div class="loginForm">
        <h2>Sign Up</h2>
        <form id="signupForm" method="POST">
            <label for="signup-username">Username:</label>
            <input type="text" id="signup-username" name="username" placeholder="Enter your username" required>

            <label for="signup-email">Email:</label>
            <input type="email" id="signup-email" name="email" placeholder="Enter your email" required>

            <label for="signup-password">Password:</label>
            <input type="password" id="signup-password" name="password" placeholder="Enter your password" required>

            <button type="submit">Sign Up</button>
            <p>Already have an account? <a href="loginForm.php">Log In</a></p>
            <p><a href="homepage.php">Go back</a></p>
        </form>
    </div>
    
<script>
    function validateUsername(username) {
    const usernameRegex = /^[a-zA-Z0-9_-]{3,15}$/;
    return usernameRegex.test(username);
    }
    function validateEmail(email) {
        const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        return emailRegex.test(email);
    }

    function validatePassword(password) {
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;
    
    console.log("Password being checked:", password); 

    return passwordRegex.test(password);
}

    function validateLogInForm(username, email, password) {
        if (!validateUsername(username)){
            alert('Please enter a valid username.');
            return false; 
        }
        if (!validateEmail(email)) {
            alert('Please enter a valid email address.');
            return false;
        }
        
        if (!validatePassword(password)) {
            alert('Password must be at least 8 characters long and include uppercase, lowercase and a number');
            return false;
        }

        return true;
    }

    document.getElementById('signupForm').addEventListener('submit', function(event) {
        event.preventDefault(); 

        const username = document.getElementById('signup-username').value;
        const email = document.getElementById('signup-email').value;
        const password = document.getElementById('signup-password').value;

        if (validateLogInForm(username, email, password)) {
            console.log("Form is valid");
            this.submit(); 
        } else {
            console.log("Form validation failed.");
        }
    });
</script>
</body>
</html>
