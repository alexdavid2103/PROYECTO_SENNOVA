<title>Motores</title>
<link rel="stylesheet" href="public/css/motor.css">
<link rel="stylesheet" href="public/css/form.css">

<div class="motors">
    <h1 class="title">Motores Registrados</h1>
    <button type="button" class="add_motor">Agregar</button>
    <?php foreach ($this->motores as $motor) {

        echo '<div class="motor">

            <h2>' . $motor["infmot_serie"] . '</h2>

            <div class="flex_box">

                <ul class="info_motor info_1">
                    <li class="modelo">Modelo <br> ' . $motor["infmot_modelo"] . '</li>
                    <li class="año">Año <br> ' . $motor["infmot_año"] . '</li>
                    <li class="marca">Marca <br> ' . $motor["infmot_marca"] . '</li>
                    <li class="voltaje">Voltaje <br> ' . $motor["infmot_voltaje"] . '</li>
                    <li class="posicion">Posicion <br> ' . $motor["infmot_posicion"] . '</li>
                    <li class="humedad">Humedad <br> ' . $motor["infmot_humedad"] . '</li>
                    <!-- <li class="descripcion">descripcion <br> ' . $motor["infmot_descripcion"] . '</li> -->
                </ul>

                <figure class="motor_img">
                    <img src="public/img/slider-img.png" alt="">
                </figure>

                <ul class="info_motor info_2">
                    <li class="tipo_base">Tipo de base <br> ' . $motor["infmot_tipo_base"] . '</li>
                    <li class="temperatura_ext">Temperatura externa <br> ' . $motor["infmot_temperatura_ext"] . '</li>
                    <li class="ventilacion_ext">Ventilacion externa <br> ' . $motor["infmot_ventilacion_ext"] . '</li>
                    <li class="cliente">cliente <br> ';
        foreach ($this->clientes as $cliente) {
            if ($cliente["usu_id"] == $motor["infmot_usuarioFK"]) {
                echo $cliente["usu_nombre1"] . " " . $cliente["usu_apellido1"];
            }
        }
        echo '</li>
                    <li class="tecnico">Tecnico a cargo<br> ';
        foreach ($this->tecnicos as $tecnico) {
            if ($tecnico["tec_id"] == $motor["infmot_tecnicoFK"]) {
                echo $tecnico["tec_nombre1"] . " " . $tecnico["tec_apellido1"];
            }
        }
        echo '</li>
                    <li class="registro">Fecha de registro <br> ' . $motor["infmot_registro_tec"] . '</li>
                </ul>

            </div>
            <div class="edit_delete">
                <button type="button" class="edit_motor"
                data-serie = "' . $motor["infmot_serie"] . '";
                data-modelo = "' . $motor["infmot_modelo"] . '";
                data-año = "' . $motor["infmot_año"] . '";
                data-marca = "' . $motor["infmot_marca"] . '";
                data-voltaje = "' . $motor["infmot_voltaje"] . '";
                data-posicion = "' . $motor["infmot_posicion"] . '";
                data-humedad = "' . $motor["infmot_humedad"] . '";
                data-descripcion = "" ' . $motor["infmot_descripcion"] . ';
                data-tipo_base = "' . $motor["infmot_tipo_base"] . '";
                data-temperatura = "' . $motor["infmot_temperatura_ext"] . '";
                data-ventilacion = "' . $motor["infmot_ventilacion_ext"] . '";
                data-cliente-id = "' . $motor["infmot_usuarioFK"] . '";
                data-cliente-nom = "';
        foreach ($this->clientes as $cliente) {
            if ($cliente["usu_id"] == $motor["infmot_usuarioFK"]) {
                echo $cliente["usu_nombre1"] . " " . $cliente["usu_apellido1"];
            }
        }
        echo '";
                data-tecnico-id = "' . $motor["infmot_tecnicoFK"] . '";
                data-tecnico-nom = "';
        foreach ($this->tecnicos as $tecnico) {
            if ($tecnico["tec_id"] == $motor["infmot_tecnicoFK"]) {
                echo $tecnico["tec_nombre1"] . " " . $tecnico["tec_apellido1"];
            }
        }
        echo '";
                data-registro = "' . $motor["infmot_registro_tec"] . '";
                >Editar</button>
                <button type="button" class="delete_motor" onclick="deleteMotor(' . $motor['infmot_id'] . ')">Eliminar</button>
            </div>

        </div>';
    } ?>
</div>

<div class="cont_form cont_form_add_motor">
    <form action="?controller=motor&action=add" id="multi-step-form" class="form form_add_motor" onsubmit="return false">
                <div id="form-container-box">
                    <h1 class="form-title">REGISTRAR MOTOR</h1>
                    <ul class="progress-bar">
                        <li id="step1" class="active">User Info</li>
                        <li id="step2">Address</li>
                        <li id="step3">Comments</li>
                        <li id="step4">sig</li>
                    </ul>

                    <!-- ======================Step Group 1============== -->
                    <div class="step-group" id="step-group-1">
                        <div class="form-box">
                            <div class="form-group">
                                <select name="add_mot_clienteFK" class="form-field" id="add_mot_clienteFK">
                                    <option value="">Seleccione el cliente al que pertenece el motor</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-box">
                            <div class="form-group">
                                <input type="text" id="add_mot_serie" class="form-field" placeholder="Serie">
                            </div>
                            <div class="form-group">
                                <input type="text" id="add_mot_norma" class="form-field" placeholder="Norma">
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

                        <!-- <div class="form-box">
                            <div class="form-group">
                                <input type="text" id="add_mot_potencia" class="form-field" placeholder="Potencia">
                            </div>
                        </div>  -->

                        <div class="form-box">
                            <div class="btn-step">
                                <button id="step-next-1">Next ￫</button>
                            </div>
                        </div>
                    </div>
                    <!-- ======================Step Group 2============== -->
                    <div class="step-group" id="step-group-2">
                        <div class="form-box">
                            <div class="form-group">
                                <input type="text" id="add_mot_par_maxima" class="form-field" placeholder="Par máxima">
                            </div>

                            <div class="form-group">
                                <input type="text" id="add_mot_par_arranque" class="form-field" placeholder="Par de arranque">
                            </div>

                        </div>

                        <div class="form-box">
                            <div class="form-box">
                                <div class="form-group">
                                    <input type="text" id="add_mot_peso" class="form-field" placeholder="Peso">
                                </div>
    
                                <div class="form-group">
                                    <input type="text" id="add_mot_mom_inercia" class="form-field" placeholder="Momento de inercia">
                                </div>
    
                            </div>
                        </div>

                        <div class="form-box">
                            <div class="form-group">
                                <input type="text" id="add_mot_tiempo_rotor_bloq" class="form-field" placeholder="Tiempo de rotor bloqueado">
                            </div>
                        </div>
                        <div class="form-box">
                            <div class="form-group">
                                <input type="text" id="add_mot_carcasaFK" class="form-field" placeholder="Carcasa">
                            </div>
                        </div>

                        <div class="form-box">
                            <div class="btn-step">
                                <button id="step-prev-1">￩ Prev</button>
                                <button id="step-next-2">Next ￫</button>
                            </div>
                        </div>


                    </div>

                    <!-- ======================Step Group 3============== -->
                    <div class="step-group" id="step-group-3">
                        <div class="form-box">
                            <div class="form-group">
                                <input type="text" id="add_mot_niv_ruido" class="form-field" placeholder="Nivel de ruido">
                            </div>

                            <div class="form-group">
                                <input type="text" id="add_mot_factor_servicio" class="form-field" placeholder="Factor de servicio">
                            </div>

                        </div>

                        <div class="form-box">
                            <div class="form-group">
                                <input type="text" id="add_mot_rotacion_nominal" class="form-field" placeholder="Rotación nominal">
                            </div>

                            <div class="form-group">
                                <input type="text" id="add_mot_corriente_nominal" class="form-field" placeholder="Corriente nominal">
                            </div>   
                        </div>

                        <div class="form-box">
                            <div class="form-group">
                                <input type="text" id="add_mot_altitud" class="form-field" placeholder="Altitud">
                            </div>

                            <div class="form-group">
                                <input type="text" id="add_mot_temp_ambiente" class="form-field" placeholder="Temperatura ambiente">
                            </div>   
                        </div>
                        <div class="form-box">
                            <div class="form-group">
                                <input type="text" id="add_mot_proteccion" class="form-field" placeholder="Protección">
                            </div>
                        </div>

                        <div class="form-box">
                            <div class="btn-step">
                                <button id="step-prev-2">￩ Prev</button>
                                <button id="step-next-3">Next ￫</button>
                            </div>
                        </div>


                    </div>

                    <!-- ======================Step Group 4============== -->
                    <div class="step-group" id="step-group-4">
                        <div class="form-box">
                            <div class="form-group">
                                <select name="" class="form-field" id="add_mot_eficiencia_porcentaje" required>
                                    <option value="">Seleccione el porcentaje de eficiencia</option>
                                        <option value="50">50%</option>
                                        <option value="75">75%</option>
                                        <option value="100">100%</option>
                                    </select>
                            </div>

                            <div class="form-group">
                                <input type="text" id="add_mot_eficiencia_valor" class="form-field" placeholder="Valor de eficiencia">
                            </div>
                        </div>

                        <div class="form-box">
                            <div class="form-group">
                                <select name="" class="form-field" id="add_mot_fac_potencia_porcentaje" required>
                                    <option value="">Seleccione el factor de potencia</option>
                                    <option value="50">50%</option>
                                    <option value="75">75%</option>
                                    <option value="100">100%</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" id="add_mot_fac_potencia_valor" class="form-field" placeholder="valor del factor de potencia">
                            </div>

                        </div>

                        <div class="form-box">
                            <div class="form-group">
                                <select name="add_mot_clienteFK"  class="form-field"  id="add_mot_clienteFK">
                                    <option value="">Seleccione el tecnico a cargo del motor</option>
                                    <!-- <?php // foreach ($this->tecnicos as $tecnico) {
                                    // echo '<option value="' . $tecnico["tec_id"] . '">' . $tecnico["tec_nombre1"] . ' ' . $tecnico["tec_apellido1"] . '</option>';
                                    // }  -->
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="form-box">
                            <div class="form-group">
                                <textarea class="form-field" placeholder="Message" cols="30" rows="10"></textarea>
                            </div>
                        </div> -->

                        <div class="form-box">
                            <div class="btn-step">
                                <button id="step-prev-3">￩ Prev</button>
                                <!-- <button type="submit" id="step-next-4">Send ￫</button> -->
                                 <button type="submit" id="step-next-4" class="btn_add btn_add_motor" onsubmit="RegMotor(event)">Agregar</button>
                            </div>
                        </div>

                    </div>

                </div>

                <div id="sucess-box">
                    <span class="done">✔</span>
                    <p class="sucess-text">Moto agregado exitosamente. Gracias.</p>
                    <button id="reset-btn" type="reset">Regresar</button>
                </div>

            </form>
    <!-- <form action="?controller=motor&action=add" class="form form_add_motor" onsubmit="return false">

        <h2 class="form_title">REGISTRAR MOTOR</h2>

        <div class="grid_box">

            <div class="cont_input">
                <label for="add_mot_clienteFK">Cliente</label>
                <select name="add_mot_clienteFK" id="add_mot_clienteFK">
                    <option value="">Seleccione el cliente al que pertenece el motor</option>
                   
                </select>
            </div>

            <div class="cont_input">
                <label for="add_mot_serie">Serie</label>
                <input type="text" id="add_mot_serie" required>
            </div>

            <div class="cont_input">
                <label for="add_mot_norma">Norma</label>
                <input type="text" id="add_mot_norma" required>
            </div>

            <div class="cont_input">
                <label for="add_mot_polos">Polos</label>
                <input type="text" id="add_mot_polos" required>
            </div>

            <div class="cont_input">
                <label for="add_mot_potencia">Potencia</label>
                <input type="text" id="add_mot_potencia" required>
            </div>

            <div class="cont_input">
                <label for="add_mot_IpIn">IpIn</label>
                <input type="text" id="add_mot_IpIn" required>
            </div>

            <div class="cont_input">
                <label for="add_mot_par_arranque">Par de arranque</label>
                <input type="text" id="add_mot_par_arranque" required>
            </div>

            <div class="cont_input">
                <label for="add_mot_par_maxima">Par máxima</label>
                <input type="text" id="add_mot_par_maxima" required>
            </div>

            <div class="cont_input">
                <label for="add_mot_mom_inercia">Momento de inercia</label>
                <input type="text" id="add_mot_mom_inercia" required>
            </div>

            <div class="cont_input">
                <label for="add_mot_tiempo_rotor_bloq">Tiempo de rotor bloqueado</label>
                <input type="text" id="add_mot_tiempo_rotor_bloq" required>
            </div>

            <div class="cont_input">
                <label for="add_mot_peso">Peso</label>
                <input type="text" id="add_mot_peso" required>
            </div>

            <div class="cont_input">
                <label for="add_mot_niv_ruido">Nivel de ruido</label>
                <input type="text" id="add_mot_niv_ruido" required>
            </div>

            <div class="cont_input">
                <label for="add_mot_factor_servicio">Factor de servicio</label>
                <input type="text" id="add_mot_factor_servicio" required>
            </div>

            <div class="cont_input">
                <label for="add_mot_rotacion_nominal">Rotación nominal</label>
                <input type="text" id="add_mot_rotacion_nominal" required>
            </div>

            <div class="cont_input">
                <label for="add_mot_corriente_nominal">Corriente nominal</label>
                <input type="text" id="add_mot_corriente_nominal" required>
            </div>

            <div class="cont_input">
                <label for="add_mot_altitud">Altitud</label>
                <input type="text" id="add_mot_altitud" required>
            </div>

            <div class="cont_input">
                <label for="add_mot_temp_ambiente">Temperatura ambiente</label>
                <input type="text" id="add_mot_temp_ambiente" required>
            </div>

            <div class="cont_input">
                <label for="add_mot_proteccion">Protección</label>
                <input type="text" id="add_mot_proteccion" required>
            </div>

            <div class="cont_input">
                <label for="add_mot_carcasaFK">Carcasa</label>
                <input type="text" id="add_mot_carcasaFK" required>
            </div>

            <div class="cont_input">
                <label for="add_mot_eficienciaFK">Porcentaje de eficiencia</label>
                <select name="" id="add_mot_eficiencia_porcentaje" required>
                <option value="">Seleccione el porcentaje de eficiencia</option>
                    <option value="50">50%</option>
                    <option value="75">75%</option>
                    <option value="100">100%</option>
                </select>
            </div>

            <div class="cont_input">
                <label for="add_mot_eficiencia_valor">Valor de eficiencia</label>
                <input type="text" id="add_mot_eficiencia_valor" required>
            </div>

            <div class="cont_input">
                <label for="add_mot_fac_potenciaFK">Porcentaje del factor de Potencia</label>
                <select name="" id="add_mot_fac_potencia_porcentaje" required>
                    <option value="">Seleccione el factor de potencia</option>
                    <option value="50">50%</option>
                    <option value="75">75%</option>
                    <option value="100">100%</option>
                </select>
            </div>

            <div class="cont_input">
                <label for="add_mot_fac_potencia_valor">valor del factor de potencia</label>
                <input type="text" id="add_mot_fac_potencia_valor" required>
            </div>

            <div class="cont_input">
                <label for="add_mot_tecnicoFK">TécnicoFK</label>
                <select name="add_mot_clienteFK" id="add_mot_clienteFK">
                    <option value="">Seleccione el tecnico a cargo del motor</option>
                
                </select>
            </div>

        </div>

        <div class="cont_input">
            <button type="button" class="btn_back btn_back_add_motor">Regresar</button>
            <button type="button" class="btn_add btn_add_motor" onsubmit="RegMotor(event)">Agregar</button>
        </div>

    </form> -->

</div>

<!-- <div class="cont_form cont_form_edit_motor">
    <form action="" class="form form_edit_motor">

        <h2 class="form_title">EDITAR MOTOR</h2>

        <div class="grid_box">

            <div class="cont_input">
                <label for="">Cliente</label>
                <select name="" id="edit_motor_cliente">
                    <option value="">Seleccione el cliente al que pertenece el motor</option>
                </select>
            </div>

            <div class="cont_input">
                <label for="">Serie</label>
                <input type="text" id="edit_motor_serie" readonly>
            </div>

            <div class="cont_input">
                <label for="">Modelo</label>
                <input type="text" id="edit_motor_modelo" required>
            </div>

            <div class="cont_input">
                <label for="">Año</label>
                <input type="text" id="edit_motor_año" required>
            </div> 

            <div class="cont_input">
                <label for="">Marca</label>
                <input type="text" id="edit_motor_marca" required>
            </div>

            <div class="cont_input">
                <label for="">Ubicación</label>
                <input type="text" id="edit_motor_voltaje" required>
            </div>

            <div class="cont_input">
                <label for="">Temperatura externa</label>
                <input type="text" id="edit_motor_temperatura" required>
            </div>

            <div class="cont_input">
                <label for="">Ubicacion</label>
                <select name="" id="edit_motor_posicion">
                    <option value="">Seleccione la posición del motor</option>
                </select>
            </div>

            <div class="cont_input">
                <label for="">Humedad</label>
                <select name="" id="edit_motor_humedad">
                    <option value="">Seleccione la escala de humedad</option>
                </select>
            </div>

            <div class="cont_input">
                <label for="">Tipo de base</label>
                <select name="" id="edit_motor_tipo_base">
                    <option value="">Seleccione el tipo de base</option>
                </select>
            </div>

            <div class="cont_input">
                <label for="">Nivel de ventilación</label>
                <select name="" id="edit_motor_ventilacion">
                    <option value="">Seleccione el nivel de ventilacion</option>
                </select>
            </div>

        </div>

        <div class="cont_input">
            <button type="button" class="btn_back btn_back_edit_motor">Regresar</button>
            <button type="button" class="btn_edit btn_edit_motor">Editar</button>
        </div>

    </form>
</div> -->

<script src="public/js/motor.js"></script>
<script src="public/js/form.js"></script>