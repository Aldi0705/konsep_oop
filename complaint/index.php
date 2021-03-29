<?php
  
  // Include database file
  include 'app/Controller/complaint.php';

  $customerObj = new complaint();

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
  <h2>View User
    <a href="index.php?page=complaint-create" class="btn btn-primary" style="float:right;">Tambah Pengaduan</a>
  </h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Pengadu</th>
        <th>Bukti Pengaduan</th>
        <th>Deskripsi</th>
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
          <td><?php echo $customer['customer_name'] ?></td>
          <td><img src="gambar/<?php echo $customer['foto'] ?>" width="35" height="40"></td>
          <td><?php echo $customer['description'] ?></td>
          <td>
            <a href="index.php?page=user-update?editId=<?php echo $customer['id'] ?>" style="color:green">
              <i class="fa fa-pencil" aria-hidden="true"></i></a>
              <form action="index.php?deleteId=<?php echo $customer['id'] ?>" method="get">
                <button type="submit" class="btn btn-link" style="color:red" onclick="confirm('Are you sure want to delete this record')"><i class="fa fa-trash" aria-hidden="true"></i></button>
              </form>
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