<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado proveedores</title>
</head>
<body>
    <h1 align="center">Listado de proveedores que suministran más productos</h1>
    <center>
        <table>
            <tr>
                <th>Nombre Proveedor</th>
                <th>Total de productos</th>
            </tr>
            <?php include '../models/listado_proveedores.models.php'; ?>
        </table>
    </center>
</body>
</html>
