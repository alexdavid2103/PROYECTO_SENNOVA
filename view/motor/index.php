<link rel="stylesheet" href="public/css/modal.css">
<link rel="stylesheet" href="public/css/motor.css">


<?php if($_SESSION["rol"] !== "tec"): ?>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="title-1 m-b-25 text-sm-center">Motores registrados</h2>
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                        <tr>
                            <th>Serie</th>
                            <?php if($_SESSION['rol'] === 'adm'): ?>
                                <th>Empresa</th>
                            <?php endif ?>
                            <?php if($_SESSION['rol'] !== 'tec'): ?>
                                <th>Tecnico</th>
                            <?php endif ?>
                            <th>Ubicación</th>
                            <th>Estado</th>
                            <th>Registro</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($this->motores as $motor): ?>
                            <?php if(
                                $_SESSION['rol'] === 'adm' ||
                                $motor['infmot_empresaFK'] === $_SESSION['id'] ||
                                $motor['infmot_tecnicoFK'] === $_SESSION['id']
                            ): ?>
                                <tr>
                                    <td>
                                        <?= $motor["infmot_serie"] ?>
                                    </td>
                                    <?php if($_SESSION['rol'] === 'adm'): ?>
                                        <td>
                                            <?php foreach($this->empresas as $empresa) {
                                                if($empresa["emp_id"] === $motor["infmot_empresaFK"]) {
                                                    echo $empresa["emp_nombre"];
                                                }
                                            } ?>
                                        </td>
                                    <?php endif ?>
                                    <?php if($_SESSION['rol'] !== 'tec'): ?>
                                        <td>
                                            <?php
                                            $asignado = false;

                                            foreach($this->tecnicos as $tecnico) {
                                                if($tecnico["tec_id"] === $motor["infmot_tecnicoFK"]) {
                                                    echo $tecnico["tec_nombre1"].' '.$tecnico["tec_apellido1"];
                                                    $asignado = true;
                                                    break;
                                                }
                                            }

                                            if(!$asignado) {
                                                echo "No asignado";
                                            } ?>
                                        </td>
                                    <?php endif ?>
                                    <td>
                                        <?php foreach($this->ubicaciones as $ubicacion) {
                                            if($motor["infmot_ubicacionFK"] === $ubicacion["ubimot_id"]) {
                                                echo $ubicacion["ubimot_area"];
                                            }
                                        } ?>
                                    </td>
                                    <td>
                                        <?php foreach($this->estados as $estado) {
                                            if($motor["infmot_estadoFK"] === $estado["est_id"]) {
                                                echo $estado["est_nombre"];
                                            }
                                        } ?>
                                    </td>
                                    <td>
                                        <?= $motor["infmot_registro"] ?>
                                    </td>
                                    <td>
                                        <button class="basicEditButton openFormEditMotor"
                                            data-empresaFK="<?= $motor["infmot_empresaFK"] ?>"
                                            data-ubicacionFK="<?= $motor["infmot_ubicacionFK"] ?>"
                                            data-serie="<?= $motor["infmot_serie"] ?>"
                                            data-normaFK="<?= $motor["infmot_normaFK"] ?>"
                                            data-polos="<?= $motor["infmot_polos"] ?>"
                                            data-potencia="<?= $motor["infmot_potencia"] ?>"
                                            data-IpIn="<?= $motor["infmot_IpIn"] ?>"
                                            data-par_arranque="<?= $motor["infmot_par_arranque"] ?>"
                                            data-par_maxima="<?= $motor["infmot_par_maxima"] ?>"
                                            data-mom_inercia="<?= $motor["infmot_mom_inercia"] ?>"
                                            data-tiempo_rotor_bloq="<?= $motor["infmot_tiempo_rotor_bloq"] ?>"
                                            data-peso="<?= $motor["infmot_peso"] ?>"
                                            data-niv_ruido="<?= $motor["infmot_niv_ruido"] ?>"
                                            data-factor_servicio="<?= $motor["infmot_factor_servicio"] ?>"
                                            data-rotacion_nominal="<?= $motor["infmot_rotacion_nominal"] ?>"
                                            data-corriente_nominal="<?= $motor["infmot_corriente_nominal"] ?>"
                                            data-altitud="<?= $motor["infmot_altitud"] ?>"
                                            data-temp_ambiente="<?= $motor["infmot_temp_ambiente"] ?>"
                                            data-proteccion="<?= $motor["infmot_proteccion"] ?>" data-carcasaId="<?php foreach($this->motorCarcasa as $carcasa) {
                                                  if($carcasa["carmot_id"] === $motor["infmot_carcasaFK"]) {
                                                      echo $carcasa["carmot_id"];
                                                  }
                                              } ?>" data-carcasaNombre="<?php foreach($this->motorCarcasa as $carcasa) {
                                                   if($carcasa["carmot_id"] === $motor["infmot_carcasaFK"]) {
                                                       echo $carcasa["carmot_nombre"];
                                                   }
                                               } ?>" data-carcasaValor="<?php foreach($this->motorCarcasa as $carcasa) {
                                                    if($carcasa["carmot_id"] === $motor["infmot_carcasaFK"]) {
                                                        echo $carcasa["carmot_valor"];
                                                    }
                                                } ?>" data-eficienciaId="<?php foreach($this->motorEficiencia as $eficiencia) {
                                                     if($eficiencia["efimot_id"] === $motor["infmot_eficienciaFK"]) {
                                                         echo $eficiencia["efimot_id"];
                                                     }
                                                 } ?>" data-eficienciaPorcentaje="<?php foreach($this->motorEficiencia as $eficiencia) {
                                                      if($eficiencia["efimot_id"] === $motor["infmot_eficienciaFK"]) {
                                                          echo $eficiencia["efimot_porcentajeFK"];
                                                      }
                                                  } ?>" data-eficienciaValor="<?php foreach($this->motorEficiencia as $eficiencia) {
                                                       if($eficiencia["efimot_id"] === $motor["infmot_eficienciaFK"]) {
                                                           echo $eficiencia["efimot_valor"];
                                                       }
                                                   } ?>" data-fac_potenciaId="<?php foreach($this->motorFacPotencia as $facPotencia) {
                                                        if($facPotencia["facpotmot_id"] === $motor["infmot_fac_potenciaFK"]) {
                                                            echo $facPotencia["facpotmot_id"];
                                                        }
                                                    } ?>" data-fac_potenciaPorcentaje="<?php foreach($this->motorFacPotencia as $facPotencia) {
                                                         if($facPotencia["facpotmot_id"] === $motor["infmot_fac_potenciaFK"]) {
                                                             echo $facPotencia["facpotmot_porcentajeFK"];
                                                         }
                                                     } ?>" data-fac_potenciaValor="<?php foreach($this->motorFacPotencia as $facPotencia) {
                                                          if($facPotencia["facpotmot_id"] === $motor["infmot_fac_potenciaFK"]) {
                                                              echo $facPotencia["facpotmot_porcentajeFK"];
                                                          }
                                                      } ?>" data-tecnicoFK="<?= $motor["infmot_tecnicoFK"] ?>"
                                            data-tipoFK="<?= $motor["infmot_tipoFK"] ?>">Editar</button>
                                    </td>
                                    <td>
                                        <button class="basicDeleteButton deleteMotorButton" id=""
                                            data-id="<?= $motor['infmot_serie'] ?>">Eliminar</button>
                                    </td>
                                </tr>
                            <?php endif ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php endif ?>

<div class="cont_charts">
    <?php foreach($this->motores as $captura): ?>
        <?php if(
            $captura['infmot_empresaFK'] === $_SESSION['id'] ||
            $captura['infmot_tecnicoFK'] === $_SESSION['id'] ||
            $_SESSION['rol'] === 'adm'
        ): ?>
            <div class="charts m-auto">
                <h2 class="">
                    <?= $captura['infmot_serie'] ?>
                </h2>
                <div class="flex-box">
                    <div class="chart_temperatura" data-serie="<?= $captura['infmot_serie'] ?>"
                        style="width: 375px; height: 200px;"></div>
                    <div class="chart_vibracion" data-serie="<?= $captura['infmot_serie'] ?>"
                        style="width: 375px; height: 200px;"></div>
                </div>
            </div>
        <?php endif ?>
    <?php endforeach ?>
</div>

<div id="floatingCircle" class="floating-button btnAddMotor" data-toggle="tooltip" data-title="Agregar Motor">
    <i class="fas fa-plus"></i>
</div>

<div class="cont_form cont_form_edit_motor">
    <?php if($_SESSION["rol"] !== "tec") {
        include("view/motor/formEditMotor.php");
    } ?>
</div>

<?php include("view/motor/formAddMotor.php") ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="module" src="public/js/motores.js"></script>
<script src="public/js/modal.js"></script>
<script src="public/js/formMotorAdd.js"></script>
<script src="public/js/formMotorEdit.js"></script>
<script src="public/js/graficos.js"></script>
<script src="public/js/filtroTecnicos.js"></script>
<script src="public/js/filtroUbicaciones.js"></script>
<script src="public/js/dataFormEditMotor.js"></script>
<script type="module" src="public/js/validacionesMotores.js"></script>