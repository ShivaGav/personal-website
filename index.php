<?php
    session_start();
    if(!isset($_SESSION["user"])){
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Personal Website</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
    <style>
    body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
    .w3-row-padding img {margin-bottom: 12px}
    /* Set the width of the sidebar to 120px */
    </style>
  </head>
<body class="w3-black">


<!-- Page Content -->
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
  <div style="position: absolute; top: 10px; right: 10px;">
    <a href="logout.php" class="w3-button w3-white w3-text-black">Logout</a>
  </div>
    <h1 class="w3-jumbo" style="font-size: 3em;">Hello and Welcome!</h1>
    <h6 style="font-size: 2em;">I'm Shiva Natal, a passionate coder with a love for music.</h6>

    <img src="./me.jpg" alt="boy" class="w3-image" width="400" height="400">

    <!-- Social Media Icons and Links -->
    <div style="margin-top: 10px;">
      <a href="https://www.facebook.com/shivagavileno" target="_blank">
        <img src="./facebook-icon.png" alt="Facebook Icon" style="width: 52px; height: 52px; margin-right: 8px;">
      </a>

      <a href="https://www.instagram.com/shivagavileno/" target="_blank">
        <img src="./instagram-icon.png" alt="Instagram Icon" style="width: 50px; height: 45px; margin-right: 10px;">
      </a>

      <a href="https://www.linkedin.com/in/shiva-natal-9a6940252/?originalSubdomain=ph" target="_blank">
        <img src="./linkedin-icon.png" alt="LinkedIn Icon" style="width: 50px; height: 40px; margin-right: 10px;">
      </a>
    </div>
  </header>
</div>


  <!-- About Me -->
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <h2 class="w3-text-light-grey">About Me</h2>
    <hr style="width:200px" class="w3-opacity">
    <p> Greetings! I'm Shiva Natal. I find joy in playing games and immersing myself in the world of music. One of my hobbies involves indulging in the vibrant realm of KPOP, where I happily spend my time collecting merchandise like photocards and albums. Additionally, I have a passion for playing Pump It Up at Ayala Fairview Terraces; it serves as my introduction to the world of rhythm games, providing me with immense enjoyment.
    </p>

  <!-- Resume/CV -->
<div class="w3-content w3-justify w3-text-white w3-padding-64" id="about">
  <h2 class="w3-text-light-grey">Resume/CV</h2>
  <hr style="width:200px" class="w3-opacity">

   <!-- Link to PDF using Image -->
  <img src="./Resumejpg.jpg" width="100%" height="100%"></img>
  <p> &nbsp </p>


  <!-- Downloadable Resume Link -->
  <div>
    <a href="./Resume.pdf" download="Download PDF" class="w3-button w3-light-grey w3-padding-large">
      <i class="fa fa-download"></i> Download Resume
    </a>
  </div>
    
  <!-- Portfolio -->
  <div class="w3-content w3-justify w3-text-white w3-padding-64" id="about">
    <h2 class="w3-text-light-grey">Portfolio</h2>
    <hr style="width:200px" class="w3-opacity">
    <iframe width="640" height="360" src="https://www.youtube.com/embed/MjO1VCymoRw" frameborder="0" allowfullscreen></iframe>
    <p> I created this amazing piece of art back in 2021 in order to demonstrate my abilities. </p>
    
  <!-- Blog/Articles -->
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <h2 class="w3-text-light-grey">Blog/Articles</h2>
    <hr style="width:200px" class="w3-opacity">
    <p style="color: white;">Welcome to my corner of insights and reflections! I delve into the intriguing world of chess, exploring its nuances and strategies. Join me on this intellectual journey where every move on the board is a step towards understanding the profound intricacies of this ancient game. </p>
    <p> &nbsp </p>
    <p style="color: white;"><b>1. Mastering the Basics: A Guide to Chess</b></p>
    <p> Unravel the fundamental moves and tactics that form the foundation of chess. From pawn structures to castling, let's embark on a journey of chess mastery together. </p>
    <p> &nbsp </p>
    <p style="color: white;"><b>2. Strategic Brilliance: Approach to Opening Strategies</b></p>
    <p> Dive into the world of chess openings, unraveling the secrets of strategic brilliance. Learn how to control the board right from the beginning. </p>
    <p> &nbsp </p>
    <p style="color: white;"><b>3. Checkmate Chronicles: Navigating the Endgame</b></p>
    <p> The endgame is where victories are secured. Join me in understanding the art of checkmating your opponent, and witness the triumph that comes with strategic endgame play. </p>
    <p> &nbsp </p>
    <p style="color: white;"> Reference: </p>
    <a href="https://www.chess.com/article/view/study-plan-for-beginners-the-opening" style="color: blue; text-decoration: underline;">Chess For Beginners | Study Plan: The Opening</a>

  <!-- Skills -->
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <h2 class="w3-text-light-grey">Skills</h2>
    <hr style="width:200px" class="w3-opacity">
    <img src="./manila.png" width="80%" height="80%"></img>
    <p style="color: white;"> My areas of expertise are drawing and painting. </p>

  <!-- Achievements and Certifications -->
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <h2 class="w3-text-light-grey">Achievements and Certifications</h2>
    <hr style="width:200px" class="w3-opacity">
    <img src="./eCertificatepng.png" width="50%" height="50%"></img>
    <p> This is my Oracle University Certificate </p>
    <p> &nbsp </p>
    <img src="./honors.jpg" width="50%" height="50%"></img>
    <p> This is my STI with Honors Certificate </p>

  <!-- FAQ Section -->
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <h2 class="w3-text-light-grey">FAQ Section</h2>
    <hr style="width:200px" class="w3-opacity">
    <p> <span style="color: white;">Q:</span> Why is your name Shiva?  </p>
    <p> <span style="color: white;">A:</span> My mother just considered it as she was praying.  </p>
    <p> &nbsp </p>
    <p><span style="color: white;">Q:</span> Are you half-Indian?  </p>
    <p> <span style="color: white;">A:</span> No, I'm a native Filipino. </p>
    <p> &nbsp </p>
    <p> <span style="color: white;">Q:</span> Why are you skinny? </p>
    <p> <span style="color: white;">A:</span> Due to my extremely quick metabolism. </p>

</body>
</html>
