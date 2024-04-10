<?php
$server="localhost";
$user="root";
$password="";
$db="tienda";
             //Establecer conexion
    $conexion = new mysqli($server,$user,$password,$db);
    if($conexion->connect_errno){
        die(" error: " .$conexion->connect_errno);    
    } else{
        echo "Conexion exitosa";
    }        
    $conexion-> close(); ?>