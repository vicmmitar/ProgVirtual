<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Director Bancario</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Bienvenido Director Bancario</h1>
        <hr>
        <?php
        if(isset($_GET["msg"])){
            $msg = $_GET["msg"];
            echo "<h4 class=alert alert-warning>$msg</h4>";
        }
        ?>
    </div>
    <div class="container-lg">
        <div class="table-responsive">
            <table class="table table-sm table-hover">
                <thead>
                    <th class="text-center" scope="col">Nro de Cuenta bancaria</th>
                    <th class="text-center" scope="col">Tipo de Cuenta bancaria</th>
                    <th class="text-center" scope="col">Saldo</th>
                    <th class="text-center" scope="col">Departamento</th>
                    <th class="text-center" scope="col">Acciones cuenta bancaria</th>
                </thead>
                <tbody>
                    <?php
                        $id_persona = '2';
                        include "../controladores/conexion.php";
                        $query = "select * from cuenta_bancaria where id_persona='$id_persona'";
                        $respuesta = mysqli_query($conexion,$query);
                        while($registro = mysqli_fetch_array($respuesta)){
                            echo "<tr>";
                            echo"<th class='text-center' scope='row'>$registro[id_cuenta_bancaria]</th>";
                            echo"<td class='text-center'>$registro[tipo_cuenta]</td>";
                            echo "<td class='text-center'>$registro[saldo]</td>";
                            echo "<td class='text-center'>$registro[departamento]</td>";
                            echo "<td class='text-center'>";
                                echo "<form id='modificar_cuenta_bancaria_$registro[id_persona]' action='../formularios/formmodificarcuenta.php' method='post'>
                                        <input type='hidden' value='$id_persona' name='id_persona'/>
                                        <input type='hidden' value='$registro[id_cuenta_bancaria]' name='id_cuenta_bancaria'/>
                                    </form>
                                ";
                            echo "  <a class='btn btn-danger m-1' data-bs-toggle='modal' data-bs-target='#exampleModal'>Eliminar todo</a>

                                    <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h1 class='modal-title fs-5' id='exampleModalLabel'>Modal title</h1>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>
                                            <p>Esto eliminara todas tus cuentas y sus transacciones ¿Esta seguro?</p>
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                                            <a class='btn btn-dark' href='../controladores/eliminarpersona.php?id_cuenta_bancaria=$registro[id_cuenta_bancaria]'>Eliminar</a>
                                        </div>
                                        </div>
                                        
                                    </div>
                                    </div>
                                    <a class='btn btn-success m-1' href='../formularios/formañadircuenta.php?id_persona=$registro[id_persona]'>Añadir</a>
                                        <input class='btn btn-warning m-1' type='submit' form='modificar_cuenta_bancaria_$registro[id_persona]' value='Modificar' />
                                </td>";
                            
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="../js/bootstrap.bundle.js"></script>
</body>
</html>