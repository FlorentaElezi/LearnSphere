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
  <div class="search">
      <input type="text" class="form-control" placeholder="Search Lecturers...">
  </div>
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
            <p>Alex Johnson</p>
            <p>Full Stack Developer</p>
          </div>
          <div class="member">
            <img src="Pics/member-2.png" alt="Emma">
            <p>Emma Davis</p>
            <p>Frontend Engineer</p>
          </div>
          <div class="member">
            <img src="Pics/member-3.png" alt="Diana">
            <p>Diana Smith</p>
            <p>Backend Developer</p>
          </div>
          <div class="member">
            <img src="Pics/member-4.png" alt="Sophia">
            <p>Sophia Lee</p>
            <p>Database Administrator</p>
          </div>
        </div>
      </section>

      <footer>
        <div class="footer-container">
            <div class="fillimi">
                <h2 class="emri">LEARN SPHERE</h2>
                <p class="adressa">Pejton,1000 Prishtinë,Kosovë</p>
            </div>
            <div class="links">
                <p class="p-nav">Navigation</p>
                <a href="homepage.html">Home Page</a>
                <a href="kurset.html">Courses</a>
                <a href="aboutUs.html">About Us</a>
            </div>
            <div class="number">
                <p class="p-number">Phone Number</p>
                <p class="numri">📞 +383 45 782 954</p>
                <p class="numri">📞 +383 44 921 615</p>
            </div>
            <div class="email">
                <p class="p-email">Email</p>
                <p class="email"><a href="email:fe69993@ubt-uni.net">&#8226; fe69993@ubt-uni.net</a></p>
                <p class="email"><a href="email:fh70112@ubt-uni.net">&#8226; fh70112@ubt-uni.net</a></p>
            </div>
        </div>
        <hr>
        <p class="copyright">&#169; 2024 Learn Sphere.All rights reserved</p>
    </footer>    

</body>
</html>