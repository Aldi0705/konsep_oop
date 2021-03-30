<?php
  
  // Include database file
  include 'app/Controller/complaint.php';

  $complaintObj = new complaint();

  // Edit complaint record
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $complaint = $complaintObj->displyaRecordById($editId);
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
  <form action="index.php?page=complaint-update" method="POST">
    <img src="<?php echo $complaint['foto'] ?>" width="250" height="150">
    <div class="form-group">
      <label for="name">Masukkan bukti:</label>
      <input class="form-control" type="file" name="foto" multiple>
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Laporan</label>
      <textarea class="form-control" name="description" require="" rows="3"></textarea>
    </div>
    <div class="form-group">
      <input type="hidden" name="id" value="<?php echo $complaint['id']; ?>">
      <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update">
    </div>
  </form>
</div>
