<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Modificar cuenta</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Modificar cuenta</h1>
        <hr>
        <form action="../controladores/modificarcuenta.php" method="post">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <?php
                    include_once "../controladores/conexion.php";
                    $id_persona = $_POST['id_persona'];
                    $id_cuenta_bancaria = $_POST['id_cuenta_bancaria'];
                    $query = "select * from cuenta_bancaria where id_cuenta_bancaria='$id_cuenta_bancaria' and id_persona='$id_persona'";
                    $respuesta = mysqli_query($conexion,$query);
                    $registro = mysqli_fetch_array($respuesta);
                    echo "<label>id_cuenta_bancaria:</label>";
                    echo "<input type='text' name='id_cuenta_bancaria' class='form-control mb-3m' value=$registro[id_cuenta_bancaria] readonly>";
                    echo "<label>tipo_cuenta_bancaria:</label>";
                    echo "<input type='text' name='tipo_cuenta' class='form-control mb-3m' value=$registro[tipo_cuenta]>";
                    echo "<label>saldo:</label>";
                    echo "<input type='text' name='saldo' class='form-control mb-3m' value=$registro[saldo]>";
                    echo "<label>departamento:</label>";
                    echo "<input type='text' name='departamento' class='form-control mb-3m' value=$registro[departamento]>";
                    echo "<label>id_persona:</label>";
                    echo "<input type='text' name='id_persona' class='form-control mb-3m' value=$registro[id_persona]>";
                    echo "<a class='btn btn-danger m-1' role='button' href='eliminarcuenta.php?id_persona=$registro[id_persona]&id_cuenta_bancaria=$registro[id_cuenta_bancaria]'>Eliminar</a>";
                    echo "<input type='submit' class='btn btn-warning m-1' value='Modificar cuenta'>";
                    ?>
                </div>
            </div>
        </form>
    </div>
    <script src="../js/bootstrap.bundle.js"></script>
</body>
</html>