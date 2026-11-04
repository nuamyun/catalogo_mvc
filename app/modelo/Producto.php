<?php

class Producto {

    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Consultar todos los productos
    public function obtenerTodos() {

        $sql = "SELECT * FROM productos ORDER BY id DESC";

        $consulta = $this->conexion->query($sql);

        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    // Registrar un producto
    public function registrar($nombre, $precio) {

        $sql = "INSERT INTO productos (nombre, precio)
                VALUES (:nombre, :precio)";

        $consulta = $this->conexion->prepare($sql);

        return $consulta->execute([
            ":nombre" => $nombre,
            ":precio" => $precio
        ]);
    }

}

?>