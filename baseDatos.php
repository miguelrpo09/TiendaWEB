<?php 

class BaseDatos{

    //atributos
    public $usuarioBD="root";
    public $passwordBD="";


    //constructor
    public function __Construct(){}


    //Metodo
    public function conectarBD(){

        $datosBD="mysql:host=localhost;dbname=tiendaweb";

        $conexionBD=new PDO($datosBD,$this->usuarioBD,$this->passwordBD);

        try{
            $datosBD="mysql:host=localhost;dbname=tiendaweb";
            $conexionBD= new PDO($datosBD,$this->usuarioBD,$this->passwordBD);
            //echo("Exito");
            return($conexionBD);
        
        }catch(PDOException $error){
            echo($error->getMessage());
        }
    }

    public function agregarProductos($consultarSQL){

        //establecer conexion
        $conexionBD=$this->conectarBD();

        //preparar consulta
        $insertarProducto=$conexionBD->prepare($consultarSQL);

        //ejecutar consulta
        $resultado=$insertarProducto->execute();

        //verifico resultado
        if ($resultado){
            echo("Producto registrado con exito");
            header("refresh:2;url=http://localhost/tiendaweb/formProductos.php");
        }else{
            echo("Error al registrar producto");
        }

    }
    public function consultarProductos($consultarSQL){

        //establecer una conexion
        $conexionBD=$this->conectarBD();

        //preparar consulta
        $consultarProductos=$conexionBD->prepare($consultarSQL);

        //Establecer el metodo
        $consultarProductos->setFetchMode(PDO::FETCH_ASSOC);

        //Ejecutar la operacion en la BD
        $consultarProductos->execute();

        //Retornar los datos
        return($consultarProductos->fetchAll());

    }
    public function eliminarProductos($consultarSQL){

        //establecer conexion BD
        $conexionBD=$this->conectarBD();

        //preparar eliminacion de producto
        $eliminarProducto=$conexionBD->prepare($consultarSQL);
        
        //ejecutar la consulta
        $resultado=$eliminarProducto->execute();

        if ($resultado){
            echo("Producto Eliminado");
            header("refresh:0;url=http://localhost/tiendaweb/productosBodega.php");
        }else{
            echo("Error");
        }

    }

    public function editarProductos($consultarSQL){

            //establecer una conexion
    $conexionBD=$this->conectarBD();

    //Peparar Consulta
    $editarProductos=$conexionBD->prepare($consultarSQL);

    //Ejecutar la consulta
    $resultado= $editarProductos->execute();

    //verifico el resultado
    if($resultado){
        echo("usuario Editado");
        header("refresh:0; productosBodega.php");
    }else{
        echo("error");
    }


    }
}
























?>