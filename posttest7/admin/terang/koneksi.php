<?php 
    $conn = mysqli_connect("localhost", "root", "", "dokter");


    if (!$conn) {
        die("Gagal terhubung ke database" . mysqli_connect_error());
    }
?>