<?php
    require_once('database.php');
    $res = get_promotion_games();  
?>
<h3 class="main-title">Jeux du moment</h3>
<section class="promo">
    <?php  foreach($res as $row) { 
        $promo = $row['PROMOTION'];   ?>
    <div class="center-card" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
        <a href="/mist/pages/game-details/game-details.php?id=<?php echo $row['ID']; ?>">
            <div class="main-card" style="background-image: url('<?php echo $row['IMAGEURL']; ?>')">
                <?php if($promo != 0){ ?>
                <div class="promo-icon">
                    <p class="promo-icon-p">-<?php echo $promo; ?>%</p>
                    <img src="assets/cards/promo1.png" style="width: 50px" alt="">
                </div>
                <?php } ?>
                <!-- <div class="title-card"><?php echo $row['TITLE']; ?></div> -->
                <div id="raw" class="price"><?php echo $row['PRICE']; ?>€</div>
                
                <?php if($promo != 0){ ?>
                    <div class="price"><?php echo round($row['PRICE']-(($row['PRICE']/100)*$promo), 2); ?>€</div>
                <?php } ?>
            
            </div>
        </a>
    </div>
    <?php } ?>
</section>      