<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de productos</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <div class="contenedor">

        <h1>Catálogo de productos</h1>

        <?php if (isset($_GET["mensaje"]) && $_GET["mensaje"] === "registrado"): ?>

            <div class="exito">
                ¡Producto registrado correctamente!
            </div>

        <?php endif; ?>

        <a href="index.php?accion=crear" class="boton">
            Registrar nuevo producto
        </a>

        <h2>Productos registrados</h2>

        <?php if (empty($productos)): ?>

            <p class="vacio">Todavía no hay productos registrados.</p>

        <?php else: ?>

            <table>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($productos as $producto): ?>

                        <tr>
                            <td><?= htmlspecialchars((string)$producto["id"]) ?></td>

                            <td><?= htmlspecialchars($producto["nombre"]) ?></td>

                            <td>
                                $<?= number_format((float)$producto["precio"], 2, ",", ".") ?>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        <?php endif; ?>

    </div>

</body>
</html>