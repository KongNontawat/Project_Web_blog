<?php 
require_once 'Db_conn.php';
session_start();
class Auth extends Db_conn {
  protected $table_name = "users";

  public function check_register($user)
  {
    $sql = "
    SELECT 
      username, email
    FROM 
      {$this->table_name}
    WHERE
      username = :username OR email = :email
    ";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(':username', $user['username']);
    $stmt->bindParam(':email', $user['email']);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $data = $result[0];
    if ($data['username'] === $user['username'] && $data['email'] === $user['email']) {
      $_SESSION['message'] = "มี username และ email นี้อยู่ในระบบแล้ว";
      return false;
    } elseif ($data['username'] === $user['username']) {
      $_SESSION['message'] = "มี username นี้อยู่ในระบบแล้ว";
      return false;
    } elseif ($data['email'] === $user['email']) {
      $_SESSION['message'] = "มี email นี้อยู่ในระบบแล้ว";
      return false;
    } else {
      return true;
    }
  }

  public function get_register($data)
  {
    if (!empty($data)) {
      $fileds = $placholders = [];
      foreach ($data as $field => $value) {
        $fileds[] = $field;
        $placholders[] = ":{$field}";
      }
    }
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    $sql = "
    INSERT INTO {$this->table_name} (" . implode(',', $fileds) . ") VALUES (" . implode(',', $placholders) . ")";

    $stmt = $this->connect()->prepare($sql);
    $stmt->execute($data);
    return true;
  }

  public function check_login($data)
  {
    $sql = "
    SELECT
      id,
      username,
      password
    FROM
      {$this->table_name}
    WHERE
      username = :username
    ";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(':username', $data['username']);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $data_result = $result[0];
    if (password_verify($data['password'], $data_result['password'])) {
      $_SESSION['username'] = $data_result['username'];
      $_SESSION['id_user'] = $data_result['id'];
      $_SESSION['login'] = "login";
      return true;
    } else {
      // $_SESSION['msg_error'] = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
      return false;
    }
  }
}

?>