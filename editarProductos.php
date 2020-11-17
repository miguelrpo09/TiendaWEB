<?php 

include("baseDatos.php");

$transaccion=new BaseDatos();

if(isset($_POST["btnEditarProducto"])){

    $id=$_GET["id"];
    $nombreProducto=$_POST['nombreProductoEditar'];
    $marcaProducto=$_POST['marcaProductoEditar'];
    $precioProducto=$_POST['precioProductoEditar'];
    $descripcionProducto=$_POST['descripcionProductoEditar'];

    $consultarSQL="UPDATE productos SET nombreProducto='$nombreProducto',marcaProducto='$marcaProducto', precioProducto='$precioProducto', descripcionProducto='$descripcionProducto' WHERE idProducto='$id'";

    $transaccion->editarProductos($consultarSQL);
}

?>