<?php 
    function connect_to_db(){
        $database = 'MIST';
        $user = 'db2admin';
        $password = 'Qwerty1234.';
        $conn = db2_connect($database, $user, $password);
        return $conn;
    }

    function add_user($lastname,$firstname,$birthdate,$email,$phone,$username,$password){
        $sql = "INSERT INTO USER (lastName, firstName, birthDate, email, phone, userName, passWord) values ('".$lastname."', '".$firstname."', '".$birthdate."', '".$email."', '".$phone."', '".$username."', '".$password."')";
        $conn = connect_to_db();
        $stmt = db2_prepare($conn, $sql);
        db2_execute($stmt, array('000010'));
    }
    function add_comment($user, $game, $comment, $score){
        $sql = "INSERT INTO GAME_COMMENT (userid, gameid, comment, score) values ('".$user."', '".$game."', '".$comment."', '".$score."')";
        $conn = connect_to_db();
        $stmt = db2_prepare($conn, $sql);
        db2_execute($stmt, array('000010'));
    }
    function get_comment_by_game($game){
        $sql = "SELECT * FROM GAME_COMMENT as g INNER JOIN user as u  on u.id = g.userid WHERE g.gameid = ".$game." ORDER BY g.ID DESC LIMIT 6";
        return execute_query($sql);
    }
    function search_game($criteria){
        $sql = "SELECT * FROM game as g WHERE lower(g.title) LIKE lower('%".$criteria."%')";
        return execute_query($sql);
    }
    function search_game_by_genre($criteria){
        $sql = "SELECT * FROM game as g WHERE lower(g.genres) LIKE lower('%".$criteria."%')";
        return execute_query($sql);
    }
    function get_game_info($game_id){
        $sql = "SELECT * FROM game as g WHERE g.id = ".$game_id;
        return execute_query_single($sql);
    }
    function get_promotion_games(){
        $sql = "SELECT * FROM game as g WHERE g.promotion != 0 ORDER BY g.promotion DESC LIMIT 8";
        return execute_query($sql);
    }
    function get_user_check($email, $password){
        $sql = "SELECT * FROM user as u WHERE u.email like '".$email."' AND u.password like '".$password."'";
        return execute_query_single($sql);
    }
    function get_user($username){
        $sql = "SELECT * FROM user as u WHERE u.username like '".$username."'";
        return execute_query_single($sql);
    }
    function buy_game($user, $game){
        $license = bin2hex(random_bytes(15)); 
        $sql = "INSERT INTO order (user_id, game_id, game_license) values ('".$user."', '".$game."', '".$license."')";
        $conn = connect_to_db();
        $stmt = db2_prepare($conn, $sql);
        db2_execute($stmt, array('000010'));
    }
    function get_most_recent_games(){
        $sql = "SELECT * FROM game as g ORDER BY g.releasedate DESC LIMIT 6";
        return execute_query($sql);
    }
    function get_all_buy_game($user){
        $sql = "SELECT * FROM order as o JOIN game as g on g.id = o.game_id WHERE o.user_id = ".$user;
        return execute_query($sql);
    }
    function execute_query($sql){
        $resultArray = array();
        $conn = connect_to_db();
        $stmt = db2_prepare($conn, $sql);
        db2_execute($stmt, array('000010'));
        while ($row = db2_fetch_assoc($stmt)){
            $resultArray[] = $row;
        }  
        return $resultArray;
    }
    function execute_query_single($sql){
        $resultArray = array();
        $conn = connect_to_db();
        $stmt = db2_prepare($conn, $sql);
        db2_execute($stmt, array('000010'));
        if($row = db2_fetch_assoc($stmt)){
            return $row;
        }
        return null;
    }
?>
