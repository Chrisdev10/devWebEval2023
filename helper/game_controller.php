<?php
    require_once(__DIR__.'/../database.php');
    $game_id = $_GET['id'];
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: /mist/index.php");
    }else{
        $res = get_user($_SESSION['user_id']);  
        buy_game($res['ID'], $game_id);
        header("Location: /mist/pages/dashboard/dashboard.php");
    }
?>