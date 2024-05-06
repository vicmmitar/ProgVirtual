<?php
include "./conexion.php";
$id_cuenta_bancaria = $_POST['id_cuenta_bancaria'];
$tipo_cuenta = $_POST['tipo_cuenta'];
$saldo = $_POST['saldo'];
$departamento = $_POST['departamento'];
$id_persona = $_POST['id_persona'];
$query = "update cuenta_bancaria set tipo_cuenta = '$tipo_cuenta', saldo = '$saldo', departamento = '$departamento' where id_cuenta_bancaria = '$id_cuenta_bancaria'";
$respuesta = mysqli_query($conexion, $query);
if($respuesta){
    $msg = "Se modifico correctamente";
}
else{
    $msg = "Ocurrio un error al modificar";
}
mysqli_close($conexion);
header("Location: ../index.php?msg=$msg");