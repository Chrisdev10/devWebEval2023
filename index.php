<?php
  session_start(); ?>
<html>
    <?php include 'helper/css.php' ?>
    <body style="background-color: #333333">
        <?php include 'component/navbar/navbar.php' ?>
        <?php include 'component/header/header.html' ?>
        <?php include 'component/caroussel/caroussel.php' ?>
        <?php include 'component/game_card/game-card.php'?>
        <?php include 'component/banner1/banner1.php'?>
        <?php include 'component/category-card/category-card.php'?>
        <?php include 'component/banner2/banner2.html'?>
        <?php include 'component/banner3/banner3.html'?>
        <?php include 'component/footer/footer.html' ?>
    </body>
    <script
			  src="https://code.jquery.com/jquery-3.6.4.min.js"
			  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
			  crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/2c684a3113.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.5.207/pdf.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="/mist/component/navbar/navbar.js"></script>    
    <script src="/mist/component/caroussel/caroussel.js"></script>    
    <script>
    AOS.init();
    </script>  
</html>
