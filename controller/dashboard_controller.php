<?php
require_once "model/motor_model.php";
require_once "model/empresa_model.php";
require_once "model/tecnico_model.php";
require_once "model/admin_model.php";

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
        $this->obj->setLoadHeaderFooter(false);
        $this->obj->motores = motor_model::listarMotorInfo();
        $this->obj->estados = motor_model::listarMotorEstado();
        $this->obj->ubicaciones = motor_model::listarMotorUbicacion();
        $this->obj->normas = motor_model::listarMotorNorma();
        $this->obj->porcentajes = motor_model::listarPorcentajes();
        $this->obj->tiposMotores = motor_model::listarMotorTipo();
        $this->obj->motorCarcasa = motor_model::listarMotorCarcasa();
        $this->obj->motorEficiencia = motor_model::listarMotorEficiencia();
        $this->obj->motorFacPotencia = motor_model::listarMotorFacPotencia();
        $this->obj->tecnicos = tecnico_model::listarTecnicos();
        $this->obj->empresas = empresa_model::listarEmpresas();
        $this->obj->municipios = empresa_model::listarMunicipios(8);
        $this->obj->loadTemplate("dashboard/index");
    }

    public function cuenta()
    {
        $this->obj->municipios = empresa_model::listarMunicipios(8);
        $this->obj->admins = admin_model::listarAdmins();
        $this->obj->empresas = empresa_model::listarEmpresas();
        $this->obj->tecnicos = tecnico_model::listarTecnicos();
        $this->obj->setLoadHeaderFooter(false);
        $this->obj->loadTemplate("dashboard/cuenta");
    }

    public function password()
    {
        $this->obj->setLoadHeaderFooter(false);
        $this->obj->loadTemplate("dashboard/password");
    }
}