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
    <header class="gameBg" style="background-image: url('<?php echo $res['IMAGEURL']; ?>')"></header>
    <div>
        <div class="details">
            <div class="left">
                <br>
                <img src="<?php echo $res['IMAGEURL']; ?>" alt="main mist image" class="img">
            </div>
            
            <div class="right">
                <h2><?php echo $res['TITLE']; ?></h2>
                <h4>Détails du jeux</h4>
                <br>
                <ul>
                    <li><span class="affiche">Date de sortie :</span><?php echo $res['RELEASEDATE']; ?></li>
                    <li><span class="affiche">Tags :</span><span class="links"><?php echo $res['GENRES']; ?></span></li>
                    <li><span class="affiche">Développeur :</span><?php echo $res['DEVELOPER']; ?></li>
                    <li><span class="affiche">Éditeur :</span><?php echo $res['EDITOR']; ?></li>
                    <li><span class="affiche">Prix standard :</span><?php echo $res['PRICE']; ?> € </li>
                    <?php if($promo != 0){ ?>
                    <li><span class="affiche">Prix soldé:</span><?php echo round($res['PRICE']-(($res['PRICE']/100)*$promo), 2); ?> € </li>
                    <li><span class="affiche">Promotion actuelle :</span><?php echo $res['PROMOTION']; ?> % </li>
                    <?php } ?>
                </ul>
                
            </div>
        </div>
        
        <div class="d-flex justify-content-center">
            <button class="button" id="buy">Buy now</button>
            <button class="button" id="connecter">Se connecter</button>
        </div>
    </div>
        <?php include '../../component/footer/footer.html' ?>
    </body>
    <script>var game_id = <?php echo $_GET['id']; ?>;var user_id = "<?php echo $_SESSION['user_id']; ?>"</script>
    <script
			  src="https://code.jquery.com/jquery-3.6.4.min.js"
			  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
			  crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/2c684a3113.js" crossorigin="anonymous"></script>
    <script src="/mist/component/navbar/navbar.js"></script>
    <script src="/mist/pages/game-details/details.js"></script>
</html>
