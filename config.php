<?php
$page = (isset($_GET['page']))? $_GET['page'] : '';
switch($page){
  case 'user': // $page == home (jika isi dari $page adalah home)
  include "user/index.php"; // load file home.php yang ada di folder views
  break;
  case 'user-create': // $page == home (jika isi dari $page adalah home)
    include "user/add.php"; // load file home.php yang ada di folder views
  break;
  case 'user-update': // $page == home (jika isi dari $page adalah home)
    include "user/edit.php"; // load file home.php yang ada di folder views
  break;
  case 'user-delete': // $page == home (jika isi dari $page adalah home)
    include 'app/Controller/custumers.php';
    $customerObj = new Customers();
    if(isset($_POST['deleteId']) && !empty($_POST['deleteId'])) {
        $deleteId = $_POST['deleteId'];
        $customerObj->deleteRecord($deleteId);
    }
  break;
  case 'complaint': // $page == home (jika isi dari $page adalah home)
    include "complaint/index.php"; // load file home.php yang ada di folder views
  break;
  case 'complaint-create': // $page == home (jika isi dari $page adalah home)
    include "complaint/add.php"; // load file home.php yang ada di folder views
  break;
  case 'complaint-update': // $page == home (jika isi dari $page adalah home)
    include "complaint/edit.php"; // load file home.php yang ada di folder views
  break;
  case 'complaint-delete': // $page == home (jika isi dari $page adalah home)
    include 'app/Controller/complaint.php';
    $customerObj = new complaint();
    if(isset($_POST['deleteId']) && !empty($_POST['deleteId'])) {
        $deleteId = $_POST['deleteId'];
        $customerObj->deleteRecord($deleteId);
    }
  break;
  // case 'case_selanjutnya':
  // include "views/case_selanjutnya.php";
  // break;
  
  // case 'case_selanjutnya':
  // include "views/case_selanjutnya.php";
  // break;
  
  // case 'case_selanjutnya':
  // include "views/case_selanjutnya.php";
  // break;
  
  default: // Ini untuk set default jika isi dari $page tidak ada pada 3 kondisi diatas
  include "pages/dashboard.php";
}
?>