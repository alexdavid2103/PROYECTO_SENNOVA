<?php
require_once "model/tecnico_model.php";
class tecnico_controller
{
    // Constructor de la clase, inicializa un objeto de la clase template
    function __construct()
    {
        $this->obj = new template();
    }

    // Función para cargar la vista principal de tecnico
    public function index()
    {
        // Cargar la plantilla de vista "tecnico/index"
        $this->obj->loadTemplate("tecnico/index");
    }

    // Función para agregar un técnico a la base de datos
    public function add()
    {
        extract($_POST); // Extraer los datos del formulario POST

        $data = array(
            "id" => $add_tec_id,
            "nombre1" => $add_tec_nombre1,
            "nombre2" => $add_tec_nombre2,
            "apellido1" => $add_tec_apellido1,
            "apellido2" => $add_tec_apellido2,
            "correo" => $add_tec_correo,
            "telefono" => $add_tec_telefono,
            "direccion" => $add_tec_direccion,
            "empresa" => $add_tec_empresa,
        );

        // Llamar a la función estática add en el modelo tecnico_modelo
        $r = tecnico_model::add($data);

        if ($r > 0) {
            echo json_encode(array("mensaje" => "Se registró", "estado" => 1));
        } else {
            echo json_encode(array("mensaje" => "Error al registrar", "estado" => 2));
        }
    }

    // Función para editar un técnico en la base de datos
    public function edit()
    {
        extract($_POST); // Extraer los datos del formulario POST

        $data["empresa"] = $empresa;
        $data["nombre"] = $nombre;
        $data["apellido"] = $apellido;
        $data["direccion"] = $direccion;
        $data["telefono"] = $telefono;
        $data["registro"] = $registro;
        $data["id"] = $id;

        // Llamar a la función estática edit en el modelo tecnico_modelo
        $r = tecnico_model::edit($data);

        if ($r > 0) {
            echo json_encode(array("mensaje" => "Se actualizó correctamente", "estado" => 1));
        } else {
            echo json_encode(array("mensaje" => "Error al actualizar", "estado" => 2));
        }
    }

    // Función para eliminar un técnico de la base de datos
    public function delete()
    {
        if (isset($_POST["id"])) {
            $id = $_POST["id"];

            // Llamar a la función estática delete en el modelo tecnico_modelo
            $r = tecnico_model::delete($id);

            if ($r) {
                echo json_encode(array("mensaje" => "Se eliminó", "estado" => 1));
            } else {
                echo json_encode(array("mensaje" => "Error al eliminar", "estado" => 0));
            }
        } else {
            echo json_encode(array("mensaje" => "ID no encontrado", "estado" => 2));
        }
    }
}
?>