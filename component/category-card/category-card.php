<?php
    $genres = array("SOLO","MULTI","ADVENTURE","ACTION","FPS","RPG");
?>
<h3 class="title">Catégories</h3>
<div class="parent">
    <div class="wrapper">
    <?php for($counter = 0; $counter < 6; $counter++){ ?>
        <a href="/mist/research.php?genre=<?php echo $genres[$counter]; ?>">
            <div class="gamecard" 
            style="background-image: url('assets/categories-img/bg/bg-<?php echo $counter; ?>.jpg')"
            data-aos="zoom-in" 
            data-aos-duration="1000" 
            data-aos-once="true">
                <h1 class="title-cat"><?php echo $genres[$counter]; ?></h1>
                <img class="image image{{this.numbImg}}" src="assets/categories-img/perk/perk-<?php echo $counter; ?>.png">
            </div>
        </a>
<?php } ?>
    </div>
</div> 