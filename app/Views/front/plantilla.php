<?php
$tituloVar = "titulo";
$$tituloVar = "bienvenidos a mi pagina web";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $$tituloVar; ?></title>
    <link rel = "stylesheet" href = "assets/css/bootstrap.min.css">
    <link rel = "stylesheet" href = "assets/css/miestilo.css">
    <link rel = "stylesheet" href = "assets/js/bootstrap.bundle.min.js">

</head>
<body>
    <h1><?php echo $$tituloVar; ?></h1>
    <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/assets/img/donas.jpg" class="d-block w-100" alt="alta dona">
    </div>
    <div class="carousel-item">
      <img src="/assets/img/dubai.webp" class="d-block w-100" alt="re de cheto">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</body>
</html>
