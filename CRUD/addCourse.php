<?php
include_once '../Database.php';
include_once '../kurset.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../loginForm.php");
    exit;
}

$db = new Database();
$connection = $db->getConnection();
$kurset = new kurset($connection);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $courseName = $_POST['courseName'];
    $lecturer = $_POST['lecturer'];
    $photo = "";

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $targetDirectory = "../Pics/";
        $targetFile = $targetDirectory . basename($_FILES["photo"]["name"]);
        move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile);
        $photo = $targetFile;
    }

    if ($kurset->addCourse($courseName, $lecturer, $photo)) {
        header("Location: ../kurset.php"); 
        exit();
    } else {
        echo "Error: Could not add course.";
    }
}

$newCourses = $kurset->getAllCourses();

?>

