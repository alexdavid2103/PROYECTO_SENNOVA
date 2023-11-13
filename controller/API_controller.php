<?php
require_once "model/tecnico_model.php";
require_once "model/empresa_model.php";
require_once "model/motor_model.php";
class API_controller
{

    // public function GetMunicipios()
    // {
    //     $id = $_GET["id"];
    //     $municipios = empresa_model::listarMunicipios($id);
    //     echo json_encode($municipios);
    // }

    public function getTecnicos()
    {
        $id = $_GET["id"];
        $tecnicos = tecnico_model::getTecnicoById($id);
        echo json_encode($tecnicos);
    }

    public function getUbicaciones()
    {
        $id = $_GET["id"];
        $ubicaciones = motor_model::getUbicacionById($id);
        echo json_encode($ubicaciones);
    }

    public function getDataMotores() {
        $id = $_GET["serie"];
        $data = motor_model::getMotorById($id);
        echo json_encode($data);
    }
}
?>