<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: loginForm.php");
    exit;
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

<h2 class="dev">Frontend Development</h2>

<div class="container">
    <div class="courses">
        <div class="course-images">
            <img src="Pics/html-image.png" alt="html-img">
        </div>
        <div class="course-name">
            <h2>HTML</h2>
        </div>
        <div class="lecturer-names">
            <a href="ourTeam.php"><h3>Jessica Pearson</h3></a>
        </div>
        <div class="apply-button">
            <button>Apply Now</button>
        </div>
    </div>

    <div class="courses">
        <div class="course-images">
            <img src="Pics/css-image.png" alt="css-img">
        </div>
        <div class="course-name">
            <h2>CSS</h2>
        </div>
        <div class="lecturer-names">
            <a href="ourTeam.php"><h3>Harvey Specter</h3></a>
        </div>
        <div class="apply-button">
            <button>Apply Now</button>
        </div>
    </div>

    <div class="courses">
        <div class="course-images">
            <img src="Pics/javascript-image.png" alt="js-img">
        </div>
        <div class="course-name">
            <h2>JavaScript</h2>
        </div>
        <div class="lecturer-names">
            <a href="ourTeam.php"><h3>Mia Bennet</h3></a>
        </div>
        <div class="apply-button">
            <button>Apply Now</button>
        </div>
    </div>
</div>

<h2 class="dev">Backend Development</h2>

<div class="container">
    <div class="courses">
        <div class="course-images">
            <img src="Pics/python-imagee.png" alt="python-img">
        </div>
        <div class="course-name">
            <h2>Python</h2>
        </div>
        <div class="lecturer-names">
            <a href="ourTeam.php"><h3>Tegan Price</h3></a>
        </div>
        <div class="apply-button">
            <button>Apply Now</button>
        </div>
    </div>

    <div class="courses">
        <div class="course-images">
            <img src="Pics/php-image.png" alt="php-img">
        </div>
        <div class="course-name">
            <h2>PHP</h2>
        </div>
        <div class="lecturer-names">
            <a href="ourTeam.php"><h3>Emmet Crawfoord</h3></a>
        </div>
        <div class="apply-button">
            <button>Apply Now</button>
        </div>
    </div>

    <div class="courses">
        <div class="course-images">
            <img src="Pics/java-image.png" alt="java-img">
        </div>
        <div class="course-name">
            <h2>JAVA</h2>
        </div>
        <div class="lecturer-names">
            <a href="ourTeam.php"><h3>Wes Gibbins</h3></a>
        </div>
        <div class="apply-button">
            <button>Apply Now</button>
        </div>
    </div>
</div>

<h2 class="dev">Database</h2>

<div class="container">
    <div class="courses">
        <div class="course-images">
            <img src="Pics/mysql-image.png" alt="sql-img">
        </div>
        <div class="course-name">
            <h2>MySQL</h2>
        </div>
        <div class="lecturer-names">
            <a href="ourTeam.php"><h3>Lucas Harrington</h3></a>
        </div>
        <div class="apply-button">
            <button>Apply Now</button>
        </div>
    </div>

    <div class="courses">
        <div class="course-images">
            <img src="Pics/postgresql-image.png" alt="pgsql-img">
        </div>
        <div class="course-name">
            <h2>PostgreSQL</h2>
        </div>
        <div class="lecturer-names">
            <a href="ourTeam.php"><h3>Lila Starling</h3></a>
        </div>
        <div class="apply-button">
            <button>Apply Now</button>
        </div>
    </div>

    <div class="courses">
        <div class="course-images">
            <img src="Pics/oracle-image.png" alt="oracle-img">
        </div>
        <div class="course-name">
            <h2>Oracle Database</h2>
        </div>
        <div class="lecturer-names">
            <a href="ourTeam.php"><h3>Elara Storm</h3></a>
        </div>
        <div class="apply-button">
        <div class="apply-button">
        <form method="POST" action="apply.php">
        <input type="hidden" name="course_id" value="COURSE_ID">
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
        <button type="submit" name="apply">Apply Now</button>
        </form>
        </div>

        </div>
    </div>
</div>

<div id="load-more-container">
    <button id="load-more-btn" class="apply-button">Load More</button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const courses = document.querySelectorAll('.courses');
        const loadMoreBtn = document.getElementById('load-more-btn');
        let visibleCourses = 3;

        courses.forEach((course, index) => {
            if (index >= visibleCourses) {
                course.style.display = 'none';
            }
        });

        loadMoreBtn.addEventListener('click', () => {
            visibleCourses += 3;
            courses.forEach((course, index) => {
                if (index < visibleCourses) {
                    course.style.display = 'block';
                }
            });

            if (visibleCourses >= courses.length) {
                loadMoreBtn.style.display = 'none';
            }
        });
    });
</script>

<?php 
echo "Welcome, " . $_SESSION['email'] . "!";
?>
<a id="logout" href="logOut.php">LogOut</a>
<?php include ('Footer.html')?>
</body>
</html>
