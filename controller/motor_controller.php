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

    // Función para agregar un motor a la base de datos
    public function add()
    {
        extract($_POST); // Extraer los datos del formulario POST

        // Crear un arreglo asociativo con los datos del motor
        $data = array(
            "empresaFK" => $add_mot_empresaFK,
            "ubicacionFK" => $add_mot_ubicacionFK,
            "serie" => $add_mot_serie,
            "normaFK" => $add_mot_normaFK,
            "polos" => $add_mot_polos,
            "potencia" => $add_mot_potencia,
            "IpIn" => $add_mot_IpIn,
            "par_arranque" => $add_mot_par_arranque,
            "par_maxima" => $add_mot_par_maxima,
            "mom_inercia" => $add_mot_mom_inercia,
            "tiempo_rotor_bloq" => $add_mot_tiempo_rotor_bloq,
            "peso" => $add_mot_peso,
            "niv_ruido" => $add_mot_niv_ruido,
            "factor_servicio" => $add_mot_factor_servicio,
            "rotacion_nominal" => $add_mot_rotacion_nominal,
            "corriente_nominal" => $add_mot_corriente_nominal,
            "altitud" => $add_mot_altitud,
            "temp_ambiente" => $add_mot_temp_ambiente,
            "proteccion" => $add_mot_proteccion,
            "carcasaNombre" => $add_mot_carcasaNombre,
            "carcasaValor" => $add_mot_carcasaValor,
            "eficienciaPorcentaje" => $add_mot_eficienciaPorcentaje,
            "eficienciaValor" => $add_mot_eficienciaValor,
            "fac_potenciaPorcentaje" => $add_mot_fac_potenciaPorcentaje,
            "fac_potenciaValor" => $add_mot_fac_potenciaValor,
            "tecnicoFK" => $add_mot_tecnicoFK,
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