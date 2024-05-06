<?php
$nombreServidor = "127.0.0.1";
$nombreUsuario = "root";
$contraseña = "";
$baseDeDatos = "bdvictor";

$conexion = mysqli_connect($nombreServidor,$nombreUsuario,$contraseña,$baseDeDatos);

if (!$conexion) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    exit;
}
