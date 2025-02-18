<?php
session_start();
include_once 'Database.php';
include_once 'User.php';
include_once 'CRUD\Course.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: loginForm.php");
    exit;
}

$db = new Database();
$connection = $db->getConnection();
$user = new User($connection);
$course = new Course($connection);

$query = "SELECT id, username, email, role FROM users";
$stmt = $connection->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT id, photo, CourseName, Lecturer FROM kurset";
$stmt = $connection->prepare($query);
$stmt->execute();
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['deleteCourseId'])) {
    $courseId = $_GET['deleteCourseId'];
    if ($course->deleteCourse($courseId)) {
        header("Location: adminDashboard.php"); 
        exit;
    } else {
        echo "Error: Course could not be deleted.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>

    <h1>Welcome to Admin Dashboard</h1>

    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="homepage.php">Home</a></li>
            <li><a href="kurset.php">Courses</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
            <li><a href="ourTeam.php">Our Team</a></li>
        </ul>
    </div>

    <div class="main-content">

        <h3>Manage Users</h3>
        <table class="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['role'] ?></td> 
                        <td><a href="CRUD/editUser.php?id=<?= $user['id'] ?>">Edit</a></td>
                        <td><a href="CRUD/deleteUser.php?id=<?= $user['id'] ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <h3>Manage Courses</h3>
        <table class="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Course Name</th>
                    <th>Lecturer</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses as $course) { ?>
                    <tr>
                        <td><?= $course['id'] ?></td>
                        <td>
                        <img src="Pics/<?= htmlspecialchars($course['photo']) ?>" class="course-img" alt="Course Image">
                        </td>
                        <td><?= $course['CourseName'] ?></td>
                        <td><?= $course['Lecturer'] ?></td>
                        <td><a href="CRUD/editCourse.php?id=<?= $course['id'] ?>">Edit</a></td>
                        <td><a href="CRUD/deleteCourse.php?id=<?= $course['id'] ?>" onclick="return confirm('Are you sure you want to delete this course?');">Delete</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <button id="showAddCourseBtn" class="btn">Add Course</button>

        <div id="addCourseForm" class="form-container hidden">
            <h3>Add New Course</h3>
            <form action="CRUD/addCourse.php" method="POST" enctype="multipart/form-data">
                <label for="courseName">Course Name:</label>
                <input type="text" id="courseName" name="courseName" required>

                <label for="lecturer">Lecturer:</label>
                <input type="text" id="lecturer" name="lecturer" required>

                <label for="photo">Photo:</label>
                <input type="file" id="photo" name="photo" required>

                <button type="submit">Submit</button>
                <button type="button" class="cancel-btn" id="cancelBtn">Cancel</button>
            </form>
        </div>
            <a id="logout" href="logOut.php">LogOut</a>
        </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const showFormBtn = document.getElementById("showAddCourseBtn");
        const addCourseForm = document.getElementById("addCourseForm");
        const cancelBtn = document.getElementById("cancelBtn");

        showFormBtn.addEventListener("click", function() {
            addCourseForm.classList.toggle("hidden");
        });

        cancelBtn.addEventListener("click", function() {
        addCourseForm.classList.add("hidden");
    });
    });
    </script>

</body>
</html>
