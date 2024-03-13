<?php
require_once "modelos/productos.php";

class ProductosControlador{

    private $modelo;

    public function __construct(){
        $this->modelo = new Productos();
    }

    public function Inicio(){ 
        require_once "vistas/encabezado.php";
        require_once "vistas/pie.php";
        require_once "vistas/productos/index.php";
    }

    public function FormCrear(){ 
        $titulo = "Registrar";
        $p = new Productos();
        if(isset($_GET['id'])){
            $p = $this->modelo->Obtener($_GET['id']);
            $titulo = "Modificar";
        }
        require_once "vistas/encabezado.php";
        require_once "vistas/pie.php";
        require_once "vistas/productos/form.php";
     
    }

    public function Guardar(){ 
        $producto = new Productos();
        $producto->setPro_id($_POST['pro_id']);
        $producto->setPro_nombre($_POST['pro_nombre']);
        $producto->setPro_marca($_POST['pro_marca']);
        $producto->setPro_precio($_POST['pro_precio']);
        $producto->setPro_cantidad($_POST['pro_cantidad']);

        if($producto->getPro_id() > 0){
            $this->modelo->Actualizar($producto);
        } else {
            $this->modelo->Insertar($producto);
      
        }
        
        header("location: ?c=productos"); // Corregido el redireccionamiento

        }


        public function Borrar(){
            $this->modelo->Eliminar($_GET["id"]);
            
            header("location: ?c=productos");

        }
    }



       


