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
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Pengadu</th>
          <th>Bukti Pengaduan</th>
          <th>Deskripsi</th>
          <th>Status</th>
          <th>Tanggal</th>
        </tr>
      </thead>
      <tbody>
          <?php 
            $complaint = $complaintObj->displayData();
            if (!is_null($complaint)) {
              foreach ($complaint as $complaint){
          ?>
          <tr>
            <td><?php echo $complaint['user_name'] ?></td>
            <td><img src="<?php echo $complaint['foto'] ?>" width="35" height="40" style="border-radius:50%;" data-toggle="modal"></td>
            <td><?php echo $complaint['description'] ?></td>
            <td>
              <?php if ($complaint['status'] === 'Baru') { ?>
                <span class="text-primary" style="font-weight: bold;"><?php echo $complaint['status']; ?></span>
              <?php } elseif ($complaint['status'] === 'Sedang Diproses') { ?>
                <span class="text-warning" style="font-weight: bold;"><?php echo $complaint['status']; ?></span>
              <?php }  else { ?>
                <?php echo $complaint['status'] !== 'Selesai' ?>
                <span style="font-weight: bold; color:green;"><?php echo $complaint['status']; ?></span>
              <?php } ?>
            </td>
            <td><?php echo $complaint['date'] ?></td>
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
</div>

    <script>
        window.print();
    </script>

