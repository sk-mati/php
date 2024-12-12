<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "config.php";
include_once "entidades/usuario.php";

$usuario = new Usuario();
$usuario->usuario = "admin";
$usuario->clave = password_hash("admin123", PASSWORD_DEFAULT);
$usuario->nombre = "admin";
$usuario->apellido = "";
$usuario->correo = "admin@correo.com";
$usuario->insertar();

echo "Usuario insertado.";
?>