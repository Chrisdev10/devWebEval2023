<?php
    require_once('database.php');
    $res = get_most_recent_games();  
?>
<h3 class="main-title">Les dernières sorties</h3>
<div class="c-wrapper">
    <div id="carousselID" class="caroussel">
    <?php  foreach($res as $row) { 
    ?>
    <a href="/mist/pages/game-details/game-details.php?id=<?php echo $row['ID']; ?>">
    <div style="background-image: url('/mist/assets/games/icon/<?php echo $row['IMAGEURL']; ?>')"></div>
    </a>
    <?php } ?>
    </div>
    <div class="switcher">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
