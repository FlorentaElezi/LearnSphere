<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="aboutUs.css">
</head>
<body>
<?php include ('Header.html')?>
<div class="top-bg">
  <h1>About Us</h1>
  <h3> Learn Sphere</h3>
  <p>Discover our journey and the story behind our achievement.</p>
</div>

    <section class="about-us">
        <div class="container">
          <h1>About Us</h1>
          <div class="content">
            <div class="text">
              <h2>Building Scalable Solutions for Frontend & Backend Development</h2>
              <p>
                At LearnSphere, we specialize in delivering innovative and efficient software solutions 
                tailored to your needs. Our team is equipped with expertise in frontend technologies 
                like React, Angular, and Vue, as well as backend frameworks like Node.js, Django, and Spring Boot.
              </p>
              <div class="stats">
                <p>100+ Projects Delivered</p>
                <p>50+ Satisfied Clients</p>
                <p>10+ Years of Experience</p>
              </div>
              <button>Get a Free Consultation</button>
            </div>
            <div class="image">
              <img src="Pics/coding-team.img" alt="Development Team">
            </div>
          </div>
        </div>
      </section>

      <section class="technologies">
        <h2>Technologies We Use</h2>
        <div class="tech-stack">
          <div class="tech">
            <h3>Frontend</h3>
            <ul>
              <li>React</li>
              <li>Angular</li>
              <li>Vue.js</li>
              <li>HTML5 & CSS3</li>
            </ul>
          </div>
          <div class="tech">
            <h3>Backend</h3>
            <ul>
              <li>Node.js</li>
              <li>Django</li>
              <li>Spring Boot</li>
              <li>Express.js</li>
            </ul>
          </div>
          <div class="tech">
            <h3>Database</h3>
            <ul>
              <li>MySQL</li>
              <li>PostgreSQL</li>
              <li>MongoDB</li>
              <li>Redis</li>
            </ul>
          </div>
        </div>
      </section>

      <section class="team">
        <h2>Meet Our Development Team</h2>
        <div class="team-members">
          <div class="member">
            <img src="Pics/member-1.png" alt="Alex">
            <a href="ourTeam.php"><p>Alex Johnson</p></a>
            <p>Full Stack Developer</p>
          </div>
          <div class="member">
            <img src="Pics/member-2.png" alt="Emma">
            <a href="ourTeam.php"><p>Emma Davis</p></a>
            <p>Frontend Engineer</p>
          </div>
          <div class="member">
            <img src="Pics/member-3.png" alt="Diana">
            <a href="ourTeam.php"><p>Diana Smith</p></a>
            <p>Backend Developer</p>
          </div>
          <div class="member">
            <img src="Pics/member-4.png" alt="Sophia">
            <a href="ourTeam.php"><p>Sophia Lee</p></a>
            <p>Database Administrator</p>
          </div>
        </div>
      <p>Find More In <a href="ourTeam.php">Our Team</a></p>
      </section>

      <?php include ('Footer.html')?>
</body>
</html>