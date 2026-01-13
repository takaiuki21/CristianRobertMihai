<?php require 'db.php'; ?>
<!DOCTYPE html>
<html>
    <title>Home@Nume_restaurant</title>
    <head>
        <link rel="stylesheet" type="text/css" href="cont.css"/>
    </head>
        
    <body>
        <header>
    <?php include 'header.php'; ?>
    </header>
        <br><br>
        <h1 class="centrat">Bine ati venit la CasaMare</h1>
        <script src="script.js"></script> 

<div class="carousel-container">
    
    <div class="mySlides fade">
        <img src="interior1.jpg" alt="Vedere interior restaurant" style="width:100%">
    </div>

    <div class="mySlides fade">
        <img src="mancare1.jpg" alt="Specialitatea Chef-ului" style="width:100%">
    </div>

    <div class="mySlides fade">
        <img src="atmosfera.jpg" alt="Masa rezervată" style="width:100%">
    </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>

</div>

    </body>
<a href="#top" class="back-to-top"> Sus</a>
<footer class="footer"> © CasaMare - Toate drepturile rezervate</footer>
    <script src="home.js"></script>

</html>