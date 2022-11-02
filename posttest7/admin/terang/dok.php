<?php
session_start();
include 'koneksi.php';
error_reporting(0);

if(!isset($_SESSION['login'])){
    header("Location: ../../index.php");
    exit;
}


require 'koneksi.php';
$result = mysqli_query($conn, "SELECT * FROM tbdokter");
$tbdokter = [];

while ($row = mysqli_fetch_assoc($result)) {
    $tbdokter[] = $row;
}

if(isset($_GET['search'])){
    $keyword = $_GET['keyword'];
    $hasil = mysqli_query($conn, "SELECT * FROM tbdokter WHERE nama LIKE '%$keyword%' OR nama LIKE '$keyword%' OR nama LIKE '%$keyword'");
}else{
    $hasil = mysqli_query($conn, "SELECT * FROM tbdokter");
}

$tbdokter=[];
while($row=mysqli_fetch_assoc($hasil)){
    $tbdokter[] = $row;
}

include "head.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data dokter</title>
    <link rel="stylesheet" href="dok.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<br>
<form action="" method="GET" class="cari">
    <a href="input_dok.php" id="first">Tambah</a>
    <div class="search-container">
    <input type="text" name="keyword" id="keyword" class="search">
    <button type="submit" name="search"><i class="fa fa-search"></i></button>
    </div>
</form>
<br>
    <div class="table_responsive">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Spesialis</th>
                    <th>Alamat</th>
                    <th>Tanggal Input</th>
                    <th>Aksi</th>
                    
                </tr>
            </thead>

            <tbody>
                <?php $i = 1; foreach ($tbdokter as $dok):?>
                <tr>
                    <td><?php echo $i ;?></td>
                    <td><img src="../../image/<?= $dok['foto'] ?>"></td>
                    <td><?php echo $dok["nama"];?></td>
                    <td><?php echo $dok["nip"];?></td>
                    <td><?php echo $dok["spesialis"];?></td>
                    <td><?php echo $dok["alamat"];?></td>
                    <td><?php echo $dok["tanggal"];?></td>
                    <td>
                        <span class="action_btn">
                            <a href="edit.php?id=<?php echo $dok["id"]; ?>">Edit</a> 
                            <a href="hapus.php?id=<?php echo $dok["id"]; ?>" onclick = "return confirm('And yakin ingin mengahpus data ini ?')">Hapus</a>
                        </span>
                    </td>
                </tr>
                <?php $i++; endforeach;?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php

include "foot.php";

?>