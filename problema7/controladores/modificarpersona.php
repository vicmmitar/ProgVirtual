<?php
include "./conexion.php";
$id_persona = $_POST['id_persona'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$ci = $_POST['ci'];
$query = "update persona set nombre = '$nombre', apellido = '$apellido', ci = '$ci' where id_persona = $id_persona";
$respuesta = mysqli_query($conexion, $query);
if($respuesta){
    $msg = "Se modifico correctamente";
}
else{
    $msg = "Ocurrio un error al modificar";
}
mysqli_close($conexion);
header("Location: ../index.php?msg=$msg");