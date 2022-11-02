<?php

    $AusernameLogin = "user";
    $ApasswordLogin = "user";
    $BusernameLogin = "admin";
    $BpasswordLogin = "admin";


    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if ($username == $AusernameLogin && $password == $ApasswordLogin && $role == "user"){
        session_start();
        $_SESSION['username'] = $username;
        header("Location: user/terang/index.php");
    }
    elseif ($username == $BusernameLogin && $password == $BpasswordLogin && $role == "admin"){
        session_start();
        $_SESSION['username'] = $username;
        header("Location: admin/terang/index.php");
    }
    else {
        header("Location: index.php");
    }






?>