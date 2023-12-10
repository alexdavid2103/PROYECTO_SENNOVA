<?php
require_once "model/admin_model.php";
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
        $r = admin_model::add($data);

        if ($r > 0) {
            echo json_encode(array("mensaje" => "Se registró", "estado" => 1));
        } else {
            echo json_encode(array("mensaje" => "Error al registrar", "estado" => 2));
        }
    }

    // Función para editar un administrador en la base de datos
    public function updateInfo()
    {
        extract($_POST); // Extraer los datos del formulario POST
        $url = "?controller=main&action=login";
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $nombre_foto = $_FILES['imagen']['name'];
            $archivo = $_FILES['imagen']['tmp_name'];
            if (move_uploaded_file($archivo, "public/userImages/$nombre_foto")) {
                $data = [
                    "id" => $_SESSION["id"],
                    "nombre1" => $adm_nombre1,
                    "nombre2" => $adm_nombre2,
                    "apellido1" => $adm_apellido1,
                    "apellido2" => $adm_apellido2,
                    "correo" => $adm_correo,
                    "telefono" => $adm_telefono,
                    "image" => $nombre_foto
                ];

                $r = admin_model::updateInfo($data);

                if ($r > 0) {
                    session_destroy();
                    echo json_encode(array("mensaje" => "Se actualizó correctamente", "estado" => 1, "url" => $url));
                } else {
                    echo json_encode(array("mensaje" => "Error al actualizar", "estado" => 2));
                }
            } else {
                echo json_encode(array("mensaje" => "ERROR: No se pudo mover el archivo", "estado" => 3));
            }
        } else {
            echo json_encode(array("mensaje" => "ERROR: No se seleccionó ningún archivo", "estado" => 4));
        }
    }

    // Función para eliminar un administrador de la base de datos
    public function delete()
    {
        if (isset($_POST["id"])) {
            $id = $_POST["id"];

            // Llamar a la función estática delete en el modelo admin_modelo
            $r = admin_model::delete($id);

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
