<?php
        // Establecer conexión a la base de datos
        $conn = new mysqli("localhost", "root", "", "tienda");

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error en la conexión: " . $conn->connect_error);
        }

        // Consulta SQL para encontrar los productos más vendidos
        $sql = "SELECT Nombre_Producto, COUNT(*) AS Total_Ventas
                FROM productos_vendidos
                GROUP BY Nombre_Producto
                ORDER BY Total_Ventas DESC
                LIMIT 10";

        $resultado = $conn->query($sql);

        // Verificar si se encontraron resultados
        if ($resultado->num_rows > 0) {
            // Imprimir los resultados en la tabla
            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $fila["Nombre_Producto"] . "</td>";
                echo "<td>" . $fila["Total_Ventas"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No se encontraron productos vendidos.</td></tr>";
        }

        // Cerrar la conexión
        $conn->close();
        ?>


