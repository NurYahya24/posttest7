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
    <div class="pala">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <div class="badan">
        <div class="grid">
            <div class="grid-item">
                <div class="card">
                    <img src="../../image/dokter.png" alt="dokter" class="card-img">
                    <div class="card-content">
                        <h1 class="card-header">Data Dokter</h1>
                        <p class="card-text">
                            Manajemen data dokter yang terdaftar di situs kesehatan
                        </p>
                        <button class="card-btn">Lihat Detail</button>
                    </div>
                </div>
            </div>
            <div class="grid-item">
                <div class="card">
                    <img src="../../image/pasien.png" alt="pasien" class="card-img">
                    <div class="card-content">
                        <h1 class="card-header">List Konsultasi</h1>
                        <p class="card-text">
                            Manajemen data list konsultasi dari pengguna situs kesehatan
                        </p>
                        <form action="post.php">
                        <button class="card-btn" value="submit">Lihat Detail</button>
                    </form>
                    </div>
                </div>
            </div>
            <div class="grid-item">
                <div class="card">
                    <img src="../../image/artikel.png" alt="artikel" class="card-img">
                    <div class="card-content">
                        <h1 class="card-header">Artikel</h1>
                        <p class="card-text">
                            Terbitkan artikel baru, dan manajemen data artikel
                        </p>
                        <button class="card-btn">Lihat Detail</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>
    </div>
</html>

<?php
    include "foot.php";
?>

