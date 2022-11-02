<?php

session_start();
require 'koneksi.php';
error_reporting(0);

if(!isset($_SESSION['login'])){
    header("Location: ../../index.php");
    exit;
}


if (isset($_POST["kirim"])) {
    $nama = htmlspecialchars($_POST["nama"]);
    $nip = htmlspecialchars($_POST["nip"]);
    $spesialis = htmlspecialchars($_POST["spesialis"]);
    $alamat = htmlspecialchars($_POST["alamat"]);
    $foto = $_FILES['gambar']['name'];
    $x = explode('.', $foto);
    $extensi = strtolower(end($x));
    $fotoNew = "$nip.$extensi";
    $tmp = $_FILES['gambar']['tmp_name'];
    $tanggal = $_POST['tanggal'];

    move_uploaded_file($tmp, '../../image/'.$fotoNew);


    $sql = "INSERT INTO tbdokter VALUES ('', '$nama', '$nip', '$spesialis', '$alamat', '$fotoNew', '$tanggal')";

    $result = mysqli_query($conn, $sql);

    if ( $result ) {
        echo"
            <script>
                alert('Data berhasil ditambah');
                document.location.href = 'dok.php';
            </script>
        ";
    }else{
        echo"
            <script>
                alert('Data gagal ditambah');
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
                    <form action="" method="post" enctype="multipart/form-data">
                    <input type="text" class="field" name="nama" placeholder="Nama...">
                    <input type="text" class="field" name="nip" placeholder="NIP...">
                    <select class="field" name="spesialis">
                        <option value="0" name="spesialis">Jenis Spesialis...</option>
                        <option value="Umum" name="spesialis">Umum</option>
                        <option value="Penyakit Dalam" name="spesialis">Penyakit Dalam</option>
                        <option value="THT" name="spesialis">THT</option>
                        <option value="Kulit dan Kelamin" name="spesialis">Kulit dan Kelamin</option>
                        <option value="Anak" name="spesialis">Anak</option>
                    </select>
                    <textarea class="field area" name="alamat" placeholder="Alamat..."></textarea>
                    Upload Foto
                    <input type="file" name="gambar"><br><br>
                    <input type="hidden" name="tanggal" value=<?php echo date("d/m/y");?>>
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