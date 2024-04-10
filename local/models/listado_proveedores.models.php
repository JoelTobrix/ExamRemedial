<?php
// Establecer conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "tienda");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Consulta SQL para encontrar los proveedores que suministran más productos
$sql = "SELECT pr.Nombre_Proveedor, COUNT(*) AS Total_Productos
        FROM proveedores pr
        JOIN productos p ON pr.ID_Proveedor = p.ID_Proveedor
        GROUP BY pr.Nombre_Proveedor
        ORDER BY Total_Productos DESC
        LIMIT 10";

$resultado = $conn->query($sql);

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    // Imprimir los resultados en la tabla
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila["Nombre_Proveedor"] . "</td>";
        echo "<td>" . $fila["Total_Productos"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='2'>No se encontraron proveedores que suministren productos.</td></tr>";
}

// Cerrar la conexión
$conn->close();
?>
