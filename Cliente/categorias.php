    <?php

    include_once("../Servidor/conexion.php");
    if (!empty($_POST)) {
        //para validar que los campos no esten vacios
        if (empty($_POST['camp1'])) {
            //alerta para decir que los valores 
            $alert = '<div class="alert alert-primary" role="alert"> 
        Todos los datos son obligatorios
        </div>';
        } else {

            
            $c1 = $_POST['camp1'];
            

        
                $consulta = mysqli_query($conexion, "INSERT INTO categorias (categoria)
                                                        values('$c1')");

                if ($consulta) {
                    
                    $alert = '<div class="alert alert" role="alert">
                    Datos guardados correctamente </div>';
                    
                        // **Redirección después de la inserción para evitar reenvíos múltiples**
                        header("Location: categorias.php");
                        exit(); // Se asegura que el script no continúe después de la redirección
                    
                } else {
                    $alert = '<div class="alert alert-danger" role="alert">
                    Datos guardados incorrectamente </div>';
                }
            }
        }


    ?>


    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.5.1/uicons-regular-rounded/css/uicons-regular-rounded.css'>
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.5.1/uicons-regular-rounded/css/uicons-regular-rounded.css'>

        <title>CATEGORIAS</title>
    </head>



    <body>
        <header>
            <!--ENCABEZADO-->
            <?php include_once("include/encabezado.php"); ?>
            <!--ENCABEZADO-->
        </header>







        <div class="container" style="text-align: center;">
            <h1>CATEGORIAS</h1>
            <?php if ($_SESSION['rol'] == 1) {;   ?>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">AGREGAR NUEVA CATEGORIA</button>
            <?php    } ?>
        </div>


        <div class="container">
            <table class="table" >
                <thead style="text-align: center;">
                    <tr >
                        <th scope="col">Categoria</th>
                

                        <!--SOLO SE MUESTRA A CIERTOS USUARIOS-->
                        <?php if ($_SESSION['rol'] == 1) {; ?>

                            <th scope="col">Acciones</th>
                        <?php }  ?> <!--SOLO SE MUESTRA A CIERTOS USUARIOS-->
                    </tr>

                </thead>

                <tbody style="text-align: center;">

                    <?php include_once("../Servidor/conexion.php");
                    $con = mysqli_query(
                        $conexion,
                        //se llama a traer a todos los valores con los que se va a trabajar
                        "SELECT * FROM categorias ;"
                    );
                    $res = mysqli_num_rows($con);
                    while ($datos = mysqli_fetch_assoc($con)) {   ?>


                        <tr>
                            <!-- LAS COLUMNAS SERAN REEMPLAZADAS POR LOS VALORES DE LA BD--->
                            <td><?php echo $datos['categoria'];          ?></td>



                            <?php
                            //se abre llave (amarilla) para mostrar solo lo que queremos que muestre a tal usuario
                            if ($_SESSION['rol'] == 1) {;     ?>
                                <!--BOTON DE EDITAR-->
                                <td><a href="editar_categorias.php? id= <?php echo $datos['idcate'] ?>">
                                        <button type="button" class="btn btn-secondary"><i class="fi fi-rr-blog-pencil"></i>
                                        </button>
                                    </a>
                                    <!--BOTON DE BORRAR-->
                                    <a href="../Servidor/borrar_categoria.php? id=  <?php echo $datos['idcate'] ?>">
                                        <button type="button" class="btn btn-danger"><i class="fi fi-rr-trash-xmark"></i>
                                        </button>
                                    </a>
                                </td>

                                <!--SE CIERRA LA LLAVE PARA MOSTRAR A CIERTOS USUARIOS -->
                            <?php   } ?>

                        </tr>

                    <?php  } ?>

                </tbody>
            </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>






        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registro de Categorias</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form method="POST">
                            <div><?php echo isset($alert) ? $alert : ""; ?></div>
                            <div class="form-group">
                            <label for="contra" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="camp1">
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- Termina modal -->





        <footer>
            <!--PIE-->
            <?php include_once("include/footer.php"); ?>
            <!--PIE-->
        </footer>

    </body>




    </html>