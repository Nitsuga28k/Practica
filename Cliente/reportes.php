
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
<header>
        <!--encabezado-->
        <?php include_once("include/encabezado.php") ?>
        <!--fin encabezado-->
    </header>
    <div class="container" style="text-align: center;">
        <h2>REPORTES DE USUARIOS</h2>
        <div class="row">
            <div class="col">
                <a href="R_usu_pdf.php">
                    <img src="imagenes/pdflogo.png" width="150px" height="150px">
                </a>
            </div>
            <div class="col">
                <a href="R_usu_excel.php">
                    <img src="imagenes/excel.png" width="150px" height="150px">
                </a>
            </div>
            <div class="col">
                <a href="R_usu_gra.php">
                    <img src="imagenes/grafica.png" width=" 150px" height="150px">
                </a>
            </div>
        </div>


    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>



<!--PIE-->
<?php include_once("include/footer.php"); ?>
<!--PIE-->

    

</body>




</html> 