<!DOCTYPE html>
<html lang="en">
<?php 
session_start();

if (!isset($_SESSION['login']) && $_SESSION['login'] !== 'login') {
  header('location: login.php');
  session_destroy();
}
?>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Blog Home</title>
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
.blog a img {
  max-height: 450px;
  object-fit: cover;
  overflow: hidden;
}

.blog .card-body .card-text,
#top_post .card-body .card-text {
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  /* number of lines to show */
  -webkit-box-orient: vertical;
}
.blog .card-body .card-title,
#top_post .card-body .card-title {
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  /* number of lines to show */
  -webkit-box-orient: vertical;
}
.icon,
.icon>i {
  transition: all 0.2s ease-in-out;
}
.icon:hover,
.icon:active,
.icon:hover>i {
  color: red!important;
  font-weight: 700;
}

@media (max-width: 260px) {
	.blog .card-body .card-text {
  -webkit-line-clamp: 2;
}
.blog .card-body .card-title {
  -webkit-line-clamp: 1;
}
}
@media (max-width: 245px) {
	.icon {
    display: none!important;
  }
}
</style>

<body>
  <?php include 'components/navbar.php';?>
  <!-- Page header with logo and tagline-->
  <header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
      <div class="text-center my-2 my-sm-5">
        <h1 class="fw-bolder">Welcome to Start Blog</h1>
        <p class="lead mb-0">สวัสดีคุณ
          <?php if(isset($_SESSION['username'])) : ?>
          <?php echo $_SESSION['username']; ?>
          <?php endif ; ?>
          ยินดีต้องรับเข้าสู่ Web Blog ของผม</p>
        <p class="lead mb-0">รออะไรอยู่ล่ะ ไปเริ่มต้นเขียน Blog ของคุณกันเลย!! <a href="create_post.php">Click Create Post ^^</a></p>
      </div>
    </div>
  </header>
  <!-- Page content-->
  <div class="container">
    <div class="row justify-content-center">
      <!-- Blog entries-->
      <div class="col-lg-10 col-xl-9">
        <!-- Featured blog post-->
        <div class="card mb-4 mb-md-5 shadow-sm" id="top_post">
          <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..." /></a>
          <div class="card-body">
            <div class="small text-muted">January 1, 2021</div>
            <h2 class="card-title">Featured Post Title</h2>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque,
              nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus
              possimus, veniam magni quis!</p>
            <a class="btn btn-primary" href="#!">Read more →</a>
          </div>
        </div>
        <!-- Nested row for non-featured blog posts-->
        <div class="row" id="post_blog">

        </div>
        <!-- Pagination-->
        <nav aria-label="Pagination">
          <hr class="my-0" />
          <ul class="pagination justify-content-center my-4 my-md-5">
            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                < </a>
            </li>
            <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
            <li class="page-item"><a class="page-link" href="#!">2</a></li>
            <li class="page-item"><a class="page-link" href="#!">3</a></li>
            <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
            <li class="page-item"><a class="page-link" href="#!">15</a></li>
            <li class="page-item"><a class="page-link" href="#!">></a></li>
          </ul>
        </nav>
      </div>
      <!-- Side widgets-->
      <!-- <div class="col-lg-4">
				Search widget
				<div class="card mb-4">
					<div class="card-header">Search</div>
					<div class="card-body">
						<div class="input-group">
							<input class="form-control" type="text" placeholder="Enter search term..."
								aria-label="Enter search term..." aria-describedby="button-search" />
							<button class="btn btn-primary" id="button-search" type="button">Go!</button>
						</div>
					</div>
				</div>
				Categories widget
				<div class="card mb-4">
					<div class="card-header">Categories</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								<ul class="list-unstyled mb-0">
									<li><a href="#!">Web Design</a></li>
									<li><a href="#!">HTML</a></li>
									<li><a href="#!">Freebies</a></li>
								</ul>
							</div>
							<div class="col-sm-6">
								<ul class="list-unstyled mb-0">
									<li><a href="#!">JavaScript</a></li>
									<li><a href="#!">CSS</a></li>
									<li><a href="#!">Tutorials</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				Side widget
				<div class="card mb-4">
					<div class="card-header">Side Widget</div>
					<div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and
						feature the Bootstrap 5 card component!</div>
				</div>
			</div> -->
    </div>
  </div>
  <?php include 'components/footer.php';?>

  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Core theme JS-->
  <script src="index.js"></script>
  <!-- <script src="Js/ajax.js"></script> -->

</body>

</html>