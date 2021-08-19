<?php 
require_once '../classes/Auth.php';
$Auth = new Auth();
session_start();
if (!empty($_POST) && !empty($_POST['username'])) {
  $data = [
    'username' => $_POST['username'],
    'password' => $_POST['password']
  ];
  // exit();
  $result = $Auth->check_login($data);
  if($result) {
    header('location: ../index.php?login_sucess');
  } else {
    header('location: ../login.php?error');
    $_SESSION['message'] = "'ไม่สำเร็จ' username หรือ password ไม่ถูกต้อง โปรดลองอีกครั้ง";
  }
}

?>