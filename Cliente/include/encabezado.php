<?php

session_start();

// Tiempo máximo de inactividad en segundos= 30; 

//verifica la sesion activa



            /*if (isset($_SESSION['activa'])) {
    // Si ha pasado más tiempo del permitido, cerrar sesión
    if (isset($_SESSION['mov']) && (time() - $_SESSION['mov']) > 180) {
        session_destroy();
        header('Location: ../index.php');
        exit;
    }
    // Actualizar el tiempo del último movimiento
    $_SESSION['mov'] = time();
} else {
    header('Location: ../index.php');
    exit;
}*/



?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid" style="text-align: center; padding-top:15px ;Background-color: rgb(255,198,0)">
        <div class="row">
            <div class="col-3">
                <img src="imagenes/LOGO.png" height="100" width="100" style="padding:3px ;">
            </div>

            <div class="col">
                <div class="btn-group" style="padding-top:38px;">


                    <!--FUNCION PARA DELIMITAR QUE OPCIONES APARECEN A CADA USUARIO-->
                    <?php
                    //se abre llave (amarilla) para mostrar solo lo que queremos que muestre a tal usuario
                    if ($_SESSION['rol'] == 1) {;
                    ?>

                        <a href="Inicio.php" class="btn btn-primary " style="background-color: rgb(54,16,28); border-color:rgb(54,16,28) ">Inicio</a>
                        <a href="Uusaurios.php" class="btn btn-primary " style="background-color: rgb(54,16,28) ;   border-color:rgb(54,16,28) ;">Usuarios</a>
                        <a href="productos.php" class="btn btn-primary" style="background-color: rgb(54,16,28) ;border-color:rgb(54,16,28) ">Productos</a>
                        <a href="categorias.php" class="btn btn-primary" style="background-color: rgb(54,16,28);  border-color:rgb(54,16,28) ">Categorias</a>
                        <a href="promociones.php" class="btn btn-primary" style="background-color: rgb(54,16,28);  border-color:rgb(54,16,28) ">Promociones</a>
                        <a href="reportes.php" class="btn btn-primary" style="background-color: rgb(54,16,28); border-color:rgb(54,16,28) ">Reportes</a>
                        <a href="salir.php" class="btn btn-primary" style="background-color: rgb(54,16,28); border-color:rgb(54,16,28) ">Salir</a>
                        

                    <?php
                    } ?>


                    <?php
                    //se abre llave (amarilla) para mostrar solo lo que queremos que muestre a tal usuario
                    if ($_SESSION['rol'] == 2) {;
                    ?>

                        <a href="Inicio.php" class="btn btn-primary " style="background-color: rgb(54,16,28); border-color:rgb(54,16,28) ">Inicio</a>
                        <a href="productos.php" class="btn btn-primary" style="background-color: rgb(54,16,28) ;border-color:rgb(54,16,28) ">Productos</a>
                        <a href="categorias.php" class="btn btn-primary" style="background-color: rgb(54,16,28);  border-color:rgb(54,16,28) ">Categorias</a>
                        <a href="promociones.php" class="btn btn-primary" style="background-color: rgb(54,16,28);  border-color:rgb(54,16,28) ">Promociones</a>
                        <a href="salir.php" class="btn btn-primary" style="background-color: rgb(54,16,28); border-color:rgb(54,16,28) ">Reportes</a>
                        <a href="salir.php" class="btn btn-primary" style="background-color: rgb(54,16,28); border-color:rgb(54,16,28) ">Salir</a>

                    <?php
                    } ?>


                    <?php
                    //se abre llave (amarilla) para mostrar solo lo que queremos que muestre a tal usuario
                    if ($_SESSION['rol'] == 3) {;
                    ?>
                        <a href="Uusaurios.php" class="btn btn-primary " style="background-color: rgb(54,16,28) ;   border-color:rgb(54,16,28) ;">Usuarios</a>
                        <a href="Inicio.php" class="btn btn-primary " style="background-color: rgb(54,16,28); border-color:rgb(54,16,28) ">Inicio</a>
                        <a href="productos.php" class="btn btn-primary" style="background-color: rgb(54,16,28) ;border-color:rgb(54,16,28) ">Productos</a>
                        <a href="categorias.php" class="btn btn-primary" style="background-color: rgb(54,16,28);  border-color:rgb(54,16,28) ">Categorias</a>
                        <a href="promociones.php" class="btn btn-primary" style="background-color: rgb(54,16,28);  border-color:rgb(54,16,28) ">Promociones</a>
                        <a href="salir.php" class="btn btn-primary" style="background-color: rgb(54,16,28); border-color:rgb(54,16,28) ">Salir</a>

                    <?php
                    } ?>




                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>