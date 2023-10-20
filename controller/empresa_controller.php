<?php
require_once "model/empresa_model.php";

class empresa_controller
{
    // Constructor de la clase, inicializa un objeto de la clase template
    function __construct()
    {
        $this->obj = new template();
    }

    // Función para cargar la vista principal de empresas
    public function index()
    {
        // Cargar la plantilla de vista "empresa/index"
        $this->obj->loadTemplate("empresa/index");
    }

    // Función para agregar una empresa a la base de datos
    public function add()
    {
        // Obtener los datos del formulario POST
        extract($_POST);
        $url = "?controller=dashboard&action=index";
        // Crear un arreglo asociativo con los datos de la empresa
        $data = array(
            "id" => $id,
            "nombre" => $nombre,
            "correo" => $correo,
            "telefono" => $telefono,
            "direccion" => $direccion,
            "municipio" => $municipio
        );

        // Llamar a la función estática add en el modelo empresa_modelo
        $r = empresa_model::add($data);

        if ($r > 0) {
            // Si se registró correctamente, inicia sesión automáticamente con los datos registrados
            $_SESSION['id'] = $id;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['rol'] = 'emp'; // Suponiendo que 'emp' es el rol para la empresa

            $estado = 1; // Cambia el estado de validación a 1 (validado)
            $mensaje = "Se registró"; // Mensaje de éxito
        } else {
            $estado = 0; // Estado de validación en 0 (no validado)
            $mensaje = "Error al registrar"; // Mensaje de error
        }

        // Preparar la respuesta en formato JSON
        $response = array(
            "mensaje" => $mensaje,
            "estado" => $estado,
            "url" => $url,
        );

        // Enviar la respuesta como JSON
        echo json_encode($response);
    }

    // Función para editar los datos de una empresa en la base de datos
    public function edit()
    {
        extract($_POST); // Extraer los datos del formulario POST

        // Crear un arreglo asociativo con los datos actualizados de la empresa
        $data["nombre"] = $nombre;
        $data["telefono"] = $telefono;
        $data["ceo"] = $ceo;

        // Llamar a la función estática edit en el modelo empresa_modelo
        $r = empresa_model::edit($data);

        if ($r > 0) {
            echo json_encode(array("mensaje" => "Se actualizó correctamente", "estado" => 1));
        } else {
            echo json_encode(array("mensaje" => "Error al actualizar", "estado" => 0));
        }
    }

    // Función para eliminar una empresa de la base de datos
    public function delete()
    {
        if (isset($_POST["id"])) {
            $id = $_POST["id"];

            // Llamar a la función estática delete en el modelo empresa_modelo
            $r = empresa_model::delete($id);

            if ($r) {
                echo json_encode(array("mensaje" => "Se eliminó", "estado" => 1));
            } else {
                echo json_encode(array("mensaje" => "Error al eliminar", "estado" => 0));
            }
        } else {
            echo json_encode(array("mensaje" => "ID no encontrado", "estado" => 2));
        }
    }

    public function APImunicipios()
    {
        $id = $_GET["id"];
        $municipios = empresa_model::listarMunicipios($id);
        echo json_encode($municipios);
    }
}
