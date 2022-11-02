<?php 
require 'koneksi.php';

$id = $_GET['id'];
$nama = $_GET['foto'];

$result = mysqli_query($conn, "DELETE FROM tbdokter WHERE id = $id");
unlink("../../image/".$nama);

if ( $result ) {
    echo"
        <script>
            alert('Data berhasil dihapus');
            document.location.href = 'dok.php';
        </script>
    ";
}else{  
    echo"
        <script>
            alert('Data gagal dihapus');
            document.location.href = 'dok.php';
        </script>
    ";
}



?>