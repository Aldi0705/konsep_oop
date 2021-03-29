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
  case 'complaint': // $page == home (jika isi dari $page adalah home)
    include "complaint/index.php"; // load file home.php yang ada di folder views
  break;
  case 'complaint-create': // $page == home (jika isi dari $page adalah home)
    include "complaint/add.php"; // load file home.php yang ada di folder views
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