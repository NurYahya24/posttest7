<?php
    session_start();
    error_reporting(0);
    if(isset($_SESSION['username'])){
        if($_SESSION['username']=="admin"){

        }
        elseif($_SESSION['username']=="user"){
            header("Location: ../../user/terang/index.php");
        }
    }

    if(!isset($_SESSION['username'])){
        header("Location: ../../index.php");
    }

    include "head.php";
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="about-me.css">
    </head>
    <body>
        <div class="main">
            <div class="img">
                <img src="../../image/profile.png" alt="">
            </div>
            <div class="text">
                <h1>About Me</h1>
                <p>
                    Saya adalah mahasiswa yang sedang menempuh pendidikan S1 di program studi INFORMATIKA Universitas Mulawarman, hobi tidak ada, dan cita-cita saya ingin menjadi pemain pes terkuat sejagad raya
                </p>
                <div class="button">
                    <a href="https://www.youtube.com/channel/UCKpoK5pIwfOCZKoP_ytd5TQ" class="btn">Subscribe</a>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
    include "foot.php";
?>

