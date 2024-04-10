<?php
error_reporting(0);
// Requerimientos 
require_once('../config/sesiones.php');
require_once("../models/agregar_producto.models.php"); // Incluir el modelo de productos

// Crear instancia de la clase Productos
$Productos = new Productos();

// Manejar la operación de insertar un producto
switch ($_GET["op"]) {
    case 'insertar_producto':
        // Asegurarse de que se han enviado todos los datos necesarios
        if(isset($_POST["Nombre_Producto"], $_POST["Precio"], $_POST["ID_Proveedor"])) {
            $nombre_producto = $_POST["Nombre_Producto"];
            $precio = $_POST["Precio"];
            $id_proveedor = $_POST["ID_Proveedor"];
            
            // Llamar al método insertar del modelo Productos
            $resultado = $Productos->Insertar($nombre_producto, $precio, $id_proveedor);
            echo json_encode($resultado);
        } else {
            // Datos incompletos para insertar el producto
            echo json_encode(["estado" => false, "mensaje" => "Datos incompletos para insertar el producto."]);
        }
        break;
    default:
        // Si 'op' no coincide con ninguna operación conocida
        echo json_encode(["estado" => false, "mensaje" => "Operación no válida."]);
        break;
}
?>

