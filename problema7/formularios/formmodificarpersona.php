<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Modificar persona</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Modificar persona</h1>
        <hr>
        <form action="../controladores/modificarpersona.php" method="post">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <?php
                    include_once "../controladores/conexion.php";
                    $id_persona = $_GET['id_persona'];
                    $query = "select * from persona where id_persona='$id_persona'";
                    $respuesta = mysqli_query($conexion,$query);
                    $registro = mysqli_fetch_array($respuesta);
                    echo "<label>id_persona:</label>";
                    echo "<input type='text' name='id_persona' class='form-control mb-3m' value=$registro[id_persona] readonly>";
                    echo "<label>Nombre:</label>";
                    echo "<input type='text' name='nombre' class='form-control mb-3m' value=$registro[nombre]>";
                    echo "<label>Apellido:</label>";
                    echo "<input type='text' name='apellido' class='form-control mb-3m' value=$registro[apellido]>";
                    echo "<label>CI:</label>";
                    echo "<input type='text' name='ci' class='form-control mb-3m' value=$registro[ci]>";
                    echo "<input type='submit' class='btn btn-dark' value='Modificar Persona'>";
                    ?>
                </div>
            </div>
        </form>
    </div>
    <script src="../js/bootstrap.bundle.js"></script>
</body>
</html>