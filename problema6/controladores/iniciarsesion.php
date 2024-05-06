<?php
include "../controladores/conexion.php";
include "../variables/store.php";
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
$query = "select rol, id_persona, usuario from usuario where usuario='$usuario' and contraseña='$contraseña';";
$respuesta = mysqli_query($conexion, $query);
if($respuesta){
    $usuario_devuelto = mysqli_fetch_array($respuesta);
    if($usuario_devuelto!=null){
        @$id_persona = $usuario_devuelto['id_persona'];
        $msg = "Bienvenido $usuario";
        mysqli_close($conexion);
        if($usuario_devuelto["rol"] == "1"){
            header("Location: ../vistas/vistaCliente.php?msg='$msg'&idPersona=$usuario_devuelto[id_persona]");
        }else{
            header("Location: ../vistas/vistaAdmin.php?msg='$msg'&idCliente=$usuario_devuelto[usuario]");
        }
    }else{
        $msg = "Usuario no encontrado";
        mysqli_close($conexion);
        header("Location: ../formularios/forminiciarsesion.php?msg='$msg'");
    }
}
else{
    $msg = "Ocurrio un error al agregar";
}
mysqli_close($conexion);
header("Location: ../inicioCampamentista.php?msg=$msg");