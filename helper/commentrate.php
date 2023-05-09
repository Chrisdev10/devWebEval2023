<?php
    require_once(__DIR__.'/../database.php');
    if(isset($_POST)){
        $data = file_get_contents("php://input");
        $res = json_decode($data, true);
        $comment = $res['comment'];
        $score = $res['score'];
        $game = $res['game'];
        $user = $res['user'];
        add_comment($user, $game, $comment, $score);
        
        echo json_encode(array('status' => 'success', 'code' => '200'));
     }
    
    
?>