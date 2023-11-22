<link rel="stylesheet" href="public/css/modal.css">
<link rel="stylesheet" href="public/css/motor.css">


<?php if ($_SESSION["rol"] !== "tec") {
    echo '<div class="row">
        <div class="col-lg-12">
            <h2 class="title-1 m-b-25 text-sm-center">Motores registrados</h2>
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                        <tr>
                            <th>Serie</th>';

    if ($_SESSION['rol'] === 'adm') {
        echo '<th>Empresa</th>';
    }
    if ($_SESSION['rol'] !== 'tec') {
        echo ' <th>Tecnico</th>';
    }
    echo '
                            <th>Ubicación</th>
                            <th>Estado</th>
                            <th>Registro</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>';
    foreach ($this->motores as $motor) {
        if ($_SESSION['rol'] === 'adm' || $motor['infmot_empresaFK'] === $_SESSION['id'] || $motor['infmot_tecnicoFK'] === $_SESSION['id']) {
            echo '<tr>';
            echo '<td>' . $motor["infmot_serie"] . '</td>';
            if ($_SESSION['rol'] === 'adm') {
                echo '<td>';
                foreach ($this->empresas as $empresa) {
                    if ($empresa["emp_id"] === $motor["infmot_empresaFK"]) {
                        echo $empresa["emp_nombre"];
                    }
                }
                echo '</td>';
            }
            if ($_SESSION['rol'] !== 'tec') {
                echo '<td>';
                $asignado = false;

                foreach ($this->tecnicos as $tecnico) {
                    if ($tecnico["tec_id"] === $motor["infmot_tecnicoFK"]) {
                        echo $tecnico["tec_nombre1"] . ' ' . $tecnico["tec_apellido1"];
                        $asignado = true;
                        break;
                    }
                }

                if (!$asignado) {
                    echo "No asignado";
                }
                echo '</td>';
            }
            echo '<td>';
            foreach ($this->ubicaciones as $ubicacion) {
                if ($motor["infmot_ubicacionFK"] === $ubicacion["ubimot_id"]) {
                    echo $ubicacion["ubimot_area"];
                }
            }
            echo '</td>';
            echo '<td>';
            foreach ($this->estados as $estado) {
                if ($motor["infmot_estadoFK"] === $estado["est_id"]) {
                    echo $estado["est_nombre"];
                }
            }
            echo '</td>';
            echo '<td>' . $motor["infmot_registro"] . '</td>';
            echo '<td> <button class="editMotorButton openFormEditMotor"
                                    data-empresaFK = "' . $motor["infmot_empresaFK"] . '"
                                    data-ubicacionFK = "' . $motor["infmot_ubicacionFK"] . '"
                                    data-serie = "' . $motor["infmot_serie"] . '"
                                    data-normaFK = "' . $motor["infmot_normaFK"] . '"
                                    data-polos = "' . $motor["infmot_polos"] . '"
                                    data-potencia = "' . $motor["infmot_potencia"] . '"
                                    data-IpIn = "' . $motor["infmot_IpIn"] . '"
                                    data-par_arranque = "' . $motor["infmot_par_arranque"] . '"
                                    data-par_maxima = "' . $motor["infmot_par_maxima"] . '"
                                    data-mom_inercia = "' . $motor["infmot_mom_inercia"] . '"
                                    data-tiempo_rotor_bloq = "' . $motor["infmot_tiempo_rotor_bloq"] . '"
                                    data-peso = "' . $motor["infmot_peso"] . '"
                                    data-niv_ruido = "' . $motor["infmot_niv_ruido"] . '"
                                    data-factor_servicio = "' . $motor["infmot_factor_servicio"] . '"
                                    data-rotacion_nominal = "' . $motor["infmot_rotacion_nominal"] . '"
                                    data-corriente_nominal = "' . $motor["infmot_corriente_nominal"] . '"
                                    data-altitud = "' . $motor["infmot_altitud"] . '"
                                    data-temp_ambiente = "' . $motor["infmot_temp_ambiente"] . '"
                                    data-proteccion = "' . $motor["infmot_proteccion"] . '"
                                    data-carcasaId = "';
            foreach ($this->motorCarcasa as $carcasa) {
                if ($carcasa["carmot_id"] === $motor["infmot_carcasaFK"]) {
                    echo $carcasa["carmot_id"];
                }
            }
            echo '"
                                    data-carcasaNombre = "';
            foreach ($this->motorCarcasa as $carcasa) {
                if ($carcasa["carmot_id"] === $motor["infmot_carcasaFK"]) {
                    echo $carcasa["carmot_nombre"];
                }
            }
            echo '"
                                    data-carcasaValor = "';
            foreach ($this->motorCarcasa as $carcasa) {
                if ($carcasa["carmot_id"] === $motor["infmot_carcasaFK"]) {
                    echo $carcasa["carmot_valor"];
                }
            }
            echo '"
                                    data-eficienciaId = "';
            foreach ($this->motorEficiencia as $eficiencia) {
                if ($eficiencia["efimot_id"] === $motor["infmot_eficienciaFK"]) {
                    echo $eficiencia["efimot_id"];
                }
            }
            echo '"
                                    data-eficienciaPorcentaje = "';
            foreach ($this->motorEficiencia as $eficiencia) {
                if ($eficiencia["efimot_id"] === $motor["infmot_eficienciaFK"]) {
                    echo $eficiencia["efimot_porcentajeFK"];
                }
            }
            echo '"
                                    data-eficienciaValor = "';
            foreach ($this->motorEficiencia as $eficiencia) {
                if ($eficiencia["efimot_id"] === $motor["infmot_eficienciaFK"]) {
                    echo $eficiencia["efimot_valor"];
                }
            }
            echo '"
                                    data-fac_potenciaId = "';
            foreach ($this->motorFacPotencia as $facPotencia) {
                if ($facPotencia["facpotmot_id"] === $motor["infmot_fac_potenciaFK"]) {
                    echo $facPotencia["facpotmot_id"];
                }
            }
            echo '"
                                    data-fac_potenciaPorcentaje = "';
            foreach ($this->motorFacPotencia as $facPotencia) {
                if ($facPotencia["facpotmot_id"] === $motor["infmot_fac_potenciaFK"]) {
                    echo $facPotencia["facpotmot_porcentajeFK"];
                }
            }
            echo '"
                                    data-fac_potenciaValor = "';
            foreach ($this->motorFacPotencia as $facPotencia) {
                if ($facPotencia["facpotmot_id"] === $motor["infmot_fac_potenciaFK"]) {
                    echo $facPotencia["facpotmot_porcentajeFK"];
                }
            }
            echo '"
                                    data-tecnicoFK = "' . $motor["infmot_tecnicoFK"] . '"
                                    data-tipoFK = "' . $motor["infmot_tipoFK"] . '"
                                >Editar</button> </td>';
            echo '<td> <button class="deleteMotorButton" data-id="' . $motor['infmot_serie'] . '">Eliminar</button> </td>';
            echo '</tr>';
        }
    }
    echo '</tbody>
                </table>
            </div>
        </div>
    </div>';
} ?>

<div class="cont_charts">
    <?php foreach ($this->motores as $captura) {
        if ($captura['infmot_empresaFK'] === $_SESSION['id'] || $_SESSION['rol'] === 'adm' || $captura['infmot_tecnicoFK'] === $_SESSION['id']) {
            echo '<div class="charts m-auto">
            <h2 class="">' . $captura['infmot_serie'] . '</h2>
            <div class="flex-box">
            <div class="chart_temperatura" data-serie="' . $captura['infmot_serie'] . '" style="width: 375px; height: 200px;"></div>
            <div class="chart_vibracion" data-serie="' . $captura['infmot_serie'] . '" style="width: 375px; height: 200px;"></div>
            </div>
            </div>';
        }
    } ?>
</div>
<button class="open-button" id="open-button">Agregar Motor</button>
<div class="cont_form cont_form_add_motor">
    <div class="window-background" id="window-background">
        <div class="window-container" id="window-container">
            <button class="close-button" id="close-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon-x">
                    <path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path>
                </svg>
            </button>
            <?php if ($_SESSION["rol"] !== "tec") {
                include("view/motor/formAddMotor.php");
            } ?>
        </div>
    </div>

</div>

<div class="cont_form cont_form_edit_motor">
    <?php if ($_SESSION["rol"] !== "tec") {
        include("view/motor/formEditMotor.php");
    } ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>;
<script type="module" src="public/js/motores.js"></script>
<script src="public/js/modal.js"></script>
<script src="public/js/formMotorAdd.js"></script>
<script src="public/js/formMotorEdit.js"></script>
<script src="public/js/graficos.js"></script>
<script src="public/js/filtroTecnicos.js"></script>
<script src="public/js/filtroUbicaciones.js"></script>
<script src="public/js/dataFormEditMotor.js"></script>