<link rel="stylesheet" href="public/css/motor.css">

<div class="row">
    <div class="col-lg-12">
        <h2 class="title-1 m-b-25 text-sm-center">Motores registrados</h2>
        <div class="table-responsive table--no-card m-b-40">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>Serie</th>
                        <?php
                        if ($_SESSION['rol'] === 'adm') {
                            echo '<th>Empresa</th>';
                        }
                        if ($_SESSION['rol'] !== 'tec') {
                            echo ' <th>Tecnico</th>';
                        }
                        ?>
                        <th>Ubicación</th>
                        <th>Estado</th>
                        <th>Registro</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->motores as $motor) {
                        if ($_SESSION['rol'] === 'adm' || $motor['infmot_empresaFK'] === $_SESSION['id'] || $motor['infmot_tecnicoFK'] === $_SESSION['id']) {
                            echo '<tr>';
                            echo '<td>' . $motor["infmot_serie"] . '</td>';
                            if ($_SESSION['rol'] === 'adm') {
                                echo '<td>';
                                foreach ($this->empresas as $empresa) {
                                    if ($empresa["emp_id"] == $motor["infmot_empresaFK"]) {
                                        echo $empresa["emp_nombre"];
                                    }
                                }
                                echo '</td>';
                            }
                            if ($_SESSION['rol'] !== 'tec') {
                                echo '<td>';
                                foreach ($this->tecnicos as $tecnico) {
                                    if ($tecnico["tec_id"] == $motor["infmot_tecnicoFK"]) {
                                        echo $tecnico["tec_nombre1"] . ' ' . $tecnico["tec_apellido1"];
                                    }
                                }
                                echo '</td>';
                            }
                            echo '<td>';
                            foreach ($this->ubicaciones as $ubicacion) {
                                if ($motor["infmot_ubicacionFK"] == $ubicacion["ubimot_id"]) {
                                    echo $ubicacion["ubimot_area"];
                                }
                            }
                            echo '</td>';
                            echo '<td>';
                            foreach ($this->estados as $estado) {
                                if ($motor["infmot_estadoFK"] == $estado["est_id"]) {
                                    echo $estado["est_nombre"];
                                }
                            }
                            echo '</td>';
                            echo '<td>' . $motor["infmot_registro"] . '</td>';
                            echo '<td> <button value="' . $motor['infmot_serie'] . '" class="editMotorButton">Editar</button> </td>';
                            echo '</tr>';
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

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

<div class="cont_form cont_form_add_motor">
    <?php include("view/motor/formAddMotor.php") ?>
</div>

<div class="cont_form cont_form_edit_motor">
    <?php include("view/motor/formEditMotor.php") ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>;
<script type="module" src="public/js/motores.js"></script>
<script src="public/js/form.js"></script>
<script src="public/js/graficos.js"></script>
<script src="public/js/filtrosFormMotor.js"></script>