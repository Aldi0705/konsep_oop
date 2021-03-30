<?php

  // Include database file
  include 'app/Controller/complaint.php';

  $customerObj = new complaint();

  // Insert Record in customer table
  if(isset($_POST['submit'])) {
    $customerObj->insertData($_POST);
  }
?>
<div class="card text-center" style="padding:15px;">
  <h4>CRUD Complaint</h4>
</div><br> 
<div class="container">
  <form action="index.php?page=complaint-create" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="customer_nik">Nik:</label>
      <input type="text" class="form-control" name="customer_nik" placeholder="Enter nik" required="">
    </div>
    <div class="mb-3">
      <label for="formFileMultiple" class="form-label">Masukkan Bukti</label>
      <input class="form-control" type="file" name="foto" multiple>
    </div>
    <div class="form-group">
      <label for="tanggal">Tanggal</label>
      <input type="date" class="form-control" name="tanggal" required="">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Laporan</label>
      <textarea class="form-control" name="description" require="" rows="3"></textarea>
    </div>
    <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
  </form>
</div>