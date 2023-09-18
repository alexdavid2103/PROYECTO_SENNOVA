<?php
require_once "model/admin_modelo.php";
require_once "model/empresa_modelo.php";
require_once "model/tecnico_modelo.php";
require_once "model/motor_modelo.php";
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
        $data = compact('id', 'password'); // Crear un array asociativo con los datos
        $mensaje = ""; // Mensaje de error por defecto
        $estado = 0; // Estado de validación (0 para no validado, 1 para validado)
        $url = "?controller=main&action=index"; // Valor por defecto para URL de redirección

        // Define un array de roles y modelos correspondientes
        $roles = [
            'adm' => 'admin_modelo',
            'tec' => 'tecnico_modelo',
            'emp' => 'empresa_modelo',
        ];

        // Itera a través de los roles y modelos para validar
        foreach ($roles as $rol => $modelo) {
            $r = $modelo::validar($data); // Llama al método de validación del modelo
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
        header("Location: /PROYECTO_SENNOVA");
    }
}
