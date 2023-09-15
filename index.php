<?php
// Iniciar sesión para utilizar variables de sesión
session_start();

// Incluir los archivos necesarios para la funcionalidad de la aplicació
require_once "Libs/routes.php"; 	// Archivo que contiene la clase de enrutamiento (Routes)
require_once "Libs/template.php"; 	// Archivo que contiene la clase de plantilla (template)
require_once "Libs/connection.php"; // Archivo que contiene la clase de conexión a la base de datos (connection)

// Verificar si se recibieron los parámetros "controller" y "action" a través de GET
if(isset($_GET["controller"]) && isset($_GET["action"])){
	// Si los parámetros existen, asignar sus valores a las variables $controller y $action
	$controller = $_GET["controller"];
	$action 	= $_GET["action"];
}else{
	// Si los parámetros no existen, asignar valores predeterminados para el controlador y la acción
	$controller = "main";
	$action     = "index";
}

// Llamar al método estático "loadContent" de la clase "Routes" para cargar el contenido del controlador y ejecutar la acción
Routes::loadContent($controller , $action);
?>
