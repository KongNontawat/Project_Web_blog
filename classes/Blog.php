<?php
require 'Db_conn.php';

class Blog extends Db_conn
{
  protected $table_name = 'posts';

  public function Create($data)
  {
    if (!empty($data)) {
      $fileds = $placholders = [];
      foreach ($data as $field => $value) {
        $fileds[] = $field;
        $placholders[] = ":{$field}";
      }
    }
    $sql = "INSERT INTO {$this->table_name} (" . implode(',', $fileds) . ") VALUES (" . implode(',', $placholders) . ")";
    $stmt = $this->connect()->prepare($sql);
    try {
      $this->connect()->beginTransaction();
      $stmt->execute($data);
      $this->connect()->commit();
      return true;
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
      $this->connect()->rollBack();
    }
  }

  public function getPosts()
  {
    $sql = "SELECT * FROM {$this->table_name} ORDER BY id_post DESC";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      $results = $stmt->fetchAll();
    } else {
      $results = [];
    }
    return $results;
  }

  public function get_top_Posts()
  {
    $sql = "SELECT * FROM {$this->table_name} ORDER BY like_post DESC";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      $results = $stmt->fetch();
    } else {
      $results = [];
    }
    return $results;
  }

  public function getCount()
  {
    $sql = "SELECT count(*) as post_count FROM {$this->table_name}";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetch();
    return $results['post_count'];
  }

  public function getPost_Detail($field, $value)
  {
    $sql = "SELECT * FROM {$this->table_name} WHERE {$field}=:{$field}";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([":{$field}" => $value]);
    if ($stmt->rowCount() > 0) {
      $result = $stmt->fetch();
    } else {
      $result = [];
    }
    return $result;
  }

  public function upload_Photo($files)
  {
    function imageResize($imageResourceId, $width, $height)
      {
        $targetWidth = $width < 1280 ? $width : 1280;
        $targetHeight = ($height / $width) * $targetWidth;
        $targetLayer = imagecreatetruecolor($targetWidth, $targetHeight);
        imagecopyresampled($targetLayer, $imageResourceId, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);
        return $targetLayer;
      }

      /** show details */
      function size_as_kb($size = 0)
      {
        if ($size < 1048576) {
          $size_kb = round($size / 1024, 2);
          return "{$size_kb} KB";
        } else {
          $size_mb = round($size / 1048576, 2);
          return "{$size_mb} MB";
        }
      }

      function imgSize($img)
      {
        $targetWidth = $img[0] < 1280 ? $img[0] : 1280;
        $targetHeight = ($img[1] / $img[0]) * $targetWidth;
        return [round($targetWidth, 2), round($targetHeight, 2)];
      }

    if (!empty($files)) {
      $file = $files['tmp_name'];
      $fileName = $files['name'];
      $sourceProperties = getimagesize($file);
      $fileNewName = time();
      $folderPath = "../Image/uploads/";
      $ext = pathinfo($fileName, PATHINFO_EXTENSION);
      $imageType = $sourceProperties[2];
      switch ($imageType) {

        case IMAGETYPE_PNG:
          $imageResourceId = imagecreatefrompng($file);
          $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
          imagepng($targetLayer, $folderPath . $fileNewName. "." . $ext);
          break;

        case IMAGETYPE_GIF:
          $imageResourceId = imagecreatefromgif($file);
          $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
          imagegif($targetLayer, $folderPath . $fileNewName . "." . $ext);
          break;

        case IMAGETYPE_JPEG:
          $imageResourceId = imagecreatefromjpeg($file);
          $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
          imagejpeg($targetLayer, $folderPath . $fileNewName . "." . $ext);
          break;

        default:
          echo "Invalid Image type.";
          exit;
          break;
      }
      $finalFileName = $fileNewName. ".". $ext;
      move_uploaded_file($file."/uploads/", $finalFileName);
      return $finalFileName;
    } else {
      return false;
    }
  }

  public function update($data, $id)
  {
    if (!empty($data)) {
      $fileds = '';
      $x = 1;
      $filedsCount = count($data);
      foreach ($data as $field => $value) {
        $fileds .= "{$field}=:{$field}";
        if ($x < $filedsCount) {
          $fileds .= ", ";
        }
        $x++;
      }
    }
    $sql = "UPDATE {$this->table_name} SET {$fileds} WHERE id_post=:id";
    $stmt = $this->connect()->prepare($sql);
    try {
      $this->connect()->beginTransaction();
      $data['id_post'] = $id;
      $stmt->execute($data);
      $this->connect()->commit();
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
      $this->connect()->rollBack();
    }
  }

  public function deleteRow($id)
  {
    $sql = "DELETE FROM {$this->table_name} WHERE id_post=:id_post";
    $stmt = $this->connect()->prepare($sql);
    try {
      $stmt->execute([":id_post" => $id]);
      if ($stmt->rowCount() > 0) {
        return true;
      }
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
      return false;
    }
  }

  public function searchPost($searchText, $start = 0, $limit = 4)
  {
    $sql = "SELECT * FROM {$this->table_name} WHERE title LIKE :search ORDER BY id_post DESC LIMIT {$start}, {$limit}";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([":search" => "{$searchText}%"]);
    if ($stmt->rowCount() > 0) {
      $result = $stmt->fetchAll();
    } else {
      $result = [];
    }
    return $result;
  }
}
