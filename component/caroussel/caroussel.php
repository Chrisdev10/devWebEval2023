<?php
    require_once('database.php');
    $res = get_most_recent_games();  
?>
<h3 class="main-title">Les dernières sorties</h3>
<div class="c-wrapper">
    <div id="carousselID" class="caroussel">
    <?php  foreach($res as $row) { 
    ?>
    <div style="background-image: url('<?php echo $row['IMAGEURL']; ?>')"></div>

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
