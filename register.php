<!DOCTYPE html>
<html lang="en">
<?php session_start();?>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Register</title>
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
</head>

<body style="height: 100vh;width: 100%;">

  <div class="container h-100">
    <div class="row justify-content-center h-100 align-items-center ">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5 mb-5 p-0">
        <div class="card">
          <div class="card-header bg-white">
          <h2 class="text-center my-3">Register</h2>
          </div>
          <div class="card-body px-2 px-sm-4">
            <?php if(isset($_SESSION['message'])) : ?>
              <div class="alert alert-danger py-0">
              <?php echo $_SESSION['message']; ?>
              </div>
            <?php endif ;?>
            <form action="api/reg.php" method="POST" enctype="multipart/form-data">
              <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label">UserName :</label>
                <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label">Email :</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
              </div>
              <div class="mb-4">
                <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
                <input type="password" name="password2" class="form-control" id="exampleInputPassword2">
              </div>
              <button type="submit" class="btn btn-primary col-12">Register</button>
              <div class="text-center mt-3 mb-2">
                <p class="m-0">Have already an account ?  <a href="login.php" class="text-dark ms-1">Login here!</a></p>
                <!-- <p class="my-1 text-danger">ถ้ายังไม่สมัครใช้งาน กรุณากด Register เพื่อสมัครใช้งานก่อน</p> -->
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php unset($_SESSION['message']);?>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Core theme JS-->
  <!-- <script src="Js/index.js"></script> -->
  <!-- <script src="Js/ajax.js"></script> -->

</body>

</html>