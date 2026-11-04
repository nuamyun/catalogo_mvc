<?php

class ProductoControlador {

    private $modelo;

    public function __construct($modelo) {
        $this->modelo = $modelo;
    }

    // Mostrar productos
    public function listar() {

        $productos = $this->modelo->obtenerTodos();

        require __DIR__ . "/../vista/productos.php";
    }

    // Mostrar formulario
    public function crear() {

        $errores = [];
        $nombre = "";
        $precio = "";

        require __DIR__ . "/../vista/registrar.php";
    }

    // Guardar producto
    public function guardar() {

        $errores = [];

        $nombre = trim($_POST["nombre"] ?? "");
        $precio = trim($_POST["precio"] ?? "");

        // Validar nombre
        if ($nombre === "") {
            $errores[] = "El nombre es obligatorio.";
        } elseif (strlen($nombre) > 100) {
            $errores[] = "El nombre no puede superar 100 caracteres.";
        }

        // Validar precio
        if ($precio === "") {
            $errores[] = "El precio es obligatorio.";
        } elseif (!is_numeric($precio) || $precio <= 0) {
            $errores[] = "El precio debe ser un número mayor que cero.";
        }

        // Si hay errores, mostrar nuevamente el formulario
        if (!empty($errores)) {

            require __DIR__ . "/../vista/registrar.php";

            return;
        }

        // Registrar mediante el modelo
        $this->modelo->registrar($nombre, $precio);

        // Redireccionar después de guardar
        header("Location: index.php?mensaje=registrado");
        exit;
    }

}

?>