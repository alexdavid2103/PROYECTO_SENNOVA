<?php
require_once "model/motor_model.php";
require_once "model/empresa_model.php";
require_once "model/tecnico_model.php";

class motor_controller
{
    // Constructor de la clase, inicializa un objeto de la clase template
    function __construct()
    {
        $this->obj = new template();
    }

    // Función para cargar la vista principal de motores
    public function index()
    {
        // if (!isset($_SESSION['id'])) {
        //     header("Location: /PROYECTO_SENOVA");
        //     exit();
        // }
        $this->obj->motores = motor_model::listarMotorInfo();
        $this->obj->capturas = motor_model::listarMotorCaptura();
        $this->obj->clientes = empresa_model::listarEmpresas();
        // $this->obj->tecnicos = tecnico_model::listar();
        // Cargar la plantilla de vista "motor/index"
        $this->obj->loadTemplate("motor/index");
    }

    // Función para agregar un motor a la base de datos
    public function add()
    {
        extract($_POST); // Extraer los datos del formulario POST

        // Crear un arreglo asociativo con los datos del motor
        $data = array(
            "serie" => $infmot_serie,
            "norma" => $infmot_norma,
            "polos" => $infmot_polos,
            "potencia" => $infmot_potencia,
            "IpIn" => $infmot_IpIn,
            "par_arranque" => $infmot_par_arranque,
            "par_maxima" => $infmot_par_maxima,
            "mom_inercia" => $infmot_mom_inercia,
            "tiempo_rotor_bloq" => $infmot_tiempo_rotor_bloq,
            "peso" => $infmot_peso,
            "niv_ruido" => $infmot_niv_ruido,
            "factor_servicio" => $infmot_factor_servicio,
            "rotacion_nominal" => $infmot_rotacion_nominal,
            "corriente_nominal" => $infmot_corriente_nominal,
            "altitud" => $infmot_altitud,
            "regimen" => $infmot_regimen,
            "temp_ambiente" => $infmot_temp_ambiente,
            "proteccion" => $infmot_proteccion,
            "carcasaFK" => $infmot_carcasaFK,
            "eficienciaFK" => $infmot_eficienciaFK,
            "fac_potenciaFK" => $infmot_fac_potenciaFK,
            "clienteFK" => $infmot_clienteFK,
            "tecnicoFK" => $infmot_tecnicoFK,
        );

        // Llamar a la función estática add en el modelo motor_modelo
        $r = motor_model::add($data);

        if ($r) {
            echo json_encode(array("mensaje" => "Se registró", "estado" => 1));
        } else {
            echo json_encode(array("mensaje" => "Error al registrar", "estado" => 0));
        }
    }

    // Función para editar los datos de un motor en la base de datos
    public function edit()
    {
        extract($_POST); // Extraer los datos del formulario POST

        // Crear un arreglo asociativo con los datos actualizados del motor
        $data = array(
            "serie" => $infmot_serie,
            "norma" => $infmot_norma,
            "frecuencia" => $infmot_frecuencia,
            "vol_nominal" => $infmot_vol_nominal,
            "polos" => $infmot_polos,
            "potencia" => $infmot_potencia,
            "IpIn" => $infmot_IpIn,
            "par_arranque" => $infmot_par_arranque,
            "par_maxima" => $infmot_par_maxima,
            "mom_inercia" => $infmot_mom_inercia,
            "tiempo_rotor_bloq" => $infmot_tiempo_rotor_bloq,
            "peso" => $infmot_peso,
            "niv_ruido" => $infmot_niv_ruido,
            "factor_servicio" => $infmot_factor_servicio,
            "rotacion_nominal" => $infmot_rotacion_nominal,
            "corriente_nominal" => $infmot_corriente_nominal,
            "altitud" => $infmot_altitud,
            "regimen" => $infmot_regimen,
            "temp_ambiente" => $infmot_temp_ambiente,
            "proteccion" => $infmot_proteccion,
            "carcasaFK" => $infmot_carcasaFK,
            "eficienciaFK" => $infmot_eficienciaFK,
            "fac_potenciaFK" => $infmot_fac_potenciaFK,
            "clienteFK" => $infmot_clienteFK,
            "tecnicoFK" => $infmot_tecnicoFK,
            "estadoFK" => $infmot_estadoFK,
        );

        // Llamar a la función estática edit en el modelo motor_modelo
        $r = motor_model::edit($data);

        if ($r) {
            echo json_encode(array("mensaje" => "Se actualizó correctamente", "estado" => 1));
        } else {
            echo json_encode(array("mensaje" => "Error al actualizar", "estado" => 0));
        }
    }

    // Función para eliminar un motor de la base de datos
    public function delete()
    {
        if (isset($_POST["id"])) {
            $serie = $_POST["id"];

            // Llamar a la función estática delete en el modelo motor_modelo
            $r = motor_model::delete($serie);

            if ($r) {
                echo json_encode(array("mensaje" => "Se eliminó", "estado" => 1));
            } else {
                echo json_encode(array("mensaje" => "Error al eliminar", "estado" => 0));
            }
        } else {
            echo json_encode(array("mensaje" => "ID no encontrado", "estado" => 2));
        }
    }

    public function graficas()
    {
        // Llamar a la función estática delete en el modelo motor_modelo
        $r = motor_model::graficas();
        $json = json_encode($r);
        echo $json;
    }
}
?>