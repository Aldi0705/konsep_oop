<?php 
    // koneksi database
    // include 'koneksi.php';

  // Include database file
    $localhost = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'penjualan';
    $koneksi = mysqli_connect($localhost,$username,$password,$database);

    // Check connection
    if (mysqli_connect_errno()){
        echo "Koneksi database gagal : " . mysqli_connect_error();
    }
    
    // menangkap data yang di kirim dari form
    $name = $_POST['name'];
    $nik = $_POST['nik'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $telp = $_POST['telp'];
    $role = 'masyarakat';
    $bod = $_POST['bod'];
    $address = $_POST['address'];
    $query = "INSERT INTO customers (name,nik,email,password,telp,rule,bod,address) values('$name','$nik','$email','$password','$telp','$role','$bod','$address')";
    
    // menginput data ke database
    $send = mysqli_query($koneksi,$query) or die(mysqli_error($koneksi).$query);
    // mengalihkan halaman kembali ke index.php
    header("location:login.php");
 
?>