<link rel="stylesheet" href="public/css/motor.css">

<div class="cont_charts  p-t-100">
    <?php foreach ($this->motores as $captura) {
        if ($captura['infmot_empresaFK'] === $_SESSION['id'] || $_SESSION['rol'] === 'adm' || $captura['infmot_tecnicoFK'] === $_SESSION['id']) {
            echo '<div class="charts m-auto">
            <h2 class="">' . $captura['infmot_serie'] . '</h2>
            <div class="flex-box">
            <div class="chart_temperatura" data-serie="' . $captura['infmot_serie'] . '" style="width: 400px; height: 200px;"></div>
            <div class="chart_vibracion" data-serie="' . $captura['infmot_serie'] . '" style="width: 400px; height: 200px;"></div>
            </div>
            </div>';
        }
    } ?>
</div>

<div class="cont_form cont_form_add_motor">
    <form action="?controller=motor&action=add" id="multi-step-form" class="form form_add_motor"
        onsubmit="return false">
        <div id="form-container-box">
            <h1 class="form-title">REGISTRAR MOTOR</h1>

            <!-- ======================Step Group 1============== -->
            <div class="step-group" id="step-group-1">
                <div class="form-box">
                    <?php if ($_SESSION["rol"] === "adm") {
                        echo '<div class="form-group">
                            <select class="form-field" id="add_mot_empresaFK">
                                <option value="">Seleccione la empresa a la que pertenece el motor</option>';
                        foreach ($this->empresas as $empresa) {
                            echo '<option value="' . $empresa["emp_id"] . '">' . $empresa["emp_nombre"] . '</option>';
                        }
                        echo '</select>
                        </div>';
                    } else {
                        echo '<input type="hidden" value="' . $_SESSION["id"] . '" id="add_mot_empresaFK"></input>';
                    } ?>

                    <div class="form-group">
                        <select class="form-field" id="add_mot_ubicacionFK">
                            <option value="">Seleccione la ubicación en la que se encuetra el motor</option>
                            <?php foreach ($this->ubicaciones as $ubicacion) {
                                // if ($ubicacion["ubimot_empresaFK"] == $_SESSION["id"]) {
                                echo '<option value="' . $ubicacion["ubimot_id"] . '">' . $ubicacion["ubimot_area"]
                                    . '</option>';
                                // }
                            }
                            echo '</select>
                        </div>'; ?>
                    </div>
                    <div class="form-box">
                        <div class="form-group">
                            <input type="text" id="add_mot_serie" class="form-field" placeholder="Serie">
                        </div>
                        <div class="form-group">
                            <select id="add_mot_normaFK" class="form-field" placeholder="Norma">
                                <option value="">Seleccione la norma del motor</option>
                                <?php foreach ($this->normas as $norma) {
                                    echo '<option value="' . $norma["normot_id"] . '">' . $norma["normot_nombre"] . '</option>';
                                } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-box">
                        <div class="form-group">
                            <input type="text" id="add_mot_polos" class="form-field" placeholder="Polos">
                        </div>
                        <div class="form-group">
                            <input type="text" id="add_mot_potencia" class="form-field" placeholder="Potencia">
                        </div>
                    </div>

                    <div class="form-box">
                        <div class="form-group">
                            <input type="text" id="add_mot_IpIn" class="form-field" placeholder="IpIn">
                        </div>
                    </div>

                    <div class="form-box">
                        <div class="btn-step">
                            <button type="button" id="step-next-1">Next ￫</button>
                        </div>
                    </div>
                </div>
                <!-- ======================Step Group 2============== -->
                <div class="step-group" id="step-group-2">
                    <div class="form-box">

                        <div class="form-group">
                            <input type="text" id="add_mot_par_arranque" class="form-field"
                                placeholder="Par de arranque">
                        </div>

                        <div class="form-group">
                            <input type="text" id="add_mot_par_maxima" class="form-field" placeholder="Par máxima">
                        </div>

                    </div>

                    <div class="form-box">
                        <div class="form-group">
                            <input type="text" id="add_mot_mom_inercia" class="form-field"
                                placeholder="Momento de inercia">
                        </div>
                    </div>

                    <div class="form-box">
                        <div class="form-group">
                            <input type="text" id="add_mot_tiempo_rotor_bloq" class="form-field"
                                placeholder="Tiempo de rotor bloqueado">
                        </div>
                        <div class="form-group">
                            <input type="text" id="add_mot_peso" class="form-field" placeholder="Peso">
                        </div>
                    </div>

                    <div class="form-box">
                        <div class="form-group">
                            <input type="text" id="add_mot_niv_ruido" class="form-field" placeholder="Nivel de ruido">
                        </div>

                        <div class="form-group">
                            <input type="text" id="add_mot_factor_servicio" class="form-field"
                                placeholder="Factor de servicio">
                        </div>
                    </div>

                    <div class="form-box">
                        <div class="btn-step">
                            <button type="button" id="step-prev-1">￩ Prev</button>
                            <button type="button" id="step-next-2">Next ￫</button>
                        </div>
                    </div>

                </div>

                <!-- ======================Step Group 3============== -->
                <div class="step-group" id="step-group-3">

                    <div class="form-box">
                        <div class="form-group">
                            <input type="text" id="add_mot_rotacion_nominal" class="form-field"
                                placeholder="Rotación nominal">
                        </div>

                        <div class="form-group">
                            <input type="text" id="add_mot_corriente_nominal" class="form-field"
                                placeholder="Corriente nominal">
                        </div>
                    </div>

                    <div class="form-box">
                        <div class="form-group">
                            <input type="text" id="add_mot_altitud" class="form-field" placeholder="Altitud">
                        </div>

                        <div class="form-group">
                            <input type="text" id="add_mot_temp_ambiente" class="form-field"
                                placeholder="Temperatura ambiente">
                        </div>
                    </div>
                    <div class="form-box">
                        <div class="form-group">
                            <input type="text" id="add_mot_proteccion" class="form-field" placeholder="Protección">
                        </div>
                    </div>

                    <div class="form-box">
                        <div class="form-group">
                            <input type="text" id="add_mot_carcasaNombre" class="form-field"
                                placeholder="Nombre de la carcasa">
                        </div>
                        <div class="form-group">
                            <input type="text" id="add_mot_carcasaValor" class="form-field"
                                placeholder="Valor de la carcasa">
                        </div>
                    </div>

                    <div class="form-box">
                        <div class="btn-step">
                            <button type="button" id="step-prev-2">￩ Prev</button>
                            <button type="button" id="step-next-3">Next ￫</button>
                        </div>
                    </div>


                </div>

                <!-- ======================Step Group 4============== -->
                <div class="step-group" id="step-group-4">
                    <div class="form-box">
                        <div class="form-group">
                            <select name="" class="form-field" id="add_mot_eficienciaPorcentaje">
                                <option value="">Seleccione el porcentaje de eficiencia</option>
                                <?php foreach ($this->porcentajes as $porcentaje) {
                                    echo '<option value="' . $porcentaje["por_id"] . '">' . $porcentaje["por_nombre"] . '</option>';
                                } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="text" id="add_mot_eficienciaValor" class="form-field"
                                placeholder="Valor de eficiencia">
                        </div>
                    </div>

                    <div class="form-box">
                        <div class="form-group">
                            <select name="" class="form-field" id="add_mot_fac_potenciaPorcentaje">
                                <option value="">Seleccione el porcentaje del factor de potencia</option>
                                <?php foreach ($this->porcentajes as $porcentaje) {
                                    echo '<option value="' . $porcentaje["por_id"] . '">' . $porcentaje["por_nombre"] . '</option>';
                                } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="text" id="add_mot_fac_potenciaValor" class="form-field"
                                placeholder="valor del factor de potencia">
                        </div>

                    </div>

                    <div class="form-box">
                        <div class="form-group">
                            <select class="form-field" id="add_mot_tecnicoFK">
                                <option value="">Seleccione el tecnico a cargo del motor</option>
                                <?php foreach ($this->tecnicos as $tecnico) {
                                    echo '<option value="' . $tecnico["tec_id"] . '">' . $tecnico["tec_nombre1"] . " " . $tecnico["tec_apellido1"] . '</option>';
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-field" id="add_mot_tipoFK">
                                <option value="">Seleccione el tipo de motor</option>
                                <?php foreach ($this->tiposMotores as $tipoM) {
                                    echo '<option value="' . $tipoM["tipmot_id"] . '">' . $tipoM["tipmot_nombre"] . '</option>';
                                } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-box">
                        <div class="btn-step">
                            <button type="button" id="step-prev-3">￩ Prev</button>
                            <!-- <button type="submit" id="step-next-4">Send ￫</button> -->
                            <button type="submit" id="" class="btn_add btn_add_motor">Agregar</button>
                        </div>
                    </div>

                    <div id="sucess-box">
                        <span class="done">✔</span>
                        <p class="sucess-text">Motor agregado exitosamente. Gracias.</p>
                        <button id="reset-btn" type="reset">Regresar</button>
                    </div>
                </div>
            </div>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>;
<script type="module" src="public/js/motores.js"></script>
<script src="public/js/form.js"></script>
<script src="public/js/graficos.js"></script>
<script src="public/js/filtroTecnicos.js"></script>
<script src="public/js/filtroUbicaciones.js"></script>