<?php
    require_once('../../database.php');
    if(isset($_GET['genre'])){
        $genre = $_GET['genre'];
        $res = search_game_by_genre($genre);
    }else{
        $criteria = $_POST['criteria'];
        $res = search_game($criteria);
    }

    
?>
<html>
    <head>
        <link rel="stylesheet" href="/mist/pages/research/research.css"/>
        <link rel="stylesheet" href="/mist/component/game_card/game-card.css">
        <link rel="stylesheet" href="/mist/component/navbar/navbar.css">
        <link rel="stylesheet" href="/mist/component/footer/footer.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="index.css">
    <head>
    <body style="background-color: #333333">
    <?php include '../../component/navbar/navbar.php' ?>
    <h3 class="main-title">Rechercher</h3>
        <section class="promo">
        <?php  foreach($res as $row) { 
            $promo = $row['PROMOTION'];
        ?>
        <div class="center-card">
            <a href="/mist/pages/game-details/game-details.php?id=<?php echo $row['ID']; ?>">
                <div class="main-card" style="background-image: url('<?php echo $row['IMAGEURL']; ?>')">
                    <?php if($promo != 0){ ?>
                    <div class="promo-icon">
                        <p class="promo-icon-p">-<?php echo $row['PROMOTION']; ?>%</p>
                        <img src="/mist/assets/cards/promo1.png" style="width: 50px" alt="">
                    </div>
                    <?php } ?>
                    <!-- <div class="title-card"><?php echo $row['TITLE']; ?></div> -->                
                    <?php if($promo != 0){ ?>
                        <div id="raw" class="price"><?php echo $row['PRICE']; ?>€</div>
                        <div class="price"><?php echo round($row['PRICE']-(($row['PRICE']/100)*$promo), 2); ?>€</div>
                    <?php }else{ ?>
                        <div class="price"><?php echo $row['PRICE']; ?>€</div>
                    <?php } ?>
                </div>
            </a>
        </div>
        <?php } ?>
        </section>      
        <?php include '../../component/footer/footer.html' ?>
    </body>
</html>