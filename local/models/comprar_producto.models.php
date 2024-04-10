<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha hecho clic en el botón de comprar
    if (isset($_POST['comprar'])) {
        // Obtener el ID del producto comprado del formulario
        $id_producto_comprado = $_POST['id_producto'];

        // Crear una conexión a la base de datos
        $conn = new mysqli("localhost", "root", "", "tienda");

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error en la conexión: " . $conn->connect_error);
        }

        // Consulta SQL para obtener los datos del producto
        $sql_producto = "SELECT Nombre_Producto, Precio FROM productos WHERE ID_Producto = $id_producto_comprado";
        $resultado_producto = $conn->query($sql_producto);

        // Verificar si se encontró el producto
        if ($resultado_producto->num_rows > 0) {
            // Obtener los datos del producto
            $fila_producto = $resultado_producto->fetch_assoc();
            $nombre_producto = $fila_producto['Nombre_Producto'];
            $precio_producto = $fila_producto['Precio'];

            // Insertar la compra del producto en la tabla de productos vendidos
            $sql_insertar_compra = "INSERT INTO productos_vendidos (ID_Producto, Nombre_Producto, Precio) VALUES ($id_producto_comprado, '$nombre_producto', $precio_producto)";

            if ($conn->query($sql_insertar_compra) === TRUE) {
                // Mensaje de éxito
                echo "¡Producto '$nombre_producto' comprado exitosamente por $$precio_producto!";
            } else {
                // Error al insertar la compra en la base de datos
                echo "Error al comprar el producto: " . $conn->error;
            }
        } else {
            // No se encontró el producto con el ID especificado
            echo "El producto con ID $id_producto_comprado no se encontró en la base de datos.";
        }

        // Cerrar la conexión
        $conn->close();
    }
}
?>







