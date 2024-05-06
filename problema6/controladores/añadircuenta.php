<?php
include "./conexion.php";
$tipo_cuenta = $_POST['tipo_cuenta'];
$saldo = $_POST['saldo'];
$departamento = $_POST['departamento'];
$id_persona = $_POST['id_persona'];
$query = "insert into cuenta_bancaria values('null','$tipo_cuenta', '$saldo', $departamento, '$id_persona');";
$respuesta = mysqli_query($conexion, $query);
if($respuesta){
    $msg = "Se agrego correctamente";
}
else{
    $msg = "Ocurrio un error al agregar";
}
mysqli_close($conexion);
header("Location: ../index.php?msg=$msg");