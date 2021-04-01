<?php
   //  include("koneksi.php");
    $localhost = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'penjualan';
    $koneksi = mysqli_connect($localhost,$username,$password,$database);

    // Check connection
    if (mysqli_connect_errno()){
        echo "Koneksi database gagal : " . mysqli_connect_error();
    }
    session_start();
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
       // username and password sent from form 
       
       $myusername = mysqli_real_escape_string($koneksi,$_POST['email']);
       $mypassword = mysqli_real_escape_string($koneksi,md5($_POST['password'])); 
       
       $sql = "SELECT id FROM customers WHERE email = '$myusername' and password = '$mypassword'";
       $result = mysqli_query($koneksi,$sql);
       $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
       $active = $row['active'];
       
       $count = mysqli_num_rows($result);
       // If result matched $myusername and $mypassword, table row must be 1 row
         
       if($count === 1) {
          $_SESSION['login_user'] = $myusername;
          
          header("location: index.php");
       }else {
          $error = "Your Login Name or Password is invalid";
       }
    }
?>