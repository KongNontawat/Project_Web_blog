<?php 
require_once '../classes/Auth.php';
$Auth = new Auth();
session_start();
if (!empty($_POST) && !empty($_POST['username'])) {
  if ($_POST['password'] === $_POST['password2']) {
  $data = [
    'username' => $_POST['username'],
    'email' => $_POST['email']
  ];
  // exit();
  $reg_data = [
    'username' => $_POST['username'],
    'email' => $_POST['email'],
    'password' => $_POST['password']
  ];
  $result = $Auth->check_register($data);
  if ($result) {
    $reg = $Auth->get_register($reg_data);
    if ($reg) {
      header('location: ../index.php?reg_success');
    } else {
      header('location: ../register.php?get_register_error');
      $_SESSION['message'] = "Register ผิดพลาด โปรดลองใหม่ในภายหลัง";
    }
  } else {
    header('location: ../register.php?check_reg_error');
  }
  }else {
    header('location: ../register.php?password_exit');
    $_SESSION['message'] = "password และ confirm password ไม่ตรงกัน โปรดตรวจสอบและลองอีกครั้ง";
  }
  
}

?>