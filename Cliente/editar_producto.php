<?php
include "include/encabezado.php";
include "../Servidor/conexion.php";



if (!empty($_POST)) {
    if (empty($_POST['nombre']) || empty($_POST['descripcion']) || empty($_POST['cantidad']) || empty($_POST['precio']) || empty($_POST['color']) || empty($_POST['tamanio']) || empty($_POST['foto']) || empty($_POST['idcate'])) {
        $alert = '<p class="error">Todos los campos son requeridos</p>'; 
    } else {
        $idproduct = $_GET['id'];

        $nombrep = $_POST['nombre'];
        $descripcionp = $_POST['descripcion'];
        $cant = $_POST['cantidad'];
        $preciop = $_POST['precio'];
        $colorp = $_POST['color'];
        $tamanp = $_POST['tamanio'];
        $fotop = $_POST['foto'];
        $idcatep = $_POST['idcate'];

        // Ejecutar la consulta de actualización
        $sql_update = mysqli_query($conexion, "UPDATE productos SET  nombre = '$nombrep', descripcion = '$descripcionp', cantidad = '$cant', precio = '$preciop', color = '$colorp', tamanio = '$tamanp', foto = '$fotop', idcate = '$idcatep' WHERE idprod = $idproduct");

        $alert = '<p>Usuario Actualizado</p>';
        header("Location: productos.php");
        exit();
    }
}

// Mostrar Datos

if (empty($_REQUEST['id'])) {
    header("Location: productos.php");
    exit();
}
$idproduct = $_REQUEST['id'];
$sql = mysqli_query($conexion, "SELECT * FROM productos WHERE idprod = $idproduct");
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
    header("Location: productos.php");
    exit();
} else {
    if ($data = mysqli_fetch_array($sql)) {
        $idprod = $data['idprod'];
        $nombrepd = $data['nombre'];
        $descripd = $data['descripcion'];
        $cantpd = $data['cantidad'];
        $preciopd = $data['precio'];
        $colorpd = $data['color'];
        $tamanpd = $data['tamanio'];
        $fotopd = $data['foto'];
        $categoria = $data['idcate'];
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-6 m-auto">
            <form class="" action="" method="POST">

                <?php echo isset($alert) ? $alert : ''; ?>
                
                <input type="hidden" name="id" value="<?php echo $idproduct; ?>">

                <div class="form-group">
                    <label for="nombre">Nombre de producto: </label>
                    <input type="text" placeholder="Ingrese nombre" class="form-control" name="nombre" id="nombre"
                        value="<?php echo $nombrepd; ?>">
                </div>
                <div class="form-group">
                    <label for="nombre">Descripcion del producto: </label>
                    <input type="text" placeholder="Ingrese descripcion" class="form-control" name="descripcion" id="descripcion"
                        value="<?php echo $descripd; ?>">
                </div>
                <div class="form-group">
                    <label for="cantidad">Cantidad: </label>
                    <input type="number" placeholder="Ingrese cantidad" class="form-control" name="cantidad" id="cantidad"
                        value="<?php echo $cantpd; ?>">
                </div>
                <div class="form-group">
                    <label for="precio">Precio: </label>
                    <input type="number" placeholder="Ingrese precio" class="form-control" name="precio" id="precio"
                        value="<?php echo $preciopd; ?>">
                </div>
                <div class="form-group">
                    <label for="color">Color:</label>
                    <input type="text" placeholder="Ingrese color" class="form-control" name="color" id="color"
                        value="<?php echo $colorpd; ?>">
                </div>
                <div class="form-group">
                    <label for="tamanio">Tamaño: </label>
                    <input type="text" placeholder="Ingrese tamaño" class="form-control" name="tamanio" id="tamanio"
                        value="<?php echo $tamanpd; ?>">
                </div>
                <div class="form-group">
                    <label for="foto" class="form-label">Fotografia</label>
                    <input type="text" placeholder="Ingrese fotografía" class="form-control" name="foto" id="foto"
                        value="<?php echo $fotopd; ?>">
                </div>
                <div class="form-group">
                    <label for="rol">Rol</label>
                    <select name="idcate" id="idcate" class="form-control">
                        <option value="1" <?php if ($categoria == 1) echo "selected"; ?>>Bebidas</option>
                        <option value="2" <?php if ($categoria == 2) echo "selected"; ?>>Ejemplo</option>
                        <option value="3" <?php if ($categoria == 3) echo "selected"; ?>>Empleado</option>
                        <option value="4" <?php if ($categoria == 4) echo "selected"; ?>>Cliente</option>
                    </select>
                </div>
                <a href="productos.php" class="btn btn-primary"><i class="fas fa-user-edit"></i> Cancelar</a>
                <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Editar Usuario</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<footer>
    <!--PIE-->
    <?php include_once("include/footer.php"); ?>
    <!--PIE-->
</footer>
