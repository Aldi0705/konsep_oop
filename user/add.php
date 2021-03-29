<?php

  // Include database file
  include 'app/Controller/custumers.php';

  $customerObj = new Customers();

  // Insert Record in customer table
  if(isset($_POST['submit'])) {
    $customerObj->insertData($_POST);
  }

?>

<div class="card text-center" style="padding:15px;">
  <h4 style="text-transform: capitalize;">View <?php echo $_GET['page']; ?></h4>
</div><br><br> 

<div class="container">
  <form action="index.php?page=user-create" method="POST">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" placeholder="Enter name" required="">
    </div>
    <div class="form-group">
      <label for="nik">Name:</label>
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
          <option>Admin</option>
          <option>Petugas</option>
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
