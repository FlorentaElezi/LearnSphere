<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: loginForm.php");
    exit;
}

if (isset($_GET['id'])) {
    $courseId = $_GET['id'];

    include_once '../Database.php'; 
    include_once '../CRUD\Course.php'; 

    $db = new Database();
    $connection = $db->getConnection();
    $course = new Course($connection);

    if ($course->deleteCourse($courseId)) {
        header("Location: ../adminDashboard.php");  
        exit;
    } else {
        echo "Error: Course could not be deleted.";
    }
} else {
    echo "No course ID provided.";
}
?>
