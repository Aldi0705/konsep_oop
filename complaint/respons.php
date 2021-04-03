<?php
  
  // Include database file
  include 'app/Controller/complaint.php';

  $complaintObj = new complaint();

  // Edit complaint record
  if(isset($_GET['responId']) && !empty($_GET['responId'])) {
    $responId = $_GET['responId'];
    $complaint = $complaintObj->displyaRecordById($responId);
  }

  if(isset($_GET['get'])) {
    $complaintObj->displayData($_GET);
  }  

  // Update Record in complaint table
  if(isset($_POST['update'])) {
    $complaintObj->updateRecord($_POST);
  }  
    
?>
<div class="card text-center" style="padding:15px;">
  <h4 style="text-transform: capitalize;">View <?php echo $_GET['page']; ?></h4>
</div><br><br> 

<div class="container">
  <form action="index.php?page=complaint-update" method="POST" enctype="multipart/form-data">
    <img src="<?php echo $complaint['foto'] ?>" width="250" height="150">
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Laporan</label>
      <textarea class="form-control" name="description" rows="3" ><?php echo $complaint['description'] ?></textarea>
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Laporan</label>
      <textarea class="form-control" name="description" rows="3" ></textarea>
    </div>
    <div class="form-group">
      <input type="hidden" name="id" value="<?php echo $complaint['id']; ?>">
      <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Tanggapi">
    </div>
  </form>
</div>
