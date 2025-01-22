<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link rel="stylesheet" href="loginForm.css">
</head>
<body>
    <div class="loginForm">
        <h2>Login</h2>
        <form id="loginForm">
            <label for="logIn-email" >Email:</label>
            <input type="email" id="logIn-email" placeholder="Enter your email" required>
            <label for="logIn-password">Password:</label>
            <input type="password" id="logIn-password" placeholder="Enter your password" required>
            <button type="submit">Log In</button>
            <p>Don't have account?  <a href="signupForm.html">Sign Up</a></p>
            <p><a href="homepage.html">Go back</a></p>
        </form>
    </div>
    <script>
        function validateEmail(email) {
            const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            return emailRegex.test(email);
        }

        function validatePassword(password) {
            const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;
            return passwordRegex.test(password);
        }

        function validateLogInForm(email, password) {
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

        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault(); 

            const email = document.getElementById('logIn-email').value;
            const password = document.getElementById('logIn-password').value;

            if (validateLogInForm(email, password)) {
                console.log("Form is valid");
                this.submit(); 
            } else {
                console.log("Form validation failed.");
            }
        });
    </script>
</body>
</html>