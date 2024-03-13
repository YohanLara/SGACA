<?php

require_once "modelos/basededatos.php"; 
//: Esta línea comprueba si el parámetro "c" no está presente en la URL. $_GET es un array asociativo 
if(!isset($_GET['c'])){
//Si no se encuentra el parámetro "c" en la URL, se ejecuta el siguiente bloque de código
   require_once "controladores/inicio.controlador.php";
//Se crea una instancia del controlador de inicio. Esto permite utilizar las funciones y métodos definidos en ese controlador.
   $controlador = new InicioControlador();
   call_user_func(array($controlador,"Inicio"));//cuando no le pasamos valor al controlador

}else{
    $controlador = $_GET['c'];
    require_once "controladores/$controlador.controlador.php";
    $controlador = ucwords($controlador)."Controlador"; //si el nombre del controlador obtenido es "producto", al aplicar ucwords() se convierte en "Producto".
    $controlador = new $controlador;
    $accion = isset($_GET['a']) ? $_GET['a'] : "Inicio";
    call_user_func(array($controlador,$accion));

}