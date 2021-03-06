<!DOCTYPE html>
<html lang="en">
<?php session_start();?>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Create Post</title>
  <!-- CDN Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
    crossorigin="anonymous" />
  <!-- SweetAlert2 -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="CSS/style.css" rel="stylesheet" />
  <style>
    #imgControl {
      margin: 0;
      max-width: 400px;
      max-height: 200px;
    }
    #imgControl #imgUpload{
      width: 100%;
      max-height: 200px;
      object-fit: cover;
      overflow: hidden;
    }
    @media (max-width: 768px) {
      #imgControl #imgUpload{
      /* max-height: 400px; */
    }
    }
  </style>
</head>

<body style="height: 100vh;">
  <?php include 'components/navbar.php';?>
  <div class="container mb-3 h-100 mt-1 mt-md-0">
    <div class="row justify-content-center h-100 align-items-center ">
      <div class="col-12 col-md-11 col-lg-10 col-xl-9 p-0">
        <div class="card mb-5">
          <div class="card-header bg-white">
            <h2 class="text-center my-2">Create Your Post</h2>
          </div>
          <div class="card-body px-2 px-sm-4">
            <form method="POST" enctype="multipart/form-data" id="form_post">
              <div class="mb-4">
                <label for="exampleInputTitle" class="form-label">Title :</label>
                <?php if (isset($_SESSION['id_user'])): ?>
                  <input type="hidden" name="id_user" value="<?=$_SESSION['id_user']?>">
                <?php endif;?>
                <input type="text" name="title" class="form-control" id="exampleInputTitle" required>
              </div>
              <div class="mb-4">
                <label for="exampleInputContent" class="form-label">Content :</label>
                <textarea name="content" id="exampleInputContent" cols="30" rows="12" class="form-control" required></textarea>
              </div>
              <label for="exampleInputFile" class="form-label">Upload Image :</label>
              <div class="input-group mb-2">
                <input type="file" name="image" class="form-control" id="exampleInputFile" onchange="readURL(this)">
                <label class="input-group-text d-none d-sm-block" for="exampleInputFile">Image</label>
              </div>
              <div class="row mb-4 mb-md-3">
                <div class="col-12 text-center d-flex justify-content-center">
                  <div id="imgControl" class="d-none">
                    <img id="imgUpload" class="img-fluid my-3 img-thumbnail shadow-sm">
                  </div>
                </div>
              </div>
              <div>
                <span class="float-end mt-2 mb-3">
                <a href="#!" onclick="goBack()" class="text-danger me-3">Cancel</a>
                <button type="submit" class="btn btn-success px-4">Create</button>
              </span>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid p-0 d-none d-lg-block">
    <?php include 'components/footer.php'; ?>
  </div>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Core theme JS-->
  <script src="create_post.js"></script>
  <!-- <script src="Js/ajax.js"></script> -->

</body>

</html>