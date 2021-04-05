<?php include 'session.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pengaduan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
  <style>
    body {
      background: #eaeaea;
    }
    a:hover{
      color: red;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php?page=dashboard">Dashboard <span class="sr-only">(current)</span></a>
      </li>
      <?php if ($row['rule'] === 'Admin') { ?>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=user">User</a>
      </li>
      <?php }?>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=complaint">Complaint</a>
      </li>
    </ul>
  </div>
  <ul class="navbar-nav">
    <li class="nav-item active">
      <h4><?php echo $row['name']; ?></h4>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="login.php" data-toggle="modal" data-target="#exampleModal">
      Logout
      </a>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">LogOut</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="login.php">
                  <input type="hidden" >
                    <div class="row">
                      <div class="col-md-6">
                        <a href="index.php"class="btn btn-secondary">Close</a>
                        <a href="logout.php"class="btn btn-primary" style="col-md-6">LogOut</a>
                      </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
      </div>
    </li>
  </ul>
</nav>

<div class="container pt-5">
    <?php include "config.php"; // Load file config.php ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>