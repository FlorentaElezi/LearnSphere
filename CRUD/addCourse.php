<?php 
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../loginForm.php");
    exit();
}

include_once '../Database.php';
include_once 'Course.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database();
    $connection = $db->getConnection();
    $courseName = $_POST['courseName'];
    $lecturer = $_POST['lecturer'];
    $photo = "";

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $targetDirectory = "../Pics/"; 
        $targetFile = $targetDirectory . basename($_FILES["photo"]["name"]);
        move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile); 
        $photo = $targetFile; 
    }

    $course = new Course($connection); 
    if ($course->addCourse($courseName, $lecturer, $photo)) {
        header("Location: ../kurset.php");
        exit();
    } else {
        echo "Error: Could not add course.";
    }
}
?>