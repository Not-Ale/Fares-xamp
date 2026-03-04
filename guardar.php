<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "inventario-fares";


$conxion = new mysqli($server, $username, $password, $database);
if ($conxion->connect_error) {
    die("Conexión fallida: " . $conxion->connect_error);
}


$codigo = $_POST['codigo'];
$nom_producto = $_POST['nom_producto'];
$costo = $_POST['costo'];
$porc_venta = $_POST['porc_ventaje'];
$precio_venta = $_POST['precio_venta'];
$stock = $_POST['stock'];
$fecha = $_POST['fecha'];

$imagen = $_FILES['imagen']['name'];
$target_dir = "imagenes/";
$target_file = $target_dir . basename($imagen);

if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {

} else {
    echo "Error al subir la imagen.";
    exit();
}


$stmt = $conxion->prepare("INSERT INTO inventario 
    (codigo, nom_producto, costo, porc_venta, precio_venta, imagen, stock, fecha)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssddssds", $codigo, $nom_producto, $costo, $porc_venta, $precio_venta, $imagen, $stock, $fecha);


if ($stmt->execute()) {
    echo "Producto guardado correctamente ";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conxion->close();
?>