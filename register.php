<!DOCTYPE html>
<html lang="en">
<head>
  <title>Halaman Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/ceh.css">
</head>
<body class ="bd-1">
    <div class="card text-center" style="padding:15px;">
        <h1>Halaman Register</h1>
    </div>
    <br><br> 
    <div class="container">
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name" required="">
            </div>
            <div class="form-group">
                <label for="nik">Nik:</label>
                <input type="number" class="form-control" name="nik" placeholder="Enter nik" required="">
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email" required="">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="text" class="form-control" name="password" placeholder="Enter password" required="">
            </div>
            <div class="form-group">
                <label for="telp">No. Telp:</label>
                <input type="number" class="form-control" name="telp" placeholder="Enter password" required="">
            </div>
            <div class="form-group">
                <label for="bod">Tanggal Lahir</label>
                <input type="date" class="form-control" name="bod" required="">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                <textarea class="form-control" name="address" require="" rows="3"></textarea>
            </div>
                <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>