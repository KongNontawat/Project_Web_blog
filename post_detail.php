<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Blog Post</title>
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
<style>
.fw-bolder {
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
}

h4.fw-bold {
  text-indent: 45px;
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 5;
  -webkit-box-orient: vertical;
}
p.fs-5 {
  text-indent: 40px;
}

figure img {
  max-height: 600px;
  object-fit: cover;
  overflow: hidden;
}
@media (max-width: 768px) {
  figure img {
  max-height: 500px;
  object-fit: cover;
  overflow: hidden;
}
}
</style>
<body>
  <!-- Responsive navbar-->
  <?php include 'components/navbar.php';?>

  <!-- Page content-->
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-lg-10 col-xl-9" id="post_detail">
        <!-- Post content-->
        <article>
          <header class="mb-4">
            <h1 class="fw-bolder mb-1">Welcome to Blog Post!</h1>
            <div class="text-muted fst-italic mb-2">Posted on January 1, 2021 by Start Bootstrap</div>
          </header>
          <figure class="mb-4"><img class="img-fluid rounded" width="100%" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg"
              alt="..." /></figure>
          <section class="mb-5">
            <p class="fs-5 mb-4"></p>
          </section>
        </article>
        <!-- Comments section-->

        <section class="my-5">
          <p class="text-center text-muted py-0 py-md-5">
            ระบบคอมเมนต์จะมาในเร็วๆนี้.....
          </p>
        </section>
      </div>
    </div>
  </div>
  <!-- Footer-->
  <?php include 'components/footer.php';?>

  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Core theme JS-->
  <script src="post_detail.js"></script>
  <!-- <script src="Js/ajax.js"></script> -->
  <script>
    
  </script>
</body>

</html>