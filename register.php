<?php

  // Include database file
  include 'app/Controller/custumers.php';

  $customerObj = new Customers();

  // Insert Record in customer table
  if(isset($_POST['submit'])) {
    $customerObj->insertData($_POST);
  }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <title>CRUD USER</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    </head>
<body>
    <div class="card text-center" style="padding:15px;">
    <h1>Register</h1>
    </div><br><br> 

    <div class="container">
    <form action="aksi_register.php" method="POST">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" placeholder="Enter name" required="">
        </div>
        <div class="form-group">
            <label for="nik">Nik:</label>
            <input type="number" class="form-control" name="nik" placeholder="Enter nik" required="">
        </div>
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" name="email" placeholder="Enter email" required="">                                                                                                                                                                
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="text" class="form-control" name="password" placeholder="Enter password" required="">
        </div>
        <div class="form-group">
            <label for="telp">No. Telp:</label>
            <input type="number" class="form-control" name="telp" placeholder="Enter password" required="">
        </div>
        <div class="mb-3">
        <label for="rule">Rule:</label>
        <br>
            <select name="rule" require="" class="pl-10">
            <option>Masyarakat</option>
            </select>
        </div>
        <div class="form-group">
            <label for="bod">Tanggal Lahir</label>
            <input type="date" class="form-control" name="bod" required="">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
            <textarea class="form-control" name="address" require="" rows="3"></textarea>
        </div>
            <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
    </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>