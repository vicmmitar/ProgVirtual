<?php
include "./conexion.php";
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$ci = $_POST['ci'];
$query = "insert into persona values('null','$nombre', '$apellido', '$ci');";
$respuesta = mysqli_query($conexion, $query);
if($respuesta){
    $msg = "Se agrego correctamente";
}
else{
    $msg = "Ocurrio un error al agregar";
}
mysqli_close($conexion);
header("Location: ../index.php?msg=$msg");