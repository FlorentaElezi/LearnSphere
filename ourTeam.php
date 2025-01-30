<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ourTeam.css">
</head>
<body>
<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: loginForm.php"); 
    exit;
}

?>
<a href="logOut.php">Logout</a>

<?php include ('Header.html')?>

<div class="top-bg">
  <h1>Meet Our Team</h1>
  <h3>Success is at your reach</h3>
  <div class="search">
      <input type="text" class="form-control" placeholder="Search Lecturers...">
  </div>
</div>

<section class="team-container">
        <div class="team-card">
            <img src="Pics/member-1.png" alt="Team Member">
            <div class="info">
                <h3>Alex Johnson</h3>
                <p>CEO</p>
            </div>
        </div>
        <div class="team-card">
            <img src="Pics/member-2.png" alt="Team Member">
            <div class="info">
                <h3>Emma Davis</h3>
                <p>CTO</p>
            </div>
        </div>
        <div class="team-card">
            <img src="Pics/member-3.png" alt="Team Member">
            <div class="info">
                <h3>Diana Smith</h3>
                <p>Lead Designer</p>
            </div>
        </div>
        <div class="team-card">
            <img src="Pics/member-4.png" alt="Team Member">
            <div class="info">
                <h3>Sophia Lee</h3>
                <p>Project Manager</p>
            </div>
        </div>
        <div class="team-card">
            <img src="Pics/member-5.png" alt="Team Member">
            <div class="info">
                <h3>Harvey Specter</h3>
                <p>Full Stack Developer</p>
            </div>
        </div>
        <div class="team-card">
            <img src="Pics/member-6.png" alt="Team Member">
            <div class="info">
                <h3>Louis Charles</h3>
                <p>Graphic Designer/Lecturer</p>
            </div>
        </div>
        <div class="team-card">
            <img src="Pics\member-7.jpg" alt="Team Member">
            <div class="info">
                <h3>Mia Bennett</h3>
                <p>JavaScript</p>
            </div>
        </div>
        <div class="team-card">
            <img src="Pics\member-8.jpg" alt="Team Member">
            <div class="info">
                <h3>Tegan Price</h3>
                <p>Python</p>
            </div>
        </div>
        <div class="team-card">
            <img src="Pics\member-9.jpg" alt="Team Member">
            <div class="info">
                <h3>Lila Starling</h3>
                <p>PostgreSQL</p>
            </div>
        </div>
        <div class="team-card">
            <img src="Pics\member-10.jpg" alt="Team Member">
            <div class="info">
                <h3>Wes Gibbins</h3>
                <p>Java</p>
            </div>
        </div>
        <div class="team-card">
            <img src="Pics\member-11.jpg" alt="Team Member">
            <div class="info">
                <h3>Lucas Harrington</h3>
                <p>MySQL</p>
            </div>
        </div>
        <div class="team-card">
            <img src="Pics\member-12.jpg" alt="Team Member">
            <div class="info">
                <h3>Elara Storm</h3>
                <p>Oracle Database</p>
            </div>
        </div>

        <div id="load-more-container">
            <button id="load-more-btn" class="apply-button">Load More</button>
        </div>

    <script>
         document.addEventListener("DOMContentLoaded", () => {
        const cards = document.querySelectorAll(".team-card");
        const loadMoreBtn = document.getElementById("load-more-btn");
        let cardsToShow = 3;

        cards.forEach((card, index) => {
            if (index >= cardsToShow) {
                card.style.display = "none";
           }
        });

        loadMoreBtn.addEventListener("click", () => {
            const hiddenCards = Array.from(cards).filter(card => card.style.display === "none");

            for (let i = 0; i < 3; i++) {
                if (hiddenCards[i]) {
                    hiddenCards[i].style.display = "block";
                }
            }

            if (hiddenCards.length <= 3) {
                loadMoreBtn.style.display = "none";
            }
        });
    });

    </script>
    </section>
    <?php 
echo "Welcome, " . $_SESSION['username'] . "!";
?>
<a id= "logout" href="logOut.php">LogOut</a>
    <?php include ('Footer.html')?>
    
</body>
</html>