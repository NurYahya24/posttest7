<?php
session_start();
error_reporting(0);

if(!isset($_SESSION['login'])){
    header("Location: ../../index.php");
    exit;
}


require 'koneksi.php';
$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM tbdokter WHERE id=$id");

$tbdokter = [];

while ($row = mysqli_fetch_assoc($result)) {
    $tbdokter[] = $row;
}

$dok = $tbdokter[0];

if (isset($_POST["kirim"])) {
    $nama = htmlspecialchars($_POST["nama"]);
    $nip = htmlspecialchars($_POST["nip"]);
    $spesialis = htmlspecialchars($_POST["spesialis"]);
    $alamat = htmlspecialchars($_POST["alamat"]);

    $sql = "UPDATE tbdokter SET
            nama = '$nama',
            nip = '$nip',
            spesialis = '$spesialis',
            alamat = '$alamat'
            WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    if ( $result ) {
        echo"
            <script>
                alert('Data berhasil diubah');
                document.location.href = 'dok.php';
            </script>
        ";
    }else{
        echo"
            <script>
                alert('Data gagal diubah');
                document.location.href = 'input_dok.php';
            </script>
        ";
    }
}

    include'head.php';


?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="input_dok.css">
    </head>
    <body>
        <div class="container">
            <div class="tanya-box">
                <div class="left"></div>
                <div class="right" id="id1">
                    <h2>Input Data Dokter</h2>
                    <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="text" class="field" name="nama" placeholder="<?php echo $dok["nama"]; ?>">
                    <input type="text" class="field" name="nip" placeholder="<?php echo $dok["nip"]; ?>">
                    <select class="field" name="spesialis">
                        <option value="0" name="spesialis">Jenis Spesialis...</option>
                        <option value="Umum" name="spesialis">Umum</option>
                        <option value="Penyakit Dalam" name="spesialis">Penyakit Dalam</option>
                        <option value="THT" name="spesialis">THT</option>
                        <option value="Kulit dan Kelamin" name="spesialis">Kulit dan Kelamin</option>
                        <option value="Anak" name="spesialis">Anak</option>
                    </select>
                    <textarea class="field area" name="alamat" placeholder="<?php echo $dok["alamat"]; ?>"></textarea>
                    <button class="btn" value="kirim" name="kirim">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<?php

    include'foot.php';


?>