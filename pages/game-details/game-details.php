<?php
    require_once('../../database.php');
    session_start();
    $res = get_game_info($_GET['id']);   
    $rate = get_comment_by_game($_GET['id']);
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
                <!-- <div class="promoImg"></div>  -->
                <div>
                    <?php if($promo != 0){ ?>
                    <div class="affiche">prix : <span class="currentPrice"><?php echo $res['PRICE']; ?>€</span></div> 
                    <div class="affiche">prix soldé: <span class="soldePrice"><?php echo round($res['PRICE']-(($res['PRICE']/100)*$promo), 2); ?> €</span></div> 
                    <div class="affiche"><span class="promotion">- <?php echo $res['PROMOTION']; ?></span> %</div>
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
            <div class="infowrap">
                <div class="infopt1">
                    <h2 class="title" >Information</h2>
                    <ul class="listItems">
                        <li><span>Date de sortie  </span><span><?php echo $res['RELEASEDATE']; ?></span></li>
                        <li><span>Tags  </span><span><?php echo $res['GENRES']; ?></span></span></li>
                        <li><span>Développeur  </span><span><?php echo $res['DEVELOPER']; ?></span></li>
                        <li><span>Éditeur  </span><span><?php echo $res['EDITOR']; ?></span></li>
                    </ul>
                </div>
                <div class="infopt2">
                    <?php include '../../component/rate/rate.php' ?> 
                </div>
            </div>
            <h2 class="title title-90" >Bande annonce</h2>
            <div class="video">
                <div class="h-frame">
                    <iframe width="400" height="300" frameborder="0" allowfullscreen
                    src="<?php echo $res['VIDEOURL']; ?>">
                    </iframe>
                </div>
                
            </div>
            <h2 class="title title-90" >Configuration nécessaire</h2>
            <div class="tab">
                <button class="tablinks" onclick="opencfg('min')">Minimum</button>
                <button class="tablinks" onclick="opencfg('max')">Maximum</button>
            </div>
            <div id="min" class="tabcontent">
                <ul class="listItems">
                    <li><span>Processeur   </span><span>Intel Core i7 8700 / AMD Ryzen 5 3600</span></li>
                    <li><span>Carte graphique  </span><span>NVIDIA GeForce 1080 Ti / AMD Radeon RX 5700 XT / Intel Arc A770</span></li>
                    <li><span>RAM  </span><span>16 Go</span></li>
                    <li><span>Type de stockage  </span><span>SSD</span></li>
                    <li><span>Résolution   </span><span>1920 x 1080 pixels</span></li>
                    <li><span>Taux de rafraichissement   </span><span>60 Hz</span></li>
                    <li><span>Système d'exploitation   </span><span>Windows 10 64-bit</span></li>
                    <li><span>Version DirectX   </span><span>DirectX 12</span></li>
                </ul>
            </div>
            <div id="max" class="tabcontent">
                <ul class="listItems">
                    <li><span>Processeur   </span><span>Intel Core i7-10700K / AMD Ryzen 7 5800X</span></li>
                    <li><span>Carte graphique  </span><span>NVIDIA GeForce RTX 3090 Ti / AMD Radeon RX 7900 XT</span></li>
                    <li><span>RAM  </span><span>32  Go</span></li>
                    <li><span>Type de stockage  </span><span>SSD</span></li>
                    <li><span>Résolution   </span><span>3840 x 2160 pixels</span></li>
                    <li><span>Taux de rafraichissement   </span><span>60 Hz</span></li>
                    <li><span>Système d'exploitation   </span><span>Windows 10 64-bit</span></li>
                    <li><span>Version DirectX   </span><span>DirectX 12</span></li>
                </ul>
            </div>
            <h2 class="title title-90" >Avis</h2>
            <div class="rateUserContainer">
                <?php 
                foreach($rate as $row){ 
                    $counter = $row['SCORE'];
                    ?>
                <div class="rateUser">
                    <h3><?php echo $row['USERNAME'] ?></h3>
                    <div class="starscontainer">
                        <?php for($cptr = 0; $cptr < $counter; $cptr++){?>
                        <img style="width:30px !important" src="/mist/assets/banner/fullstaryellow.png" alt="">
                        <?php } ?>
                        <?php for($cptr = 0; $cptr < (5 - $counter); $cptr++){?>
                        <img style="width:30px !important" src="/mist/assets/banner/fullstar.png" alt="">
                        <?php } ?>
                    </div>
                    <div class="commentUser"><?php echo $row['COMMENT'] ?></div>
                </div>
                <?php } ?>
            </div>    
        </div>
    </div>
        <?php include '../../component/footer/footer.html' ?>
    </body>
    <script>
   
        var id_game = "<?php echo $res['ID'] ?>";
        var id_user = "<?php echo $_SESSION['user_idd'] ?>";

    </script>
    <script
			  src="https://code.jquery.com/jquery-3.6.4.min.js"
			  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
			  crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/2c684a3113.js" crossorigin="anonymous"></script>
    <script src="/mist/component/navbar/navbar.js"></script>
    <script src="/mist/pages/game-details/details.js"></script>
    <script src="/mist/component/rate/rate.js"></script>
</html>
