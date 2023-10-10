<div class="cont_form cont_form_add_motor">
    <form action="?controller=motor&action=add" id="multi-step-form" class="form form_add_motor"
        onsubmit="return false">
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
                            <input type="text" id="add_mot_mom_inercia" class="form-field"
                                placeholder="Momento de inercia">
                        </div>

                    </div>
                </div>

                <div class="form-box">
                    <div class="form-group">
                        <input type="text" id="add_mot_tiempo_rotor_bloq" class="form-field"
                            placeholder="Tiempo de rotor bloqueado">
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
                        <input type="text" id="add_mot_factor_servicio" class="form-field"
                            placeholder="Factor de servicio">
                    </div>

                </div>

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
                        <input type="text" id="add_mot_eficiencia_valor" class="form-field"
                            placeholder="Valor de eficiencia">
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
                        <input type="text" id="add_mot_fac_potencia_valor" class="form-field"
                            placeholder="valor del factor de potencia">
                    </div>

                </div>

                <div class="form-box">
                    <div class="form-group">
                        <select name="add_mot_clienteFK" class="form-field" id="add_mot_clienteFK">
                            <option value="">Seleccione el tecnico a cargo del motor</option>
                        </select>

                        <div class="form-box">
                            <div class="btn-step">
                                <button id="step-prev-3">￩ Prev</button>
                                <!-- <button type="submit" id="step-next-4">Send ￫</button> -->
                                <button type="submit" id="step-next-4" class="btn_add btn_add_motor"
                                    onsubmit="RegMotor(event)">Agregar</button>
                            </div>
                        </div>

                    </div>

                </div>

                <div id="sucess-box">
                    <span class="done">✔</span>
                    <p class="sucess-text">Motor agregado exitosamente. Gracias.</p>
                    <button id="reset-btn" type="reset">Regresar</button>
                </div>

    </form>
</div>

<script src="public/js/motores.js"></script>
<script src="public/js/form.js"></script>