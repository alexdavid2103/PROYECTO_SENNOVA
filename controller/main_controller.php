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

    public function registro()
    {
        if (isset($_SESSION['id'])) {
            header("Location: index.php");
            exit();
        }

        $this->obj->departamentos = empresa_model::listarDepartamentos();
        $this->obj->municipios = empresa_model::listarMunicipios(5);
        // Cargar la plantilla de vista "main/registro"
        $this->obj->loadTemplate("main/registro");
    }

    public function recoverPassword()
    {
        if (isset($_SESSION['id'])) {
            header("Location: index.php");
            exit();
        }

        $this->obj->departamentos = empresa_model::listarDepartamentos();
        $this->obj->municipios = empresa_model::listarMunicipios(5);
        // Cargar la plantilla de vista "main/contrasena"
        $this->obj->loadTemplate("main/recoverPassword");
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
                    $model === $roles['emp'] ? $_SESSION['nombre'] = $r["{$rol}_nombre"] : $_SESSION['nombre'] = $r["{$rol}_nombre1"];
                    $model === $roles['emp'] ? $_SESSION['apellido'] = "" : $_SESSION['apellido'] = $r["{$rol}_apellido1"];
                    $_SESSION['rol'] = $rol;
                    $_SESSION['correo'] = $r["{$rol}_correo"];
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

    public function rPassword()
    {
        // Acceder directamente a los datos del formulario en lugar de extraerlos
        $id = $_POST['id'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $mensaje = ""; // Mensaje de error por defecto
        $estado = 0; // Estado de validación (0 para no validado, 1 para validado)
        $url = "?controller=main&action=login"; // Valor por defecto para URL de redirección

        $roles = [
            'adm' => 'admin_model',
            'tec' => 'tecnico_model',
            'emp' => 'empresa_model'
        ];

        $resultados = [];

        foreach ($roles as $rol => $model) {
            // Asegurarse de pasar los datos correctos al método recoverPassword de cada modelo
            $data = array(
                "id" => $id,
                "email" => $email,
                "password" => $password,
            );
            $r = $model::recoverPassword($data);

            // Revisar la lógica de verificación para manejar adecuadamente los resultados de recoverPassword
            if ($r) {
                $estado = 1;
                $resultados[$rol] = $r;
            }
        }

        if ($estado === 1) {
            echo json_encode(
                array(
                    "mensaje" => $mensaje,
                    "estado" => $estado,
                    "url" => $url,
                    "resultados" => $resultados
                )
            );
        } else {
            $mensaje = "No se encontró ningún resultado en la base de datos";
            echo json_encode(
                array(
                    "mensaje" => $mensaje
                )
            );
        }
    }

    public function updatePassword()
    {
        $mensaje = "";
        $estado = 0;
        $url = "";

        // Verificar si se enviaron los datos necesarios
        if (isset($_POST["currentPassword"], $_POST["newPassword"])) {
            // Obtener los datos del formulario
            $data = array(
                "currentPassword" => $_POST["currentPassword"],
                "newPassword" => $_POST["newPassword"],
                "id" => $_SESSION["id"],
            );

            // Realizar la actualización de la contraseña basado en el rol del usuario
            switch ($_SESSION["rol"]) {
                case "adm":
                    $r = admin_model::updatePassword($data);
                    break;
                case "emp":
                    $r = empresa_model::updatePassword($data);
                    break;
                case "tec":
                    $r = tecnico_model::updatePassword($data);
                    break;
                default:
                    $mensaje = "Rol desconocido";
                    break;
            }

            // Verificar el resultado de la actualización
            if ($r) {
                $estado = 1;
                $url = "?controller=main&action=login";
                $mensaje = "Se actualizó la contraseña";
            } else {
                $mensaje = "Error al actualizar la contraseña";
            }

            // Manejar la respuesta y destruir la sesión si la actualización fue exitosa
            if ($estado === 1) {
                session_destroy();
                echo json_encode([
                    "mensaje" => $mensaje,
                    "estado" => $estado,
                    "url" => $url
                ]);
            } else {
                echo json_encode([
                    "mensaje" => $mensaje,
                    "estado" => $estado,
                    "url" => $url
                ]);
            }
        } else {
            // Si faltan datos en el formulario
            $mensaje = "Datos incompletos";
            echo json_encode(["mensaje" => $mensaje]);
        }
    }



    public function salir()
    {
        session_destroy();
        header("Location: ?controller=main&action=index");
    }
}
