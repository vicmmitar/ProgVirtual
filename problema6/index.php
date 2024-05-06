<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>Iniciar sesion</title>
</head>
<body>
    <div class="container">
    <div class="row align-items-center">
            <div class="col-md-4 offset-md-4">
            <h1 class="text-center">Iniciar Sesion</h1>
            <?php
        if(isset($_GET["msg"])){
            $msg = $_GET["msg"];
            echo "<h4 class=alert alert-warning>$msg</h4>";
        }
        ?>
                <form action="../controladores/iniciarsesion.php" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Usuario</label>
                    <input type="text" class="form-control" name="usuario" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">uDirector - uCliente</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="contraseña">
                    <div id="contraseñalHelp" class="form-text">1 al 4</div>
                </div>
                <button type="submit" class="btn btn-primary">Ingresar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="./js/bootstrap.bundle.js"></script>
</body>
</html>