<?php
  
  // Include database file
  include 'app/Controller/custumers.php';

  $customerObj = new Customers();

  // Delete record from table
  
  if(isset($_GET['detailId']) && !empty($_GET['detailId'])) {
    $detailId = $_GET['detailId'];
    $customer = $customerObj->displyaRecordById($detailId);
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
        <th>Name</th>
        <th>Nik</th>
        <th>Email</th>
        <th>No.Telp</th>
        <th>Rule</th>
        <th>Tanggal Lahir</th>
        <th>Alamat</th>
      </tr>
    </thead>
    <tbody>
        <?php 
          if (!is_null($customer)) {
        ?>
        <tr>
          <td><?php echo $customer['name'] ?></td>
          <td><?php echo $customer['nik'] ?></td>
          <td><?php echo $customer['email'] ?></td>
          <td><?php echo $customer['telp'] ?></td>
          <td><?php echo $customer['rule'] ?></td>
          <td><?php echo $customer['bod'] ?></td>
          <td><?php echo $customer['address'] ?></td>
        </tr>
      <?php } else { ?>
        <tr>
          <td colspan="8">Tidak ada untuk saat ini.</td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>