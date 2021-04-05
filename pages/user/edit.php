<?php
  
  // Include database file
  include 'app/Controller/custumers.php';

  $customerObj = new Customers();

  // Edit customer record
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $customer = $customerObj->displyaRecordById($editId);
  }

  // Update Record in customer table
  if(isset($_POST['update'])) {
    $customerObj->updateRecord($_POST);
  }  
    
?>
<div class="card text-center" style="padding:15px;">
  <h4 style="text-transform: capitalize;">View <?php echo $_GET['page']; ?></h4>
</div><br><br> 

<div class="container">
  <form action="/index.php?page=user-update&editId=<?php echo $customer['id']; ?>" method="POST">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" value="<?php echo $customer['name']; ?>" required="" >
    </div>
    <div class="form-group">
      <label for="nik">nik:</label>
      <input type="number" class="form-control" name="nik" value="<?php echo $customer['nik']; ?>" required="" >
    </div>
    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" name="email" value="<?php echo $customer['email']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="password">pass:</label>
      <input type="text" class="form-control" name="password" value="">
    </div>
    <div class="form-group">
      <label for="rule">Rule:</label>
        <select name="rule" >
          <option value="Admin" <?php echo $customer['rule'] === 'Admin'? 'selected' : '' ?>>Admin</option>
          <option value="Petugas" <?php echo $customer['rule'] === 'Petugas'? 'selected' : '' ?>>Petugas</option>
          <option value="Masyarakat" <?php echo $customer['rule'] === 'Masyarakat'? 'selected' : '' ?>>Masyarakat</option>
        </select>
    </div>
    <div class="form-group">
      <input type="hidden" name="id" value="<?php echo $customer['id']; ?>">
      <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update">
    </div>
  </form>
</div>
