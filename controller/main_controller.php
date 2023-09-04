<?php
require_once "modelo/motor_modelo.php";
require_once "modelo/cliente_modelo.php";
require_once "modelo/tecnico_modelo.php";
require_once "modelo/admin_modelo.php";
class main_controller
{
    // Constructor de la clase, inicializa un objeto de la clase template
    function __construct()
    {
        $this->obj = new template();
    }

    // Función para cargar la vista principal del sitio
    public function index()
    {
        // Cargar la plantilla de vista "main/index"
        $this->obj->loadTemplate("main/index");
    }

    // Función para cargar la vista de inicio de sesión
    public function login()
    {
        if (isset($_SESSION['id'])) {
			header("Location: index.php");
			exit();
		}

        // Cargar la plantilla de vista "main/login"
        $this->obj->loadTemplate("main/login");
    }
}
