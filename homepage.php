<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="homepage.css">
</head>
<body>
    <?php include ('Header.html')?>
    <section class="pjesa-pare">
        <div class="slider-container">
            <img id="slideshow" src="Pics/slider-img1.png" alt="slider image">
        <div class="per-ne">
            <p>Learn New Skills & Popular Courses</p>
            <h2>Where Learning Meets Opportunity</h2>
            <p>Access world-class learning experiences that inspire growth, creativity, and success at every step.</p>
            <button class="explore">
                <a href="kurset.html">Explore Now</a>
            </button>
        </div>
        </div>        
        <button class="slider-button"  onclick="ndrroImg()">Next</button>
    </section>

    <div class="container">
        <h4>What We Offer</h4>
        <div class="container-offer">
            <div class="offer">
                <img src="Pics/career-support.png" alt="career-support">
                <h3>Career Support</h3>
                <p>Get expert advice, resume building, and job placement assistance.</p>      
            </div>
            <div class="offer">
                <img src="Pics/member-1.png" alt="member-1">
                <a href="ourTeam.php"><h3>Expert Trainers</h3></a>
                <p>Guided by top-notch industry experts.</p>
            </div>
            <div class="offer">
                <img src="Pics/practical-skills.png" alt="practical-skills">
                <h3>Practical Skills</h3>
                <p>Gain real-world skills through hands-on projects, case studies, and interactive assignments.</p>
            </div>
            <div class="offer">
                <img src="Pics/get-certified.png" alt="get-certified">
                <h3>Get Certified</h3>
                <p>Earn certificates to boost your career.</p>
            </div>
        </div>
        </div>
    </div>

    <div class="container-aboutus">
        <div class="txt">
            <h2>About Our Courses</h2>
            <p>Our Courses are designed to equip you with the knowledge and skills needed to thrive in today's tech-driven world. 
                Whether you're a beginner or an experienced professional, we have a course tailored to your needs.</p>
            <button class="read">
                <a href="aboutUs.html">Read More</a>
            </button>
        </div>
        <div class="foto">
            <img src="Pics/our-courses.png" alt="our-courses">
        </div>
    </div>

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
<script>
    var i = 0;
    var imgArray = [
    "Pics/slider-img1.png",
    "Pics/slider-img2.png",
    "Pics/slider-img3.png",
    "Pics/home-page.png"
    ];
    function ndrroImg() {
    document.getElementById('slideshow').src = imgArray[i];
    if (i < imgArray.length - 1) {
        i++;
    } else {
        i = 0;
      }
    }
    document.body.addEventListener('load', ndrroImg());
    </script>
</body>
</html>