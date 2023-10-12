<?php

if(isset($_POST["login"])){
    session_start();
    if($_POST["userName"] == "admin" and $_POST['password'] == "admin123"){
        $_SESSION['username'] = $_POST['userName'];
        $_SESSION['password'] = $_POST['password'];
        header("location: index.php");
        exit;
    }else{
        echo "<script>alert('Username or Password is incorrect!');</script>";
        header("location: login.php");
    }
}


if(isset($_GET['action']) == 'logout'){
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time()-3600,"/");
    }
    session_unset();
    session_destroy();
    header('location: login.php');
}


?>