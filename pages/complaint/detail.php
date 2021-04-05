<?php
  
  // Include database file
  include 'app/Controller/complaint.php';
  include 'app/Controller/respon.php';

  $complaintObj = new complaint();
  $responObj = new respon();

  // Delete record from table
  
  if(isset($_GET['detailId']) && !empty($_GET['detailId'])) {
    $detailId = $_GET['detailId'];
    $complaint = $complaintObj->displyaRecordById($detailId);
  }
  
?>

<div class="card text-center" style="padding:15px;">
  <h4 style="text-transform: capitalize;">View <?php echo $_GET['page']; ?></h4>
</div><br><br> 

<div class="container">
  <div class="card p-5">
    <?php if ($complaint['status'] !== 'Selesai') { ?>
    <div class="row mb-3">
      <?php if ($row['rule'] === 'Admin' || $row['rule'] === 'Petugas' ) { ?>
        <div class="col-md-12 text-right">
          <a href="index.php?page=complaint-finish&complaint_id=<?php echo $complaint['id'] ?>" class="btn btn-success">
            <i class="fa fa-check"></i> Selesaikan Pengaduan
          </a>
        </div>
      <?php } ?>
    </div>
    <?php } ?>
      <table class="table table-hover">
        <tbody>
            <?php 
              if (!is_null($complaint)) {
            ?>
            <tr>
              <th>Pengaduan</th>
              <td><?php echo $complaint['user_name'] ?></td>
            </tr>
            <tr>
              <th>Deskripsi</th>
              <td><?php echo $complaint['description'] ?></td>
            </tr>
            <tr>
              <th>Bukti Pengaduan</th>
              <td><img src="<?php echo $complaint['foto'] ?>" width="228" height="161"></td>
            </tr>
            <tr>
              <th>Status</th>
              <td>
                <?php if ($complaint['status'] === 'Baru') { ?>
                  <span class="text-primary" style="font-weight: bold;"><?php echo $complaint['status']; ?></span>
                <?php } elseif ($complaint['status'] === 'Sedang Diproses') { ?>
                  <span class="text-warning" style="font-weight: bold;"><?php echo $complaint['status']; ?></span>
                <?php }  else { ?>
                  <?php echo $complaint['status'] !== 'Selesai' ?>
                  <span style="font-weight: bold; color: green;"><?php echo $complaint['status']; ?></span>
                <?php } ?>
              </td>
            </tr>
          <?php } else { ?>
            <tr>
              <td colspan="8">Tidak ada untuk saat ini.</td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
   <?php if($row['rule'] === 'Admin' || $row['rule'] === 'Petugas'){?>
  <div class="card mt-5">
    <div class="row p-3">
      <div class="col-md-6">
        <h3>List Tanggapan</h3>
      </div>
      <div class="col-md-6 text-right">
        <?php if ($complaint['status'] !== 'Selesai') { ?>
        <a href="" data-toggle="modal" data-target="#modalAdd" class="btn btn-primary">
          <i class="fa fa-plus" aria-hidden="true"></i> Tanggapi
        </a>
        <?php } ?>
      </div>
    </div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Perespon</th>
          <th>Deskripsi</th>
          <th>Tanggal</th>
        </tr>
      </thead>
      <tbody>
      <?php 
          $respon = $responObj->displayData($complaint['id']);
          if (!is_null($respon)) {
            foreach ($respon as $respon){
      ?>
          <tr>
            <td><?php echo $respon['user_name'] ?></td>
            <td><?php echo $respon['description'] ?></td>
            <td><?php echo date("Y-M-d"); ?></td>
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
<?php } ?>
<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tanggapi Laporan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="index.php?page=complaint-response&responId" method="POST">
          <input type="hidden" value="<?php echo $complaint['user_id']; ?>" name="user_id">
          <input type="hidden" value="<?php echo $complaint['id']; ?>" name="complaint_id">
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Laporan</label>
            <textarea class="form-control" name="description" rows="3" ></textarea>
          </div>
          <div class="row">
            <div class="col-md-6">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <div class="col-md-6 text-right">
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>