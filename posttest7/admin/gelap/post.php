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
        <link rel="stylesheet" href="post.css">
    </head>
    <body>
        <div class="konsult">
            <div class="inner">
                <h1>Konsultasi</h1>
                <div class="border"></div>
                <div class="baris">
                    <div class="kolom">
                        <div class="konsul">
                            <img src="../../image/profile.png" alt="">
                            <div class="name">AMBATUKAM<br><h6>082134567891<br>LAKI-LAKI</h6>
                            </div>
                            <p>
                            selamat sore dok,

saya mau tanya dok, mama saya divonis mempunyai batu ginjal di salah satu ginjalnya, dan dokter menyarankan untuk mengangkatnya.

sekarang ginjalnya mama saya hanya 1 dok, dan kemarin mama saya divonis kembali oleh dokter bahwa ginjalnya terkena racun dan harus dilakukan cuci darah.....
                            </p>
                        </div>
                    </div>
                    <div class="kolom">
                        <div class="konsul">
                            <img src="../../image/profile.png" alt="">
                            <div class="name">Anya Melfisa<br><h6>0856575859100<br>PEREMPUAN</h6>
                            </div>
                            <p>
                            Dok saya mau tanya, Dok saya lagi hamil udah 7 bulan, Stretch Mark saya banyak Dok di paha,betis, pinggang, bokong, perut bagian bawah, dan itu bewarna agak kehitaman, apakah itu normal ya dok. ?? Tapi sebelum hamil saya nggak ada Stretch Mark dok.
                            </p>
                        </div>
                    </div>
                    <div class="kolom">
                        <div class="konsul">
                            <img src="../../image/profile.png" alt="">
                            <div class="name">KOBO KANAERU<br><h6>082171045161<br>PEREMPUAN</h6>
                            </div>
                            <p>
                            Assalamualaikum dok . Selamat malam Kalau untuk menjaga kesehatan suara kita supaya tidak serak bagaimana dok. Soal nya saya kerjanya berbicara terus di media online terimakasih dok...
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<?php

include "foot.php";

?>