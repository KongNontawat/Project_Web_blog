<?php 
require_once '../classes/Db_conn.php';
$conn = new Db_conn();
if(isset($_GET['id_post'])) {
  $sql = "UPDATE posts SET like_post = like_post + 1 WHERE id_post = ?";
  $stmt = $conn->connect()->prepare($sql);
  $result = $stmt->execute([$_GET['id_post']]);
  echo $sql;
  if($result) {
    $response = [
      "Message" => "Like Success",
      "Code" => 200
    ];
    echo json_encode($response);
    http_response_code(200);
  }
}
?>