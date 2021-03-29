<?php
  
  // Include database file
  include 'custumers.php';

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
  <h4>PHP: CRUD (Add, Edit, Delete, View) Application using OOP (Object Oriented Programming) and MYSQL</h4>
</div><br> 

<div class="container">
  <form action="edit.php" method="POST">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" value="<?php echo $customer['name']; ?>" required="">
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
