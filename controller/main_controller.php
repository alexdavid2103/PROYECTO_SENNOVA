<?php
require_once "model/admin_model.php";
require_once "model/empresa_model.php";
require_once "model/tecnico_model.php";
require_once "model/motor_model.php";
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

    public function validar()
    {
        // Extraer datos del formulario
        extract($_POST);

        // Inicializar variables
        $mensaje = ""; // Mensaje de error por defecto
        $estado = 0; // Estado de validación (0 para no validado, 1 para validado)
        $url = "?controller=dashboard&action=index"; // Valor por defecto para URL de redirección

        // Define un array de roles y modelos correspondientes
        $roles = [
            'adm' => 'admin_model',
            'tec' => 'tecnico_model',
            'emp' => 'empresa_model'
        ];

        // Itera a través de los roles y modelos para validar
        foreach ($roles as $rol => $model) {
            // Verifica si las claves "id" y "password" están definidas en $_POST
            if (isset($_POST['id']) && isset($_POST['password'])) {
                // Crear un array asociativo con los datos
                $data = compact('id', 'password');
                // Llama al método de validación del modelo
                $r = $model::validar($data);
                if (is_array($r)) {
                    // Si las credenciales son válidas, establecer variables de sesión
                    $_SESSION['id'] = $r["{$rol}_id"];
                    $_SESSION['nombre'] = $r["{$rol}_nombre1"];
                    $_SESSION['apellido'] = $r["{$rol}_apellido1"];
                    $_SESSION['rol'] = $rol;
                    $estado = 1; // Cambia el estado de validación a 1 (validado)
                    break; // Si se encuentra una coincidencia, sal del bucle
                }
            }
        }

        // Si no se ha validado como ninguna entidad, muestra un mensaje de error
        if ($estado === 0) {
            $mensaje = "Usuario/Contraseña incorrectos";
        }

        // Devolver los resultados en formato JSON
        echo json_encode(
            array(
                "mensaje" => $mensaje,
                "estado" => $estado,
                "url" => $url
            )
        );
    }


    public function salir()
    {
        session_destroy();
        header("Location: ?controller=main&action=index");
    }
}
