<?php
include "conexion.php";
$id_persona = $_GET['id_persona'];
$query = "select id_cuenta_bancaria from cuenta_bancaria where id_persona=$id_persona;";
$result = mysqli_query($conexion,$query);
if(mysqli_fetch_array($result)['id_cuenta_bancaria']!=null){
    $id_cuenta_bancaria = mysqli_fetch_array($result)['id_cuenta_bancaria'];
    $query = "DELETE FROM transaccion_bancaria WHERE origen=$id_cuenta_bancaria OR destino=$id_cuenta_bancaria;";
    $result = mysqli_query($conexion,$query);
    while($cuenta = mysqli_fetch_array($result)){
        $query = "delete from cuenta_bancaria where id_cuenta_bancaria='$id_cuenta_bancaria'";
        $respuesta = mysqli_query($conexion, $query);
        if($respuesta){
            $msg = "Se elimino correctamente";
        }
        else{
            $msg = "Ocurrio un error al eliminar";
        }
    }
}

$query = "delete from persona where id_persona='$id_persona'";
$respuesta = mysqli_query($conexion, $query);
if($respuesta){
    $msg = "Se elimino correctamente";
}
else{
    $msg = "Ocurrio un error al eliminar";
}
mysqli_close($conexion);
header("Location: ../index.php?msg=$msg");