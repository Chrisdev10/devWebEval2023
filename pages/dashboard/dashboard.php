<?php
    require_once('../../database.php');
    $cpt = 0;
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: /mist/index.php");
    }else{
        $res = get_user($_SESSION['user_id']);     
    }
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/mist/index.css">
<link rel="stylesheet" href="/mist/component/navbar/navbar.css">   
<link rel="stylesheet" href="/mist/pages/dashboard/dashboard.css">
<link rel="stylesheet" href="/mist/component/footer/footer.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<html>
    <body style="background-color: #333333">
        <?php include '../../component/navbar/navbar.php' ?>
        <div class="sign parent" style="max-width: 90% !important">
            <h2 class="title" >Mon compte</h2>
            <div class="infop">
                <div class="personnal">
                    <p><span class="font" >Nom : </span><?php echo $res['LASTNAME']; ?></p>
                    <p><span class="font" >Prenom name : </span><?php echo $res['FIRSTNAME']; ?></p>
                    <p><span class="font" >Pseudo : </span><?php echo $res['USERNAME']; ?></p>
                </div>
                <div class="personnal">
                    <p><span class="font" >Email : </span><?php echo $res['EMAIL']; ?></p>
                    <p><span class="font" >Téléphone : </span><?php echo $res['PHONE']; ?></p>
                </div>
            </div>
            <div class="order-list p-2 pt-4">
                <h2 class="title">Liste de commandes</h2>
                <div class="order">
                    <?php
                        $games = get_all_buy_game($res['ID']);
                        if(count($games) > 0){
                            foreach($games as $row) {
                    ?>
                    <div>
                        <span class="sep"><?php echo $row['TITLE']; ?></span>
                        <span id="blurBtn<?php echo $cpt ?>" class="license"><?php echo $row['GAME_LICENSE']; ?></span>
                        <button id="blur" class="sign-in btn<?php echo $cpt;?>" onclick="showLicense(<?php echo $cpt ?>)">voir</button>
                    </div>
                    <?php 
                        $cpt++;
                            }
                        }else{
                    ?>
                        <span style="text-align: center">Aucune commande trouvée</span>
                    <?php } ?>
                </div>
            </div>
            <div class="payInfo p-2 pt-4">
                <h2 class="title">Moyen de paiement</h2>
                <div>
                    <span> <strong>Numero carte</strong> : BE83 8983 3839 4839 </span>
                    <span> <strong>Date validité</strong> : 10/25</span>
                    <span> <strong>code</strong> : 393</span>
                </div>
            </div>
        </div>
        <?php include '../../component/footer/footer.html' ?>
    </body>
    <script
			  src="https://code.jquery.com/jquery-3.6.4.min.js"
			  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
			  crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/2c684a3113.js" crossorigin="anonymous"></script>
    <script src="/mist/component/navbar/navbar.js"></script>
    <script src="/mist/dashboard.js"></script>
</html>
