<?php
error_reporting(0);

// Requerimientos
require_once('../config/sesiones.php');
require_once("../models/listado_proveedores.models.php"); // Incluir el modelo de proveedores

// Crear instancia de la clase Proveedores
$Proveedores = new Proveedores();

// Manejar la operación de listar proveedores
switch ($_GET["op"]) {
    case 'listar_proveedores':
        // Obtener la lista de proveedores
        $lista_proveedores = $Proveedores->obtenerListaProveedores();
        
        // Verificar si se encontraron proveedores
        if($lista_proveedores) {
            // Mostrar la lista de proveedores con sus respectivos datos
            echo "<h2>Listado de proveedores</h2>";
            echo "<ul>";
            foreach($lista_proveedores as $proveedor) {
                echo "<li>Nombre: " . $proveedor['Nombre_Proveedor'] . "</li>";
                echo "<li>Total de productos: " . $proveedor['Total_Productos'] . "</li>";
                echo "<br>";
            }
            echo "</ul>";
        } else {
            echo "No se encontraron proveedores.";
        }
        break;
    default:
        // Si 'op' no coincide con ninguna operación conocida
        echo "Operación no válida.";
        break;
}
?>
