<?php 
if (!empty($_GET) && $_GET['action'] == 'getPosts') {
  require_once '../classes/Blog.php';
  $Blog = new Blog();
  $results = [];
  $results = $Blog->getPosts();
  echo json_encode($results);
  exit();
}

if (!empty($_GET) && $_GET['action'] == 'getPost') {
  require_once '../classes/Blog.php';
  $Blog = new Blog();
  $id = $_GET['id'];
  $result = [];
  $result = $Blog->getPost_Detail('id_post', $id);
  echo json_encode($result);
  exit();
}

if (!empty($_GET) && $_GET['action'] == 'get_top_Post') {
  require_once '../classes/Blog.php';
  $Blog = new Blog();
  $result = [];
  $result = $Blog->get_top_Posts();
  echo json_encode($result);
  exit();
}


