
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>INICIO</title>
</head>

<header>
    <!--ENCABEZADO-->
    <?php include_once("include/encabezado.php"); ?>
    <!--ENCABEZADO-->
    <div class="container">

<p style= text-align:right>
    <?php 
    echo  $_SESSION['nombre']; echo " ";
    echo $_SESSION['paterno'];echo " "; 
    echo$_SESSION['materno'];  echo " " ;
    echo $_SESSION['rol'];
    ?>
</p>

</div>
</header>


<body>

   
    <h1>Bienvenido Gamer!!!</h1>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<div class="container" >
<!--     CARRUSEL DE PAGINA    -->

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="imagenes/p1.png" class="d-block w-5 0" height="450px">
    </div>
    <div class="carousel-item">
      <img src="imagenes/p2.png" class="d-block w-50"  height="450px">
    </div>
    <div class="carousel-item">
      <img src="imagenes/p3.png" class="d-block w-50"  height="450px">
    </div>
    <div class="carousel-item">
      <img src="imagenes/p4.png" class="d-block w-50"  height="450px">
    </div>
    <div class="carousel-item">
      <img src="imagenes/p5.png" class="d-block w-50"  height="450px">
    </div>
    
    <div class="carousel-item">
      <img src="imagenes/p6.png" class="d-block w-50"  height="450px">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>


</div>



</div>



<!--PIE-->
<?php include_once("include/footer.php"); ?>
<!--PIE-->

    

</body>




</html>