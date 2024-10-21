<?php
$alert = "";
session_start();
if (!empty($_SESSION['activa'])) {
    header('location: Cliente/inicio.php'); 
    exit;
} else {
    if (!empty($_POST)) {
        // Valida que correo y contraseña no estén vacíos
        if (empty($_POST['correo']) || empty($_POST['contra'])) {
            $alert = '<div class="alert alert-warning d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div>
                            Correo y/o contraseña son obligatorios.
                        </div>
                    </div>';
        } else { // Cuando se ingresan datos
            require_once('Servidor/conexion.php');
            $usuario = mysqli_real_escape_string($conexion, $_POST['correo']);
            $pass = mysqli_real_escape_string($conexion, $_POST['contra']);
            $query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$usuario' AND contra='$pass'");
            $resultado = mysqli_num_rows($query);

            if ($resultado > 0) {
                $dato = mysqli_fetch_array($query);
                // Creamos variables de tipo sesión para tener los datos disponibles
                $_SESSION['activa'] = true;
                $_SESSION['nombre'] = $dato['nomusu'];
                $_SESSION['paterno'] = $dato['apausu'];
                $_SESSION['materno'] = $dato['amausu'];
                $_SESSION['rol'] = $dato['idtipo'];
                mysqli_close($conexion);
                header('location: Cliente/inicio.php');
                exit;
            } else {
                $alert = '<div class="alert alert-danger d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                            <div>
                                Usuario y/o contraseña incorrecta.
                            </div>
                          </div>';
                session_destroy();
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
    <title>Autenticación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .auth-container {
            background-color: #e5ddca;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 900px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .auth-logo img {
            padding-top: 20px;
            width: 100%;
            height: auto;
            border-radius: 15px;
        }
        .auth-form {
            padding: 45px;
            width: 100%;
        }
        .auth-form h1 {
            color: rgb(54,16,28);
            text-align: center;
            padding-top: 20px;
        }
        .auth-form .btn-primary {
            background-color: rgb(54,16,28);
            width: 100%;
            margin-top: 15px;
        }
    </style>
</head>

<body>

    <div class="auth-container">
        <div class="row">
            <div class="col auth-logo">
                <img src="Cliente/Imagenes/LOGO.png" alt="Logo">
            </div>
            <div class="col">
                <div class="auth-form">
                    <h1>AUTENTICACIÓN</h1>

                    <form method="POST">
                        <div>
                            <?php echo isset($alert) ? $alert : ""; ?>
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="correo" name="correo" aria-describedby="emailHelp" placeholder="Correo electrónico">
                            <div id="emailHelp" class="form-text">No compartiremos tu correo con nadie.</div>
                        </div>
                        <div class="mb-3">
                            <label for="contra" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="contra" name="contra" placeholder="Contraseña">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Mantener sesión activa</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
