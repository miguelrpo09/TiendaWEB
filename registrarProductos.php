<?php 

    include('baseDatos.php');

    if (isset($_POST["btnIngresarProducto"])){

        $nombreProducto=$_POST['nombreproducto'];
        $marcaProducto=$_POST['marcaproducto'];
        $precioProducto=$_POST['precioProducto'];
        $descripcionProducto=$_POST['txAreaDescripcion'];

        $url_img="img/" . basename($_FILES['imgProducto']['name']);
        $tamaño=$_FILES['imgProducto']['size'];
        $tipo=$_FILES['imgProducto']['type'];

        if (move_uploaded_file($_FILES['imgProducto']['tmp_name'],$url_img)){
            $transaccion=new BaseDatos();
            $consultaSQL="INSERT INTO productos(nombreProducto, marcaProducto, precioProducto, descripcionProducto, imgProducto) VALUES ('$nombreProducto', '$marcaProducto', '$precioProducto', '$descripcionProducto', '$url_img')";
            $transaccion->agregarProductos($consultaSQL);
        }else {
            echo "<b>Ocurrio un error: ".$_FILES['imgProducto']['error'];
        }

    }











?>