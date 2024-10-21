<?php
include "include/encabezado.php";
include "../Servidor/conexion.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre']) || empty($_POST['apat']) || empty($_POST['amat']) || empty($_POST['correo']) || empty($_POST['contra']) || empty($_POST['tel']) || empty($_POST['rol'])) {
        $alert = '<p class"error">Todo los campos son requeridos</p>';
    } else {
        $idusuario = $_GET['id'];

        $nombre = $_POST['nombre'];
        $apat = $_POST['apat'];
        $amat = $_POST['amat'];
        $correo = $_POST['correo'];
        $contra = $_POST['contra'];
        $tel = $_POST['tel'];
        $rol = $_POST['rol'];


        $sql_update = mysqli_query($conexion, "UPDATE usuarios SET  nomusu = '$nombre',   apausu = '$apat',amausu = '$amat',correo = '$correo',   contra = '$contra',   telefono = '$tel',  idtipo = $rol  WHERE idusu = $idusuario");

        $alert = '<p>Usuario Actualizado</p>';
        header("Location:Uusaurios.php");
    }
}

// Mostrar Datos

if (empty($_REQUEST['id'])) {
    header("Location:Uusaurios.php");
}
$idusuario = $_REQUEST['id'];
$sql = mysqli_query($conexion, "SELECT * FROM usuarios WHERE idusu= $idusuario");
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
    header("Location:Uusaurios.php");
} else {
    if ($data = mysqli_fetch_array($sql)) {
        $idcliente = $data['idusu'];
        $nombre = $data['nomusu'];
        $apate = $data['apausu'];
        $amate = $data['amausu'];
        $correo = $data['correo'];
        $contra = $data['contra'];
        $telefono = $data['telefono'];
        $rol = $data['idtipo'];
    }
}
?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-6 m-auto">
            <form class="" action="" method="post">


                <?php echo isset($alert) ? $alert : ''; ?>
                <input type="hidden" name="id" value="<?php echo $idusuario; ?>">

                <div class="form-group">
                    <label for="nombre">Nombre: </label>
                    <input type="text" placeholder="Ingrese nombre" class="form-control" name="nombre" id="nombre"
                        value="<?php echo $nombre; ?>" readonly style="background-color: #f0f0f0;">

                </div>
                <div class="form-group">
                    <label for="nombre">Apellido Paterno: </label>
                    <input type="text" placeholder="Ingrese nombre" class="form-control" name="apat" id="apat"
                        value="<?php echo $apate; ?>" readonly style="background-color: #f0f0f0;">

                </div>
                <div class="form-group">
                    <label for="nombre">Apellido Materno: </label>
                    <input type="text" placeholder="Ingrese nombre" class="form-control" name="amat" id="amat"
                        value="<?php echo $amate; ?>" readonly style="background-color: #f0f0f0;">

                </div>
                <div class="form-group">
                    <label for="correo">Correo: </label>
                    <input type="text" placeholder="Ingrese correo" class="form-control" name="correo" id="correo"
                        value="<?php echo $correo; ?>">

                </div>
                <div class="form-group">
                    <label for="usuario">Contraseña:</label>
                    <input type="text" placeholder="Ingrese usuario" class="form-control" name="contra" id="contra"
                        value="<?php echo $contra; ?>">

                </div>

                <div class="form-group">
                    <label for="nombre">Telefono: </label>
                    <input type="text" placeholder="Ingrese nombre" class="form-control" name="tel" id="tel"
                        value="<?php echo $telefono; ?>">

                </div>


                <div class="form-group">
                    <label for="rol">Rol</label>
                    <select name="rol" id="rol" class="form-control">
                        <option value="1" <?php
                                            if ($rol == 1) { echo "selected";}
                                            ?>>Administrador</option>
                        <option value="2" <?php
                                            if ($rol == 2) {echo "selected";}
                                            ?>>Gerente</option>
                        <option value="3" <?php
                                            if ($rol == 3) {echo "selected";}     
                                            ?>>Empleado</option>
                        <option value="4" <?php
                                            if ($rol == 4) { echo "selected";}
                                            ?>>Cliente</option>
                    </select>
                </div>
                <a href="Uusaurios.php" class="btn btn-primary"><i class="fas fa-user-edit"></i> Cancelar</a>

                <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Editar Usuario</button>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<footer>
    <!--PIE-->
    <?php include_once("include/footer.php"); ?>
    <!--PIE-->

</footer>