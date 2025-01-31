<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .editUser {
            background-color: #fff;
            width: 100%;
            max-width: 500px;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            font-size: 30px;
            color: #333;
            font-weight: bold;
            margin-bottom: 30px;
        }

        label {
            font-size: 16px;
            display: block;
            margin-bottom: 8px;
            color: #333;
            text-align: left;
        }

        input[type="text"], input[type="email"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            font-weight: bold;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        p {
            font-size: 17px;
            text-align: center;
        }

        p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<?php
session_start();

include_once '../Database.php'; 
include_once '../User.php';      


if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {  
    header("Location: loginForm.php");
    exit;  
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $db = new Database();
    $connection = $db->getConnection();

    $query = "SELECT id, username, email, role FROM users WHERE id = :id";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);  
    $stmt->execute();  
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);  
} else {
    header("Location: adminDashboard.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $query = "UPDATE users SET username = :username, email = :email, role = :role WHERE id = :id";
    $stmt = $connection->prepare($query);

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: adminDashboard.php");
        exit;
    } else {
        echo "Error updating user.";
    }
}
?>

<div class="editUser">
    <h2>Edit User</h2>

    <form method="POST">
        <label for="id">ID:</label>
        <input type="text" name="id" value="<?= $userData['id']; ?>" readonly><br><br>

        <label for="username">Username:</label>
        <input type="text" name="username" value="<?= $userData['username']; ?>" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= $userData['email']; ?>" required><br><br>

        <label for="role">Role:</label>
        <select name="role" id="role">
            <option value="user" <?= $userData['role'] == 'user' ? 'selected' : ''; ?>>User</option>
            <option value="admin" <?= $userData['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
        </select><br><br>

        <input type="submit" value="Save Changes">
    </form>
</div>

</body>
</html>
