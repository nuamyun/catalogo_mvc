<?php
require_once "../config/database.php";
require_once "../app/modelo/Producto.php";
require_once "../app/controlador/ProductoControlador.php";

$modelo = new Producto($conexion);
$controlador = new ProductoControlador($modelo);

$accion = $_GET["accion"] ?? "listar";

switch ($accion) {
    case "listar":
        $controlador->listar();
        break;

    case "crear":
        $controlador->crear();
        break;

    case "guardar":
        $controlador->guardar();
        break;

    default:
        $controlador->listar();
        break;
}
?>