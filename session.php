<?php
   // include('custumers.php');
   $localhost = 'localhost';
   $username = 'root';
   $password = '';
   $database = 'pengaduan_masyarakat';
   $koneksi = mysqli_connect($localhost,$username,$password,$database);

   // Check connection
   if (mysqli_connect_errno()){
       echo "Koneksi database gagal : " . mysqli_connect_error();
   }
   session_start();

   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($koneksi,"select * from user where email = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['name'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>