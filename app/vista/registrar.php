<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar producto</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <div class="contenedor">

        <h1>Registrar producto</h1>

        <p>Completa los siguientes campos para agregar un producto.</p>

        <?php if (!empty($errores)): ?>
            <div class="errores">
                <?php foreach ($errores as $error): ?>
                    <p><?= htmlspecialchars($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form action="index.php?accion=guardar" method="POST">

            <label for="nombre">Nombre del producto:</label>

            <input
                type="text"
                id="nombre"
                name="nombre"
                maxlength="100"
                required
                value="<?= htmlspecialchars($nombre ?? '') ?>"
                placeholder="Ejemplo: Computador">

            <label for="precio">Precio:</label>

            <input
                type="number"
                id="precio"
                name="precio"
                min="0.01"
                step="0.01"
                required
                value="<?= htmlspecialchars($precio ?? '') ?>"
                placeholder="Ejemplo: 2500000">

            <button type="submit">Registrar producto</button>

        </form>

        <a href="index.php" class="enlace">Volver al catálogo</a>

    </div>

</body>
</html>