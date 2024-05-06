<?php
include "conexion.php";
$id_cuenta_bancaria = $_GET['id_cuenta_bancaria'];
$query = "delete from cuenta_bancaria where id_cuenta_bancaria='$id_cuenta_bancaria'";
$respuesta = mysqli_query($conexion, $query);
if($respuesta){
    $msg = "Se elimino correctamente";
}
else{
    $msg = "Ocurrio un error al eliminar";
}
mysqli_close($conexion);
header("Location: ../index.php?msg=$msg");