<?php
require_once "model/admin_modelo.php";
class admin_controller
{

    // Función para agregar un administrador a la base de datos
    public function add()
    {
        extract($_POST); // Extraer los datos del formulario POST

        $data["nombre"] = $nombre;
        $data["contraseña"] = $id;
        $data["id"] = $id;

        // Llamar a la función estática add en el modelo admin_modelo
        $r = admin_modelo::add($data);

        if ($r > 0) {
            echo json_encode(array("mensaje" => "Se registró", "estado" => 1));
        } else {
            echo json_encode(array("mensaje" => "Error al registrar", "estado" => 2));
        }
    }

    // Función para editar un administrador en la base de datos
    public function edit()
    {
        extract($_POST); // Extraer los datos del formulario POST

        $data["nombre"] = $nombre;
        $data["contraseña"] = $contraseña;
        $data["id"] = $id;

        // Llamar a la función estática edit en el modelo admin_modelo
        $r = admin_modelo::edit($data);

        if ($r > 0) {
            echo json_encode(array("mensaje" => "Se actualizó correctamente", "estado" => 1));
        } else {
            echo json_encode(array("mensaje" => "Error al actualizar", "estado" => 2));
        }
    }

    // Función para eliminar un administrador de la base de datos
    public function delete()
    {
        if (isset($_POST["id"])) {
            $id = $_POST["id"];

            // Llamar a la función estática delete en el modelo admin_modelo
            $r = admin_modelo::delete($id);

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
