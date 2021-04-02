<?php
  
  // Include database file
  include 'app/Controller/custumers.php';

  $customerObj = new Customers();

  // Delete record from table
  
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    echo $_GET['deleteId'];
  exit;
      $deleteId = $_GET['deleteId'];
      $customerObj->deleteRecord($deleteId);
  }
     
?>

<div class="card text-center" style="padding:15px;">
  <h4 style="text-transform: capitalize;">View <?php echo $_GET['page']; ?></h4>
</div><br><br> 

<div class="container">
  <h2>View <?php echo $_GET['page']; ?>
    <a href="index.php?page=user-create" class="btn btn-primary" style="float:right;">Add New Record</a>
  </h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Nik</th>
        <th>Email</th>
        <th>No.Telp</th>
        <th>Rule</th>
        <th>Tanggal Lahir</th>
        <th>Alamat</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php 
          $customers = $customerObj->displayData();
          if (!is_null($customers)) {
            foreach ($customers as $customer){
        ?>
        <tr>
          <td><?php echo $customer['name'] ?></td>
          <td><?php echo $customer['nik'] ?></td>
          <td><?php echo $customer['email'] ?></td>
          <td><?php echo $customer['telp'] ?></td>
          <td><?php echo $customer['rule'] ?></td>
          <td><?php echo $customer['bod'] ?></td>
          <td><?php echo $customer['address'] ?></td>
          <td>
            <a href="index.php?page=user-detail&&detailId=<?php echo $customer['id'] ?>">
              <i class="fa fa-info" aria-hidden="true" style="padding-left:1px;"></i>
            </a>
            <a href="index.php?page=user-update&editId=<?php echo $customer['id'] ?>" style="color:green">
              <i class="fa fa-pencil" aria-hidden="true"></i></a>
            <a href="" data-toggle="modal" data-target="#exampleModal<?php echo $customer['id'] ?>" style="color:white">
            <i class="fa fa-trash text-danger" aria-hidden="true"></i></a>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal<?php echo $customer['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="index.php?page=user-delete" method="POST">
                      <input type="hidden" value="<?php echo $customer['id'] ?>" name="deleteId">
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