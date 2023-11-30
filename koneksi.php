<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'LMS'; // nama database
    $conn = new mysqli($host, $username, $password, $dbname);

    if(!$conn){
        die("Koneksi Gagal:".mysqli_connect_error());
    }
?>