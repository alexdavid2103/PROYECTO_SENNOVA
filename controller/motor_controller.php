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
            "tipoFK" => $add_mot_tipoFK,
        );

        // Llamar a la función estática add en el modelo motor_modelo
        $r = motor_model::add($data);

        if ($r) {
            echo json_encode(array("mensaje" => "Se registró", "estado" => 1));
        } else {
            echo json_encode(array("mensaje" => "Error al registrar", "estado" => 0));
        }
    }
    // Función para agregar un motor a la base de datos
    public function edit()
    {
        extract($_POST); // Extraer los datos del formulario POST

        // Crear un arreglo asociativo con los datos del motor
        $data = array(
            "empresaFK" => $edit_mot_empresaFK,
            "ubicacionFK" => $edit_mot_ubicacionFK,
            "serie" => $edit_mot_serie,
            "normaFK" => $edit_mot_normaFK,
            "polos" => $edit_mot_polos,
            "potencia" => $edit_mot_potencia,
            "IpIn" => $edit_mot_IpIn,
            "par_arranque" => $edit_mot_par_arranque,
            "par_maxima" => $edit_mot_par_maxima,
            "mom_inercia" => $edit_mot_mom_inercia,
            "tiempo_rotor_bloq" => $edit_mot_tiempo_rotor_bloq,
            "peso" => $edit_mot_peso,
            "niv_ruido" => $edit_mot_niv_ruido,
            "factor_servicio" => $edit_mot_factor_servicio,
            "rotacion_nominal" => $edit_mot_rotacion_nominal,
            "corriente_nominal" => $edit_mot_corriente_nominal,
            "altitud" => $edit_mot_altitud,
            "temp_ambiente" => $edit_mot_temp_ambiente,
            "proteccion" => $edit_mot_proteccion,
            "carcasaId" => $edit_mot_carcasaId,
            "carcasaNombre" => $edit_mot_carcasaNombre,
            "carcasaValor" => $edit_mot_carcasaValor,
            "eficienciaId" => $edit_mot_eficienciaId,
            "eficienciaPorcentaje" => $edit_mot_eficienciaPorcentaje,
            "eficienciaValor" => $edit_mot_eficienciaValor,
            "fac_potenciaId" => $edit_mot_fac_potenciaId,
            "fac_potenciaPorcentaje" => $edit_mot_fac_potenciaPorcentaje,
            "fac_potenciaValor" => $edit_mot_fac_potenciaValor,
            "tecnicoFK" => $edit_mot_tecnicoFK,
            "tipoFK" => $edit_mot_tipoFK,
        );

        // Llamar a la función estática add en el modelo motor_modelo
        $r = motor_model::edit($data);

        if ($r) {
            echo json_encode(array("mensaje" => "Se Edito", "estado" => 1));
        } else {
            echo json_encode(array("mensaje" => "Error al Editar", "estado" => 0));
        }
    }

    // Función para eliminar un motor de la base de datos
    public function delete()
    {
        if (isset($_POST["id"])) {

            $data = array(
                "id" => $_POST["id"],
            );

            // Llamar a la función estática delete en el modelo tecnico_modelo
            $r = motor_model::delete($data);

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