<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/assets/css/comprar_producto.css">
    <title>Seleccionar Producto</title>
</head>
<body>
    <h1>Seleccionar Producto</h1>
    <h2>Productos Disponibles</h2>
    <?php
    // Establecer conexión a la base de datos
    $conn = new mysqli("localhost", "root", "", "tienda");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error en la conexión: " . $conn->connect_error);
    }

    // Consulta SQL para obtener los nombres y precios de los productos
    $sql_productos = "SELECT ID_Producto, Nombre_Producto, Precio FROM productos";
    $resultado_productos = $conn->query($sql_productos);

    // Verificar si se encontraron resultados
    if ($resultado_productos->num_rows > 0) {
        // Mostrar la lista de productos con sus precios
        echo '<ul>';
        while ($fila_producto = $resultado_productos->fetch_assoc()) {
            echo '<li>' . $fila_producto["Nombre_Producto"] . ' - $' . $fila_producto["Precio"] . '</li>';
        }
        echo '</ul>';
    } else {
        echo "No se encontraron productos en la base de datos.";
    }

    // Cerrar la conexión
    $conn->close();
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="id_producto">Seleccione un producto:</label>
        <select name="id_producto" id="id_producto">
            <?php
            // Establecer conexión a la base de datos
            $conn = new mysqli("localhost", "root", "", "tienda");

            // Verificar la conexión
            if ($conn->connect_error) {
                die("Error en la conexión: " . $conn->connect_error);
            }

            // Consulta SQL para obtener los productos
            $sql_productos = "SELECT ID_Producto, Nombre_Producto, Precio FROM productos";
            $resultado_productos = $conn->query($sql_productos);

            // Mostrar las opciones del select
            if ($resultado_productos->num_rows > 0) {
                while ($fila_producto = $resultado_productos->fetch_assoc()) {
                    echo '<option value="' . $fila_producto["ID_Producto"] . '">' . $fila_producto["Nombre_Producto"] . ' - $' . $fila_producto["Precio"] . '</option>';
                }
            } else {
                echo '<option value="">No hay productos disponibles</option>';
            }

            // Cerrar la conexión
            $conn->close();
            ?>
        </select>
        
        <input type="submit" name="comprar" value="Comprar">
        <input type="submit" value="Regresar" formaction="javascript:history.back()">
    </form>

    <?php
    // Verificar si se ha enviado el formulario y si se ha hecho clic en el botón de comprar
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comprar'])) {
        // Obtener el ID del producto comprado del formulario
        $id_producto_comprado = $_POST['id_producto'];

        // Crear una conexión a la base de datos
        $conn = new mysqli("localhost", "root", "", "tienda");

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error en la conexión: " . $conn->connect_error);
        }

        // Consulta SQL para obtener el nombre y precio del producto comprado
        $sql_producto = "SELECT Nombre_Producto, Precio FROM productos WHERE ID_Producto = $id_producto_comprado";
        $resultado_producto = $conn->query($sql_producto);

        if ($resultado_producto->num_rows > 0) {
            // Obtener los datos del producto
            $fila_producto = $resultado_producto->fetch_assoc();
            $nombre_producto = $fila_producto['Nombre_Producto'];
            $precio_producto = $fila_producto['Precio'];

            // Insertar la compra del producto en la tabla de productos vendidos
            $sql_insertar_compra = "INSERT INTO productos_vendidos (ID_Producto, Nombre_Producto, Precio) VALUES ($id_producto_comprado, '$nombre_producto', $precio_producto)";

            if ($conn->query($sql_insertar_compra) === TRUE) {
                // Mensaje de éxito
                echo "¡Compra exitosa! Has comprado el producto '$nombre_producto' por $$precio_producto";
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
    ?>
</body>
</html>







