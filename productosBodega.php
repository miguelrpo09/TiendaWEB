<?php

include("baseDatos.php");

//crear objeto clase BD
$transaccion=new BaseDatos();

//se define la consulta
$consultaSQL="SELECT * FROM productos";

//Ejecuta el metodo consultarProducto
//y almacenar la respuesta en una variable
$listaProductos=$transaccion->consultarProductos($consultaSQL);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Productos Bodega</title>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-info">
            <a class="navbar-brand" href="#" >Tienda WEB</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formProductos.php">Ingresar Productos</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="productosBodega.php">Productos Bodega</a>
                    </li>
                </ul>

            </div>
        </nav>
    </header>
    <main>
        <h4 class="text-center mt-5">PRODUCTOS DE BODEGA</h4>
        <br>
        <div class="container-fluid">
            <div class="row">
                <?php 
              foreach ($listaProductos as $producto) {
            ?>
                <div class="col-md-3 mb-3">
                    <div class="card h-100 mb-2 shadow-sm">
                        <img class="card-img-top " style="height:13rem" src="<?php echo $producto['imgProducto'];?>"
                            alt="Foto">
                        <div class="card-body">
                            <h4 class="card-title text-center alert alert-secondary"><?php echo $producto['nombreProducto'];?></h4>
                            <p class="card-text text-center"><?php echo $producto['descripcionProducto'];?></p>
                            <p class="card-text text-center text-danger">
                                <?php echo '$ '.number_format($producto['precioProducto']);?></p>
                                <div class="card-text text-center">
                                    <small class="text-muted text-center" >Marca: <?php echo $producto['marcaProducto'];?></small>
                                </div>
                        </div>
                        <div class="card-footer text-center alert alert-dark">
                                    <button type="button" class="btn btn-sm btn-success px-3 "
                                        name="btnEditarProducto" data-toggle="modal"
                                        data-target="#editar<?php echo($producto["idProducto"])?>">Editar <svg
                                            width="1em" height="1em" style="color:white;" viewBox="0 0 16 16"
                                            class="bi bi-pencil-square" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </button >
                                    <a href="eliminarProductos.php?id=<?php echo($producto['idProducto'])?>"
                                        class="btn btn-sm btn-danger px-3">Eliminar<svg width="1em" height="1em" viewBox="0 0 16 16"
                                            class="bi bi-trash-fill" style="color:white;" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                                        </svg>
                                    </a>
                                </div>
                    </div>

                </div>
                <!--  modal -->
                <div class="modal fade" id="editar<?php echo($producto["idProducto"])?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="editarProductos.php?id=<?php echo($producto["idProducto"])?>"
                                    method="POST">
                                    <div class="form-group">
                                        <label>Nombre Producto:</label>
                                        <input type="text" class="form-control rounded-20px" name="nombreProductoEditar"
                                            value="<?php echo($producto["nombreProducto"])?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Marca Producto:</label>
                                        <input type="text" class="form-control rounded-20px" name="marcaProductoEditar"
                                            value="<?php echo($producto["marcaProducto"])?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Precio Producto:</label>
                                        <input type="text" class="form-control rounded-20px" name="precioProductoEditar"
                                            value="<?php echo($producto["precioProducto"])?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Descripcion:</label>
                                        <textarea class="form-control rounded-10px" rows="3"
                                            name="descripcionProductoEditar"><?php echo($producto["descripcionProducto"])?></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success rounded-20px"
                                        name="btnEditarProducto">Enviar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }  ?>
            </div>
           
        </div>

    </main>





    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</body>

</html>