<?php
    require_once('../../database.php');
    session_start();
    $res = get_game_info($_GET['id']);   
    $promo = $res['PROMOTION'];
?>
<html>
    <?php include '../../helper/css.php' ?>
    <body style="background-color: #333333">
    <?php include '../../component/navbar/navbar.php' ?>
    <header class="gameBg" style="background-image: url('/mist/assets/games/bg/<?php echo $res['IMAGEURL']; ?>')"></header>
    <div>
        <div class="details">
            <div class="left">
                <br>
                <img src="/mist/assets/games/icon/<?php echo $res['IMAGEURL']; ?>" alt="main mist image" class="img">
            </div>
            
            <div class="right">
                <h2><?php echo $res['TITLE']; ?></h2>
                <div>
                    <?php if($promo != 0){ ?>
                    <div class="affiche">prix : <span class="currentPrice"><?php echo $res['PRICE']; ?>€</span></div> 
                    <div class="affiche">prix soldé: <span class="soldePrice"><?php echo round($res['PRICE']-(($res['PRICE']/100)*$promo), 2); ?> €</span></div> 
                    <div class="affiche"><span class="promotion">- <?php echo $res['PROMOTION']; ?></span> %</div>
                    <div class="promoImg"></div> 
                    <?php }else{?>
                    <div class="affiche">prix : <span class="nopromo"><?php echo $res['PRICE']; ?>€</span></div> 
                    <?php }?>
                </div>
                <?php 
                if(isset($_SESSION['user_id'])){ ?>
                <a class="buttonbuy" href="/mist/helper/game_controller.php?id=<?php echo $_GET['id']; ?>">Acheter</a>
                <?php }else{ ?>
                <a class="buttonbuy" href="/mist/pages/login/login.php">Se connecter</a>
                <?php } ?>
            </div>
        </div>
        <div class="infoGame">
            <h2 class="title" >Information</h2>
            <ul>
                <li><span>Date de sortie :</span><?php echo $res['RELEASEDATE']; ?></li>
                <li><span>Tags :</span><span class="links"><?php echo $res['GENRES']; ?></span></li>
                <li><span>Développeur :</span><?php echo $res['DEVELOPER']; ?></li>
                <li><span>Éditeur :</span><?php echo $res['EDITOR']; ?></li>
            </ul>
        </div>
        <iframe width="420" height="315"
        src="<?php echo $res['VIDEOURL']; ?>">
        </iframe> 
    </div>
        <?php include '../../component/footer/footer.html' ?>
    </body>
    <script
			  src="https://code.jquery.com/jquery-3.6.4.min.js"
			  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
			  crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/2c684a3113.js" crossorigin="anonymous"></script>
    <script src="/mist/component/navbar/navbar.js"></script>
    <script src="/mist/pages/game-details/details.js"></script>
</html>
