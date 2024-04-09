<?php
// Importar el archivo de modelo
require_once('../models/asignaciones.models.php');

// Crear una instancia del modelo de Asignaciones
$Asignaciones = new Asignaciones();

// Verificar el tipo de operación solicitada
if (isset($_GET['op'])) {
    switch ($_GET['op']) {
        case 'todos':
            // Obtener todos los registros de asignaciones
            $datos = $Asignaciones->todos();

            // Crear un array para almacenar todos los registros
            $todos = array();
            // Iterar sobre los resultados y almacenarlos en el array
            while ($row = mysqli_fetch_assoc($datos)) {
                $todos[] = $row;
            }
            // Devolver los resultados como JSON
            echo json_encode($todos);
            break;
        case 'insertar':
            // Obtener los datos del formulario
            $TareaID = $_POST['TareaID'];
            $UsuarioID = $_POST['UsuarioID'];

            // Insertar la asignación en la base de datos
            $datos = $Asignaciones->insertar($TareaID, $UsuarioID);

            // Devolver el resultado de la operación como JSON
            echo json_encode($datos);
            break;
        case 'actualizar':
            // Obtener los datos del formulario
            $AsignacionID = $_POST['AsignacionID'];
            $TareaID = $_POST['TareaID'];
            $UsuarioID = $_POST['UsuarioID'];

            // Actualizar la asignación en la base de datos
            $datos = $Asignaciones->actualizar($AsignacionID, $TareaID, $UsuarioID);

            // Devolver el resultado de la operación como JSON
            echo json_encode($datos);
            break;
        case 'eliminar':
            // Obtener el ID de la asignación a eliminar
            $AsignacionID = $_POST['AsignacionID'];

            // Eliminar la asignación de la base de datos
            $datos = $Asignaciones->eliminar($AsignacionID);

            // Devolver el resultado de la operación como JSON
            echo json_encode($datos);
            break;
        default:
            // Si se proporciona una operación no reconocida, devolver un mensaje de error
            echo json_encode(array('error' => 'Operación no válida'));
            break;
    }
} else {
    // Si no se proporciona ninguna operación, devolver un mensaje de error
    echo json_encode(array('error' => 'Operación no especificada'));
}
?>
