<?php
// Obtener los valores del formulario
$nombre_producto = $_POST['nombre_producto'];
$precio = $_POST['precio'];
$id_proveedor = $_POST['id_proveedor'];

// Crear conexión
$conn = new mysqli("localhost", "root", "", "tienda");

// Verificar conexión
if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}

// La consulta SQL para insertar datos
$sql = "INSERT INTO productos (Nombre_Producto, Precio, ID_Proveedor) VALUES (?, ?, ?)";

// Preparar declaración
$stmt = $conn->prepare($sql);

// Vincular parámetros
$stmt->bind_param("sdi", $nombre_producto, $precio, $id_proveedor);

// Ejecutar
if ($stmt->execute() === TRUE) {
    echo "Nuevo producto agregado exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>
