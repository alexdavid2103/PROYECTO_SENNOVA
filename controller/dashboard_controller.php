<?php
require_once "modelo/motor_modelo.php";
require_once "modelo/empresa_modelo.php";
require_once "modelo/tecnico_modelo.php";

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
        // if (!isset($_SESSION['id'])) {
        //     header("Location: /PROYECTO_SENOVA");
        //     exit();
        // }
        $this->obj->motores = motor_modelo::listarMotorInfo();
        $this->obj->estados = motor_modelo::listarMotorEstado();
        $this->obj->tecnicos = tecnico_modelo::listarTecnicos();
        $this->obj->empresas = empresa_modelo::listarEmpresas();
        $this->obj->loadTemplate("dashboard/index");
    }

    // Función para cargar la vista de motores en el Dashboard
    public function empresas()
    {
        // if (!isset($_SESSION['id'])) {
        //     header("Location: /PROYECTO_SENOVA");
        //     exit();
        // }
        $this->obj->motores = motor_modelo::listarMotorInfo();
        $this->obj->estados = motor_modelo::listarMotorEstado();
        $this->obj->tecnicos = tecnico_modelo::listarTecnicos();
        $this->obj->empresas = empresa_modelo::listarEmpresas();
        $this->obj->loadTemplate("empresa/index");
    }

    // Función para cargar la vista principal de motores
    // public function index()
    // {
    //     // if (!isset($_SESSION['id'])) {
    //     //     header("Location: /PROYECTO_SENOVA");
    //     //     exit();
    //     // }
    //     $this->obj->motores = motor_modelo::listar();
    //     // $this->obj->empresa = empresa_modelo::listar();
    //     // $this->obj->tecnicos = tecnico_modelo::listar();
    //     // Cargar la plantilla de vista "motor/index"
    //     $this->obj->loadTemplate("dashboard/index");
    // }
}
