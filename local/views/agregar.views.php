<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seccion agregar productos </title>
</head>
<body>
       <form action="../models/agregar_producto.models.php" method="post">
        Nombre del Producto: <input type="text" name="nombre_producto"><br>
        Precio: <input type="text" name="precio"><br>
        ID del Proveedor: <input type="number" name="id_proveedor"><br>
        <input type="submit"value="Enviar">
</form>
      

</body>
</html>