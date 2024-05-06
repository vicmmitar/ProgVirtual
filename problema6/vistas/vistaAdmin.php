<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Administrador</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Gestión de Personas</h1>
        <hr>
        <a href="../formularios/formpersonas.html" class="btn btn-info">Agregar personas</a>
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
                    <th class="text-center" scope="col">Id Persona</th>
                    <th class="text-center" scope="col">Nombre</th>
                    <th class="text-center" scope="col">Apellido</th>
                    <th class="text-center" scope="col">CI</th>
                    <th class="text-center" scope="col">Acciones</th>
                    <th class="text-center" scope="col">Cuenta bancaria</th>
                    <th class="text-center" scope="col">Acciones cuenta bancaria</th>
                </thead>
                <tbody>
                    <?php
                        include "../controladores/conexion.php";;
                        $query = "select * from persona";
                        $respuesta = mysqli_query($conexion,$query);
                        while($registro = mysqli_fetch_array($respuesta)){
                            $query = "select * from cuenta_bancaria c where c.id_persona=$registro[id_persona]";
                            $respuesta1 = mysqli_query($conexion,$query);
                            echo "<tr>";
                            echo"<th class='text-center' scope='row'>$registro[id_persona]</th>";
                            echo"<td>$registro[nombre]</td>";
                            echo "<td>$registro[apellido]</td>";
                            echo "<td>$registro[ci]</td>";
                            echo "<td>
                                    <a class='btn btn-warning m-1' href='../formularios/formmodificarpersona.php?id_persona=$registro[id_persona]'>Modificar</a>
                                    <a class='btn btn-danger m-1' data-bs-toggle='modal' data-bs-target='#exampleModal'>Eliminar todo</a>

                                    <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h1 class='modal-title fs-5' id='exampleModalLabel'>Modal title</h1>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>
                                            <p>Esto eliminara todos los datos del usuario. ¿Esta seguro?</p>
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                                            <a class='btn btn-dark' href='../controladores/eliminarpersona.php?id_persona=$registro[id_persona]'>Eliminar</a>
                                        </div>
                                        </div>
                                    </div>
                                    </div>


                                </td>";
                            echo "  <td>";
                                echo "<form id='modificar_cuenta_bancaria_$registro[id_persona]' action='../formularios/formmodificarcuenta.php' method='post'>
                                        <input type='hidden' value='$registro[id_persona]' name='id_persona'/>
                                        <select class='form-select' name='id_cuenta_bancaria' form='modificar_cuenta_bancaria_$registro[id_persona]'>
                                                    <option selected>Seleccionar cuenta</option>";
                                        while($cuenta = mysqli_fetch_array($respuesta1)){
                                            echo "  <option value=$cuenta[id_cuenta_bancaria]>$cuenta[id_cuenta_bancaria]</option>";
                                        }
                                echo "  </select>
                                    </form>";
                                    
                            echo "   </td>";
                            echo "  <td>
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