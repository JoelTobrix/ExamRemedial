<?php
// Requerimientos
require_once('../config/sesiones.php');
require_once("../models/comprar_producto.models.php"); // Incluir el modelo de productos

// Crear instancia de la clase Productos
$Productos = new Productos();

// Manejar la operación de compra de un producto
switch ($_GET["op"]) {
    case 'comprar_producto':
        // Verificar si se proporcionó un ID de producto válido
        if(isset($_POST["id_producto"])) {
            $id_producto = $_POST["id_producto"];
            
            // Obtener los detalles del producto mediante su ID
            $producto = $Productos->obtenerProductoPorID($id_producto);
            
            // Verificar si se encontró el producto
            if($producto) {
                // Mostrar los detalles del producto
                echo "Producto seleccionado: " . $producto["Nombre_Producto"] . "<br>";
                echo "Precio: " . $producto["Precio"] . "<br>";
                echo "Proveedor: " . $producto["Nombre_Proveedor"] . "<br>";
            } else {
                echo "El producto seleccionado no existe.";
            }
        } else {
            echo "ID de producto no proporcionado.";
        }
        break;
    default:
        // Si 'op' no coincide con ninguna operación conocida
        echo "Operación no válida.";
        break;
}
?>
