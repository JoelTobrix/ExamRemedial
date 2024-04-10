<?php
// Datos del proveedor a insertar
$nombreProveedor = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "tienda");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Preparar la consulta SQL para insertar el nuevo proveedor
$sql = "INSERT INTO proveedores (Nombre_Proveedor, Direccion, Telefono, Email) 
        VALUES ('$nombreProveedor', '$direccion', '$telefono', '$email')";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    echo "Nuevo proveedor agregado correctamente.";
} else {
    echo "Error al agregar el proveedor: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
