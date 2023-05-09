<?php
    require_once(__DIR__.'/../database.php');
    if(isset($_GET['id'])){
        session_start();
        $_SESSION['user_id'] = null;
        $_SESSION['user_idd'] = null;
        header("Location: /mist/index.php");
        exit();
    }


    $res = get_user_check($_POST['email'], $_POST['password']);  
    if(isset($res)){
        session_start();
        $_SESSION['user_id'] = $res['USERNAME'];
        $_SESSION['user_idd'] = $res['ID'];
        header("Location: /mist/pages/dashboard/dashboard.php");
        exit();
    }else{
        header("Location: /mist/index.php");
    }

?>
