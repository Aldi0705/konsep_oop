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
  <table class="table table-hover">
    <tbody>
        <?php 
          if (!is_null($customer)) {
        ?>
        <tr>
          <th>Name</th>
          <td><?php echo $customer['name'] ?></td>
        </tr>
        <tr>
          <th>Nik</th>
          <td><?php echo $customer['nik'] ?></td>
        </tr>
        <tr>  
          <th>Email</th>
          <td><?php echo $customer['email'] ?></td>
        </tr>
        <tr> 
         <th>No.Telp</th>
          <td><?php echo $customer['telp'] ?></td>
        </tr>
        <tr>
          <th>Rule</th>
          <td><?php echo $customer['rule'] ?></td>
        </tr>
        <tr>
          <th>Tanggal Lahir</th>
          <td><?php echo $customer['bod'] ?></td>
        </tr>
        <tr>
          <th>Alamat</th>
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