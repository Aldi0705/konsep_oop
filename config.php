<?php
$page = (isset($_GET['page']))? $_GET['page'] : '';
switch($page){
  case 'user': // $page == home (jika isi dari $page adalah home)
  include "pages/user/index.php"; // load file home.php yang ada di folder views
  break;
  case 'user-create': // $page == home (jika isi dari $page adalah home)
    include "pages/user/add.php"; // load file home.php yang ada di folder views
  break;
  case 'user-detail': // $page == home (jika isi dari $page adalah home)
    include "pages/user/detail.php"; // load file home.php yang ada di folder views
  break;
  case 'user-update': // $page == home (jika isi dari $page adalah home)
    include "pages/user/edit.php"; // load file home.php yang ada di folder views
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
    include "pages/complaint/index.php"; // load file home.php yang ada di folder views
  break;
  case 'complaint-create': // $page == home (jika isi dari $page adalah home)
    include "pages/complaint/add.php"; // load file home.php yang ada di folder views
  break;
  case 'complaint-update': // $page == home (jika isi dari $page adalah home)
    include "pages/complaint/edit.php"; // load file home.php yang ada di folder views
  break;
  case 'complaint-detail': // $page == home (jika isi dari $page adalah home)
    include "pages/complaint/detail.php"; // load file home.php yang ada di folder views
  break;
  case 'complaint-delete': // $page == home (jika isi dari $page adalah home)
    include 'app/Controller/complaint.php';
    $customerObj = new complaint();
    if(isset($_POST['deleteId']) && !empty($_POST['deleteId'])) {
        $deleteId = $_POST['deleteId'];
        $customerObj->deleteRecord($deleteId);
    }
  break;
  case 'complaint-finish': // $page == home (jika isi dari $page adalah home)
    include 'app/Controller/complaint.php';
    $customerObj = new complaint();
    if(isset($_GET['complaint_id']) && !empty($_GET['complaint_id'])) {
        $complaintId = $_GET['complaint_id'];
        $customerObj->updateStatus($complaintId);
    }
  break;
  case 'complaint-response': // $page == home (jika isi dari $page adalah home)
    include 'app/Controller/respon.php';
    $responObj = new respon();
    if(isset($_POST['description']) && !empty($_POST['description'])) {
        $responObj->insertData($_POST);
    }
  break;
  case 'respon-delete': // $page == home (jika isi dari $page adalah home)
    include 'app/Controller/respon.php';
    $customerObj = new respon();
    if(isset($_POST['deleteId']) && !empty($_POST['deleteId'])) {
        $deleteId = $_POST['deleteId'];
        $customerObj->deleteRecord($deleteId);
    } ; // load file home.php yang ada di folder views
  break;
  // case 'case_selanjutnya':
  // include "views/case_selanjutnya.php";
  // break;
  
  case 'report': // $page == home (jika isi dari $page adalah home)
    include "pages/pdf/cetak.php"; // load file home.php yang ada di folder views
  break;
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