<?php
require_once "modelo/cliente_modelo.php";
require_once "modelo/tecnico_modelo.php";
require_once "modelo/admin_modelo.php";

class cliente_controller
{
    // Constructor de la clase, inicializa un objeto de la clase template
    function __construct()
    {
        $this->obj = new template();
    }

    // Función para cargar la vista principal de cliente
    public function index()
    {
        // Cargar la plantilla de vista "cliente/index"
        $this->obj->loadTemplate("cliente/index");
    }

    // Función para agregar un cliente a la base de datos
    public function add()
    {
        extract($_POST); // Extraer los datos del formulario POST

        // Crear un array con los datos del cliente
        $data = array(
            "id" => $id,
            "nombre1" => $nombre1,
            "nombre2" => $nombre2,
            "apellido1" => $apellido1,
            "apellido2" => $apellido2,
            "correo" => $correo,
            "telefono" => $telefono,
            "direccion" => $direccion,
            "password" => $id,
            "municipioFK" => $municipioFK,
        );

        // Llamar a la función estática add en el modelo cliente_modelo
        $result = cliente_modelo::add($data);

        if ($result > 0) {
            echo json_encode(array("mensaje" => "Se registró", "estado" => 1));
        } else {
            echo json_encode(array("mensaje" => "Error al registrar", "estado" => 2));
        }
    }

    // Función para editar un cliente en la base de datos
    public function edit()
    {
        extract($_POST); // Extraer los datos del formulario POST

        // Crear un array con los datos del cliente
        $data = array(
            "id" => $id,
            "nombre1" => $nombre1,
            "nombre2" => $nombre2,
            "apellido1" => $apellido1,
            "apellido2" => $apellido2,
            "correo" => $correo,
            "telefono" => $telefono,
            "direccion" => $direccion,
            "municipioFK" => $municipioFK,
            "estadoFK" => $estadoFK
        );

        // Llamar a la función estática edit en el modelo cliente_modelo
        $result = cliente_modelo::edit($data);

        if ($result > 0) {
            echo json_encode(array("mensaje" => "Se actualizó correctamente", "estado" => 1));
        } else {
            echo json_encode(array("mensaje" => "Error al actualizar", "estado" => 2));
        }
    }

    // Función para eliminar un cliente de la base de datos
    public function delete()
    {
        if (isset($_POST["id"])) {
            $id = $_POST["id"];

            // Llamar a la función estática delete en el modelo cliente_modelo
            $result = cliente_modelo::delete($id);

            if ($result) {
                echo json_encode(array("mensaje" => "Se eliminó", "estado" => 1));
            } else {
                echo json_encode(array("mensaje" => "Error al eliminar", "estado" => 0));
            }
        } else {
            echo json_encode(array("mensaje" => "ID no encontrado", "estado" => 2));
        }
    }

    // Función para validar un cliente
    public function validar()
    {
        extract($_POST); // Extraer los datos del formulario POST

        $data["id"] = $id;
        $data["password"] = $password;

        // Llamar a la función estática validar en el modelo cliente_modelo
        $r = cliente_modelo::validar($data);

        if (is_array($r)) {
            // Almacenar los datos del cliente en variables de sesión
            $_SESSION['id'] = $r["cli_id"];
            $_SESSION['rol'] = "cliente";
            $_SESSION['nombre'] = $r["cli_nombre1"];
            $_SESSION['apellido'] = $r["cli_apellido1"];
            $mensaje = "";
            $estado = 1;
            $url = "?controller=main&action=index"; // Redirigir a la página principal
        } else {
            // Si la validación no tiene éxito, mostrar mensaje de error
            $mensaje = "Usuario/Password incorrectos";
            $estado = 2;
            $url = ""; // Mantener en la misma página sin redireccionar
        }

        // Devolver una respuesta en formato JSON con información sobre el estado y redirección
        echo json_encode(
            array(
                "mensaje" => $mensaje,
                "estado" => $estado,
                "url" => $url
            )
        );
    }

    // Función para cerrar sesión
    public function salir()
    {
        session_destroy();
        header("Location: /PROYECTO_SENNOVA");
    }
}
