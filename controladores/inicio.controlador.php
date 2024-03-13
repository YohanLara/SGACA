<?php
require_once "modelos/productos.php";
class InicioControlador{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Productos();
  

    }

    public function Inicio(){
 
     require_once "vistas/encabezado.php";
     require_once "vistas/pie.php";
     require_once "vistas/inicio/principal.php";
    }
    
}