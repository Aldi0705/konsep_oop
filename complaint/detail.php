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
    <table class="table table-hover">
      <tbody>
          <?php 
            if (!is_null($complaint)) {
          ?>
          <tr>
            <th>Pengaduan</th>
            <td><?php echo $complaint['customer_name'] ?></td>
          </tr>
          <tr>
            <th>Bukti Pengaduan</th>
            <td><img src="<?php echo $complaint['foto'] ?>" width="228" height="161"></td>
          </tr>
          <tr>
            <th>Deskripsi</th>
            <td><?php echo $complaint['description'] ?></td>
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
        <a href="" data-toggle="modal" data-target="#modalAdd" class="btn btn-primary">
          <i class="fa fa-plus text-danger" aria-hidden="true"></i> Tanggapi
        </a>
      </div>
    </div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Pengadu</th>
          <th>Bukti Pengaduan</th>
          <th>Deskripsi</th>
          <th>Tanggapan</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php 
          $respon = $responObj->displayData();
          if (!is_null($respon)) {
            foreach ($respon as $respon){
      ?>
          <tr>
            <td><?php echo $respon['customer_name'] ?></td>
            <td><img src="<?php echo $respon['complaint_foto'] ?>" width="85" height="95"  data-toggle="modal"></td>
            <td><?php echo $respon['complaint_description'] ?></td>
            <td><?php echo $respon['description'] ?></td>
            <td>
              <?php if($row['rule'] === 'Admin' || $row['rule'] === 'Petugas'){?>
              <a href="index.php?page=complaint-detail&detailId=<?php echo $complaint['id'] ?>">
                <i class="fa fa-info" aria-hidden="true" style="padding-left:1px;"></i>
              </a>
              <?php } ?>
              <a href="index.php?page=complaint-update&editId=<?php echo $complaint['id'] ?>" style="color:green">
              <i class="fa fa-pencil" aria-hidden="true"></i></a>
              <a href="" data-toggle="modal" data-target="#exampleModal<?php echo $complaint['id'] ?>" style="color:white">
                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
              </a>
              <a href="index.php?page=complaint-respon&responId=<?php echo $complaint['id'] ?>" style="color:black">
              <i class="fas fa-reply" aria-hidden="true"></i>
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
          <input type="hidden" value="<?php echo $complaint['customer_id']; ?>" name="customer_id">
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