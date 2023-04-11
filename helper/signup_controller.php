<?php
    require_once(__DIR__.'/../database.php');
    $last_name = $_POST['lastname'];
    $first_name = $_POST['firstname'];
    $birthdate = $_POST['birthdate'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    add_user($last_name,$first_name,$birthdate,$email,$phone,$username,$password);
    header("Location: /mist/login.php");

?>