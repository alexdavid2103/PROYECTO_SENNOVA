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
        $this->obj->setLoadHeaderFooter(false);
        // Cargar la plantilla de vista "empresa/index"
        $this->obj->loadTemplate("empresa/index");
    }
    public function ubicacionMotor()
    {
        $this->obj->setLoadHeaderFooter(false);
        // Cargar la plantilla de vista "empresa/index"
        $this->obj->loadTemplate("empresa/ubicacion_motor");
    }

    // Función para agregar una empresa a la base de datos
    public function add()
    {
        // Obtener los datos del formulario POST
        $url = "?controller=empresa&action=ubicacionMotor";

        $id = $_POST['add_emp_id'];
        $nombre = $_POST['add_emp_nombre'];
        $correo = $_POST['add_emp_correo'];
        $telefono = $_POST['add_emp_telefono'];
        $direccion = $_POST['add_emp_direccion'];
        $municipio = $_POST['add_emp_municipio'];
        // Crear un arreglo asociativo con los datos de la empresa
        $data = [
            "id" => $id,
            "nombre" => $nombre,
            "correo" => $correo,
            "telefono" => $telefono,
            "direccion" => $direccion,
            "municipio" => $municipio
        ];

        // Llamar a la función estática add en el modelo empresa_modelo
        $r = empresa_model::add($data);

        if ($r > 0) {
            // Si se registró correctamente, inicia sesión automáticamente con los datos registrados
            $_SESSION['id'] = $id;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['correo'] = $correo;
            $_SESSION['apellido'] = "";
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
        // Crear un arreglo asociativo con los datos actualizados de la empresa
        $data = [
            "nombre" => $_POST["edit_emp_nombre"],
            "correo" => $_POST["edit_emp_correo"],
            "telefono" => $_POST["edit_emp_telefono"],
            "direccion" => $_POST["edit_emp_direccion"],
            "municipio" => $_POST["edit_emp_municipio"],
            "id" => $_POST["edit_emp_id"],
        ];

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
        if (isset($_GET["id"])) {
            $id = $_GET["id"];

            // Llamar a la función estática delete en el modelo empresa_modelo
            $r = empresa_model::delete($id);

            if ($r) {
                echo json_encode(["mensaje" => "Se eliminó", "estado" => 1]);
            } else {
                echo json_encode(["mensaje" => "Error al eliminar", "estado" => 0]);
            }
        } else {
            echo json_encode(["mensaje" => "ID no encontrado", "estado" => 2]);
        }
    }

    // Función para agregar una empresa a la base de datos
    public function addUbicacionMotor()
    {
        // Verificar si $_SESSION["id"] está definido y no es nulo
        if (isset($_SESSION["id"]) && $_SESSION["id"] !== null) {
            $empresaId = $_SESSION["id"]; // Obtener el ID de la empresa de la sesión

            $url = "?controller=dashboard&action=index";

            $estado = 0; // Estado de validación inicial en 0
            $mensaje = "Error al registrar"; // Mensaje de error por defecto

            // Si se proporciona un array_resultante válido desde JavaScript
            if (isset($_POST['array_resultante'])) {
                $array_resultante = json_decode($_POST['array_resultante']);

                // Recorre el array y registra cada ubicación en la base de datos
                foreach ($array_resultante as $ubicacion) {
                    $data = [
                        'ubimot_area' => $ubicacion,
                        // Asigna el valor de ubicación del array
                        'ubimot_empresaFK' => $empresaId // Agrega el ID de la empresa al campo correspondiente
                    ];

                    // Llamar a la función estática addUbicacionMotor en el modelo empresa_modelo
                    $r = empresa_model::addUbicacionMotor($data);

                    if ($r > 0) {
                        $estado = 1; // Cambia el estado de validación a 1 (validado)
                        $mensaje = "Se registraron las ubicaciones correctamente"; // Mensaje de éxito
                    } else {
                        $estado = 0; // Estado de validación en 0 (no validado)
                        $mensaje = "Error al registrar las ubicaciones"; // Mensaje de error
                        break; // Sale del bucle si hay un error en la inserción
                    }
                }
            } else {
                $mensaje = "No se proporcionaron ubicaciones válidas"; // Mensaje de error si no se proporciona un array válido
            }

            // Preparar la respuesta en formato JSON
            $response = array(
                "mensaje" => $mensaje,
                "estado" => $estado,
                "url" => $url,
            );

            // Enviar la respuesta como JSON
            echo json_encode($response);
        } else {
            $mensaje = "No se ha iniciado sesión o no se encontró el ID de la empresa"; // Mensaje de error si no hay sesión o no se encuentra el ID de la empresa

            // Preparar la respuesta de error en formato JSON
            $response = [
                "mensaje" => $mensaje,
                "estado" => 0,
                // Estado de error en 0
                // "url" => $url,
            ];

            // Enviar la respuesta de error como JSON
            echo json_encode($response);
        }
    }

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
                    "nombre" => $emp_nombre,
                    "correo" => $emp_correo,
                    "telefono" => $emp_telefono,
                    "direccion" => $emp_direccion,
                    "municipio" => $emp_municipio,
                    "image" => $nombre_foto
                ];

                $r = empresa_model::updateInfo($data);

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

    public function versionPHP()
    {
        echo phpinfo();
    }
}
