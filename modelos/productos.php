<?php

class Productos{
    private $pdo;

    private $pro_id;
    private $pro_nombre;  
    private $pro_marca;    
    private $pro_precio;   
    private $pro_cantidad;  
    
    public function __CONSTRUCT(){
        $this->pdo= BasedeDatos::Conectar();
    }


    public function getPro_id(){
        return $this->pro_id;
    }

    public function setPro_id($id){
         $this->pro_id=$id;
    }


    public function getPro_nombre(){
        return $this->pro_nombre;
    }

    public function setPro_nombre($nombre){
         $this->pro_nombre=$nombre;
    }

    
    public function getPro_marca(){
        return $this->pro_marca;
    }

    public function setPro_marca($marca){
         $this->pro_marca=$marca;
    }

    
    public function getPro_precio(){
        return $this->pro_precio;
    }

    public function setPro_precio($precio){
         $this->pro_precio=$precio;
    }

    
    public function getPro_cantidad(){
        return $this->pro_cantidad;
    }

    public function setPro_cantidad($cantidad){
         $this->pro_cantidad=$cantidad;
    }
    //metodos
    
    public function Cantidad() {
        try {
            $consulta = $this->pdo->prepare("SELECT SUM(pro_cantidad) AS cantidad FROM productos");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar() {
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM productos");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }


    public function Insertar(Productos $producto) {
        try {
            $consulta = "INSERT INTO productos(pro_nombre,pro_marca,pro_precio,pro_cantidad) VALUES (?,?,?,?)";
            $this->pdo->prepare($consulta)
            ->execute(array(
                       $producto->getPro_nombre(),
                       $producto->getPro_marca(),
                       $producto->getPro_precio(),
                       $producto->getPro_cantidad()
            
        ));
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }


    public function Obtener($id) {
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM productos WHERE pro_id=?;");
            $consulta->execute(array($id));
            $row=$consulta->fetch(PDO::FETCH_OBJ);
            $producto=new Productos();
            $producto->setPro_id($row->pro_id);
            $producto->setPro_nombre($row->pro_nombre);
            $producto->setPro_marca($row->pro_marca);
            $producto->setPro_precio($row->pro_precio);
            $producto->setPro_cantidad($row->pro_cantidad);
            return $producto;
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar(Productos $producto) {
        try {
            $consulta = "UPDATE productos SET
            pro_nombre=?,
            pro_marca=?,
            pro_precio=?,
            pro_cantidad=?
            WHERE pro_id=?";
            
            $statement = $this->pdo->prepare($consulta);
            $statement->execute(array(
                $producto->getPro_nombre(),
                $producto->getPro_marca(),
                $producto->getPro_precio(),
                $producto->getPro_cantidad(),
                $producto->getPro_id()
            ));
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }
    
        public function Eliminar($id) {
            try {
                $consulta = "DELETE FROM productos WHERE pro_id=?;";
                $statement = $this->pdo->prepare($consulta);
                $statement->execute([$id]);
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
        
    }



