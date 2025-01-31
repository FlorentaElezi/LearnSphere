<?php
session_start();
include_once '../Database.php'; 
include_once '../CRUD/Course.php';      

if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {  
    header("Location: loginForm.php");
    exit;  
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $db = new Database();
    $connection = $db->getConnection();
    $course = new Course($connection);

    $courseData = $course->getCourseById($id);

    if (!$courseData || !is_array($courseData)) {
        echo "Error: Course not found!";
        exit;
    }
} else {
    header("Location: adminDashboard.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $courseName = isset($_POST['courseName']) ? $_POST['courseName'] : '';
    $lecturer = isset($_POST['lecturer']) ? $_POST['lecturer'] : '';

    if (!empty($_FILES['photo']['tmp_name'])) {
        $photo = file_get_contents($_FILES['photo']['tmp_name']);
    } else {
        $photo = isset($courseData['photo']) ? $courseData['photo'] : null;
    }

    if ($course->updateCourse($id, $courseName, $lecturer, $photo)) {
        header("Location: adminDashboard.php");
        exit;
    } else {
        echo "Error updating course.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
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

        .editCourse {
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

        input[type="text"], input[type="file"] {
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

        .current-photo {
            display: block;
            margin: 10px auto;
            max-width: 100px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="editCourse">
    <h2>Edit Course</h2>

    <form method="POST">
        <label for="id">ID:</label>
        <input type="text" name="id" value="<?= isset($courseData['id']) ? htmlspecialchars($courseData['id']) : ''; ?>" readonly>

        <label for="courseName">Course Name:</label>
        <input type="text" name="courseName" value="<?= isset($courseData['CourseName']) ? htmlspecialchars($courseData['CourseName']) : ''; ?>" required>

        <label for="lecturer">Lecturer:</label>
        <input type="text" name="lecturer" value="<?= isset($courseData['Lecturer']) ? htmlspecialchars($courseData['Lecturer']) : ''; ?>" required>

        <label for="photo">Current Photo:</label>
        <?php if (!empty($courseData['photo'])): ?>
            <img src="data:image/jpeg;base64,<?= base64_encode($courseData['photo']); ?>" class="current-photo" alt="Course Image">
        <?php else: ?>
            <p>No image available.</p>
        <?php endif; ?>

        <label for="photo">Upload New Photo:</label>
        <input type="file" name="photo">

        <input type="submit" value="Save Changes">
    </form>
</div>

</body>
</html>
