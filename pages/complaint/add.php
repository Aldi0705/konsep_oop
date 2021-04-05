<?php

  // Include database file
  include 'app/Controller/complaint.php';

  $complaintObj = new complaint();

  // Insert Record in complaint table
  if(isset($_POST['submit'])) {
    $complaintObj->insertData($_POST);
    $complaint = $complaintObj->displayData($_GET);
  }
  
?>
<div class="card text-center" style="padding:15px;">
  <h4>CRUD Complaint</h4>
</div><br> 
<div class="container">
  <form action="index.php?page=complaint-create" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="user_id" value="<?php echo $row['id']?>" >
    <div class="mb-3">
      <label for="formFileMultiple" class="form-label">Masukkan Bukti</label>
      <input class="form-control" type="file" name="foto" multiple>
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Laporan</label>
      <textarea class="form-control" name="description" require="" rows="3"></textarea>
    </div>
    <div class="mb-3">
      <label for="formFileMultiple" class="form-label">Tanggal</label>
      <input class="form-control" type="date" name="date">
    </div>
    <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
  </form>
</div>