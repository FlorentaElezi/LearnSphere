<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: loginForm.php");
    exit;
}
require 'Database.php'; 
$db = new Database(); 
$conn = $db->getConnection();

$sql = "SELECT * FROM kurset"; 
$stmt = $conn->prepare($sql);
$stmt->execute();
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (!empty($row['Photo'])) {
    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['Photo']) . '" alt="' . htmlspecialchars($row['CourseName']) . ' photo">';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course</title>
    <link rel="stylesheet" href="kurset.css">
</head>
<body>
<?php include ('Header.html')?>

<div class="search-bg">
    <h1>Start Developing With Us</h1>
    <h3> Learn Sphere</h3>
    <div class="search">
        <input type="text" class="form-control" placeholder="Search Courses...">
    </div>
</div>

<?php if (isset($_SESSION['role'])): ?>
    <div class="dashboard-btn-container">
        <?php if ($_SESSION['role'] == 'admin'): ?>
            <a href="adminDashboard.php" class="dashboard-btn">Go to Dashboard</a>
        <?php endif; ?>
    </div>
<?php endif; ?>

<div class="container">
    <?php if (!empty($courses) && is_array($courses)): ?>
        <?php foreach ($courses as $course): ?>
            <div class="courses">
                <div class="course-images">
                    <?php if (!empty($course['Photo'])): ?>
                        <img src="Pics/<?= htmlspecialchars($course['Photo']) ?>" alt="Course Image">
                    <?php else: ?>
                        <p>No Image Available</p>
                    <?php endif; ?>
                </div>
                <div class="course-name">
                    <h2><?= htmlspecialchars($course['CourseName']) ?></h2>
                </div>
                <div class="lecturer-names">
                    <h3><?= htmlspecialchars($course['Lecturer']) ?></h3>
                </div>
                <div class="apply-button">
                <form method="POST" action="apply.php">
                <input type="hidden" name="user_id" value="<?= isset($_SESSION['user_id']) ? htmlspecialchars($_SESSION['user_id']) : '' ?>">
                <button type="submit" name="apply">Apply Now</button>
                </form>
                </div>

            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No courses available right now!</p>
    <?php endif; ?>
</div>
<?php 
echo "Welcome, " . $_SESSION['email'] . "!";
?>

<a id="logout" href="logOut.php">LogOut</a>
<?php include ('Footer.html')?>
</body>
</html>
