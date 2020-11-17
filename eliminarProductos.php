<?php 

include("baseDatos.php");

//Recibo el Id que voy a eliminar
$idEliminar=($_GET["id"]);

//crear el objeto de la clase BD
$transaccion= new BaseDatos();

//crear la consulta SQL para eliminar
$consultaSQL="DELETE FROM productos WHERE idProducto='$idEliminar'";

// utilizar el metodo para eliminar datos
$transaccion->eliminarProductos($consultaSQL);
    
?>



