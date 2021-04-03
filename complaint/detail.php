<?php
  
  // Include database file
  include 'app/Controller/complaint.php';

  $complaintObj = new complaint();

  // Delete record from table
  
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    echo $_GET['deleteId'];
  exit;
      $deleteId = $_GET['deleteId'];
      $complaintObj->deleteRecord($deleteId);
  }
     
?>

<div class="card text-center" style="padding:15px;">
  <h4 style="text-transform: capitalize;">View <?php echo $_GET['page']; ?></h4>
</div><br><br> 

<div class="container">
  <h2>View <?php echo $_GET['page']; ?>
  </h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Pengadu</th>
        <th>Bukti Pengaduan</th>
        <th>Deskripsi</th>
      </tr>
    </thead>
    <tbody>
        <?php 
          $complaint = $complaintObj->displayData();
          if (!is_null($complaint)) {
            foreach ($complaint as $complaint){
        ?>
        <tr>
          <td><?php echo $complaint['customer_name'] ?></td>
          <td><img src="<?php echo $complaint['foto'] ?>" width="35" height="40"></td>
          <td><?php echo $complaint['description'] ?></td>
        </tr>
      <?php } ?>
      <?php } else { ?>
        <tr>
          <td colspan="8">Tidak ada untuk saat ini.</td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>