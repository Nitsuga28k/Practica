<?php

include_once("../Servidor/conexion.php");
if (!empty($_POST)) {
  // Para validar que los campos no estén vacíos
  if (empty($_POST['cam1']) || empty($_POST['cam2']) || empty($_POST['cam3']) || empty($_POST['cam4']) || empty($_POST['cam5']) || empty($_POST['cam6']) || empty($_POST['cam7'])) {
    // Alerta para decir que los valores son obligatorios
    $alert = '<div class="alert alert-primary" role="alert"> 
    Todos los datos son obligatorios
     </div>';
  } else {

    $c1 = $_POST['cam1'];
    $c2 = $_POST['cam2'];
    $c3 = $_POST['cam3'];
    // Aplicar md5 para encriptar (si es necesario)
    //$c4 = md5( $_POST['cam4']);
    $c4 =  $_POST['cam4'];
    $c5 = $_POST['cam5'];
    $c6 = $_POST['cam6'];
    $c7 = $_POST['cam7'];

    $_query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$c4'");
    $result = mysqli_fetch_array($_query);
    if ($result > 0) {
      $alert = '<div class="alert alert-danger" role="alert">
    El correo y/o usuario ya existe !!
    </div>';
    } else {
      $consulta = mysqli_query($conexion, "INSERT INTO usuarios(nomusu, apausu, amausu, correo, contra, telefono, idtipo)
                                                       VALUES('$c1', '$c2', '$c3', '$c4', '$c5', $c6, $c7)");

      if ($consulta) {
        $alert = '<div class="alert alert-success" role="alert">
                  Datos guardados correctamente </div>';
      } else {
        $alert = '<div class="alert alert-danger" role="alert">
                  Error al guardar los datos </div>';
      }
    }
  }
}
?>

<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.5.1/uicons-regular-rounded/css/uicons-regular-rounded.css'>
  <title>USUARIOS</title>
</head>

<body>

  <header>
    <!-- ENCABEZADO -->
    <?php include_once("include/encabezado.php"); ?>
    <!-- ENCABEZADO -->
  </header>

  <div class="container" style="text-align: center;">
    <h2>ADMINISTRACIÓN DE USUARIOS</h2>

    <!-- BOTÓN PARA USUARIOS QUE PUEDEN AGREGAR MÁS USUARIOS -->
    <?php if ($_SESSION['rol'] == 1) {; ?>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">CREAR NUEVO USUARIO</button>
    <?php } ?>
  </div>

  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido Materno</th>
          <th scope="col">Apellido Paterno</th>

          <!-- SOLO SE MUESTRA A CIERTOS USUARIOS -->
          <?php if ($_SESSION['rol'] == 1) {; ?>
            <th scope="col">Correo electrónico</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Tipo Usuario</th>
            <th scope="col">Acciones</th>
          <?php  } ?>
        </tr>
      </thead>

      <tbody>
        <?php
        include_once("../Servidor/conexion.php");
        $con = mysqli_query(
          $conexion,
          // Se llama a traer todos los valores con los que se va a trabajar
          "SELECT u.idusu, u.nomusu, u.apausu, u.amausu, u.correo, u.telefono, t.tipousu FROM usuarios u INNER JOIN tipousuario t ON u.idtipo = t.idtipo;"
        );
        $res = mysqli_num_rows($con);
        while ($datos = mysqli_fetch_assoc($con)) {   ?>
          <tr>
            <!-- LAS COLUMNAS SE REEMPLAZAN POR LOS VALORES DE LA BD -->
            <td><?php echo $datos['nomusu']; ?></td>
            <td><?php echo $datos['apausu']; ?></td>
            <td><?php echo $datos['amausu']; ?></td>
            <?php
            // Se abre llave para mostrar solo lo que se quiere mostrar a ciertos usuarios
            if ($_SESSION['rol'] == 1) {; ?>
              <td><?php echo $datos['correo']; ?></td>
              <td><?php echo $datos['telefono']; ?></td>
              <td><?php echo $datos['tipousu']; ?></td>

              <!-- BOTÓN DE EDITAR -->
              <td><a href="editar_usuario.php?id=<?php echo $datos['idusu'] ?>">
                  <button type="button" class="btn btn-secondary"><i class="fi fi-rr-blog-pencil"></i></button>
                </a>
                <!-- BOTÓN DE BORRAR -->
                <a href="../Servidor/borrar_usuario.php?id=<?php echo $datos['idusu'] ?>">
                  <button type="button" class="btn btn-danger"><i class="fi fi-rr-trash-xmark"></i></button>
                </a>
              </td>
            <?php } ?>
          </tr>
        <?php  } ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Modal para agregar usuario -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registro de usuarios</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <form style="padding: 5px; text-align:left;" method="POST">
            <div>
              <?php echo isset($alert) ? $alert : ""; ?>
            </div>
            <div class="form-group">
              <label for="correo" class="form-label">Nombres</label>
              <input type="text" class="form-control" id="cam1" name="cam1" required>
            </div>
            <div class="form-group">
              <label for="contra" class="form-label">Apellido paterno</label>
              <input type="text" class="form-control" id="cam2" name="cam2" required>
            </div>
            <div class="form-group">
              <label for="contra" class="form-label">Apellido materno</label>
              <input type="text" class="form-control" id="cam3" name="cam3" required>
            </div>
            <div class="form-group">
              <label for="contra" class="form-label">Correo electrónico</label>
              <input type="email" class="form-control" id="cam4" name="cam4" required>
            </div>

            <div class="form-group">
              <label for="contra" class="form-label">Contraseña</label>
              <input type="text" class="form-control" id="cam5" name="cam5" required>
            </div>

            <div class="form-group">
              <label for="contra" class="form-label">Teléfono</label>
              <input type="text" class="form-control" id="cam6" name="cam6" required>
            </div>
            <div>
              <label for="contra" class="form-label">Seleccione su tipo de usuario</label>
              <select class="form-select" aria-label="Tipo de usuario" id="cam7" name="cam7" required>
                <option selected>Tipo de usuario</option>
                <?php
                $cone = mysqli_query($conexion, "SELECT * FROM tipousuario;");
                while ($dat = mysqli_fetch_assoc($cone)) { ?>
                  <option value="<?php echo $dat['idtipo']; ?>"><?php echo $dat['tipousu']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
