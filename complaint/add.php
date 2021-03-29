<?php

  // Include database file
  include 'app/Controller/complaint.php';

  $customerObj = new complaint();

  // Insert Record in customer table
  if(isset($_POST['submit'])) {
    $customerObj->insertData($_POST);
  
    $target_dir = "assets/uploads/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if($check !== false) {
      move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
      $query = "INSERT INTO complaint (custumer_id,description,foto,tanggal) values('$user_id','$description','$target_file', '$date')";
      $send = mysqli_query($koneksi,$query) or die(mysqli_error($koneksi).$query);
        
        header("location:index.php?page=complaint");
    } else {
      echo "File is not an image.";
    }
  }
?>
<div class="card text-center" style="padding:15px;">
  <h4>CRUD Complaint</h4>
</div><br> 
<div class="container">
  <form action="index.php?page=complaint-create" method="POST">
    <div class="form-group">
      <label for="customer_nik">Nik:</label>
      <input type="text" class="form-control" name="customer_nik" placeholder="Enter nik" required="">
    </div>
    <div class="mb-3">
      <label for="formFileMultiple" class="form-label">Masukkan Bukti</label>
      <input class="form-control" type="file" name="foto" multiple>
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
      <textarea class="form-control" name="description" require="" rows="3"></textarea>
    </div>
    <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
  </form>
</div>