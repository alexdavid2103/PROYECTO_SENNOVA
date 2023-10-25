<?php
require_once "model/motor_model.php";
require_once "model/empresa_model.php";
require_once "model/tecnico_model.php";

class dashboard_controller
{
    // Constructor de la clase, inicializa un objeto de la clase template
    function __construct()
    {
        $this->obj = new template();
    }

    // Función para cargar la vista principal de motores
    public function index()
    {
        if (!isset($_SESSION['id'])) {
            header("Location: /PROYECTO_SENNOVA");
            exit();
        }
        $this->obj->motores = motor_model::listarMotorInfo();
        $this->obj->estados = motor_model::listarMotorEstado();
        $this->obj->ubicaciones = motor_model::listarMotorUbicacion();
        $this->obj->porcentajes = motor_model::listarPorcentajes();
        $this->obj->tecnicos = tecnico_model::listarTecnicos();
        $this->obj->empresas = empresa_model::listarEmpresas();
        $this->obj->loadTemplate("dashboard/index");
    }
}