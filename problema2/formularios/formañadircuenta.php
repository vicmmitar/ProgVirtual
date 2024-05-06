<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Añadir cuenta bancaria</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Registro de cuenta bancaria</h1>
        <hr>
        <form action="../controladores/añadircuenta.php" method="post">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <label>Tipo cuenta:</label>
                    <select class="form-select" name="tipo_cuenta">
                        <option selected>Seleccionar tipoo de cuenta</option>
                        <option value="corriente">Cuenta corriente</option>
                        <option value="ahorros">Caja de ahorros</option>
                        <option value="plazo fijo">Plazo fijo</option>
                    </select>
                    <label>Saldo:</label>
                    <input type="number" name="saldo" class="form-control mb-3">
                    <label>Departamento:</label>

                    <select class='form-select' name='departamento'>
                        <option value=1>Beni</option>
                        <option value=2>Chuquisaca</option>
                        <option value=3>Cochabamba</option>
                        <option value=4>La Paz</option>
                        <option value=5>Oruro</option>
                        <option value=6>Pando</option>
                        <option value=7>Potosi</option>
                        <option value=8>Santa Cruz</option>
                        <option value=9>Tarija</option>

                    </select>
                    <?php
                    include_once "../controladores/conexion.php";
                    $id_persona = $_GET['id_persona'];
                    echo "<input type='text' name='id_persona' class='form-control mb-3' value='$id_persona' hidden>";
                    ?>
                    <input type="submit" class="btn btn-dark" value="Agregar cuenta">
                </div>
            </div>
        </form>
    </div>
    <script src="../js/bootstrap.bundle.js"></script>
</body>
</html>