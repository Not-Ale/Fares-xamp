<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Producto</title>

    <script>
        function calcularPrecio() {
            const costo = parseFloat(document.getElementById('costo').value) || 0;
            const porcentaje = parseFloat(document.getElementById('porc_ventaje').value) || 0;
            const precio = costo + (costo * porcentaje / 100);
            document.getElementById('precio_venta').value = precio.toFixed(2);
        }
    </script>
</head>

<body>

<h2>Crear Producto</h2>

<form action="guardar.php" method="POST" enctype="multipart/form-data">

    <label>Código:</label><br>
    <input type="number" name="codigo" required><br><br>

    <label>Nombre del producto:</label><br>
    <input type="text" name="nom_producto" required><br><br>

    <label>Costo:</label><br>
    <input type="number" step="0.01" name="costo" id="costo" oninput="calcularPrecio()" required><br><br>

    <label>Porcentaje de venta:</label><br>
    <input type="number" name="porc_ventaje" id="porc_ventaje" oninput="calcularPrecio()" required><br><br>

    <label>Precio de venta:</label><br>
    <input type="number" step="0.01" name="precio_venta" id="precio_venta" readonly><br><br>

    <label>Stock:</label><br>
    <input type="number" name="stock" required><br><br>

    <label>Imagen:</label><br>
    <input type="file" name="imagen"><br><br>

    <label>Fecha:</label><br>
    <input type="date" name="fecha" required><br><br>

    <input type="submit" value="Guardar Producto">

</form>

</body>
</html>

