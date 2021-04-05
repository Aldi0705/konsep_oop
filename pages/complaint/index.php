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
  <div class="card p-3">
    <div class="row mb-3">
      <?php if ($row['rule'] === 'Masyarakat') { ?>
        <div class="col-md-12 text-right">
          <a href="index.php?page=complaint-create" class="btn btn-primary" style="float:right;">Tambah Pengaduan</a>
        </div>
      <?php } ?>
      <?php if ($row['rule'] === 'Admin') { ?>
      <div class="col-md-12 text-right">
      <a href="index.php?page=report" class="btn btn-danger">
        <i class="fa fa-file-pdf" aria-hidden="true"></i> Generate Laporan</a>
      </div>
      <?php } ?>
    </div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Pengadu</th>
          <th>Bukti Pengaduan</th>
          <th>Deskripsi</th>
          <th>Status</th>
          <th>Tanggal</th>
          <th>Action</th>
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
            <td>
              <a href="index.php?page=complaint-detail&detailId=<?php echo $complaint['id'] ?>">
                <i class="fa fa-info" aria-hidden="true" style="padding-left:1px;"></i>
              </a>
              <?php if ($row['rule'] === 'Masyarakat') { ?>
                <a href="index.php?page=complaint-update&editId=<?php echo $complaint['id'] ?>" style="color:green">
                <i class="fa fa-pencil" aria-hidden="true"></i></a>
              <?php } ?>
              <a href="" data-toggle="modal" data-target="#exampleModal<?php echo $complaint['id'] ?>" style="color:white">
                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
              </a>
              <!-- Modal -->
              <div class="modal fade" id="exampleModal<?php echo $complaint['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus Complaint</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="index.php?page=complaint-delete" method="POST">
                        <input type="hidden" value="<?php echo $complaint['id'] ?>" name="deleteId">
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
            </td>
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