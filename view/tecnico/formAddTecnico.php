<div class="contForm" id="formAddTecnico">
    <button type="button" class="fa-solid fa-xmark closeFormEdit closeFormAddTecnico"></button>
    <section id="formContainer" class="container">
        <header>Registrar Tecnico</header>
        <form action="?controller=tecnicos&action=add" class="form" id="form_add_tecnico" onsubmit="return false">
            <div class="column">
                <div class="input-box">
                    <label for="add_tec_id">Numero de documento</label>
                    <input type="number" id="add_tec_id" placeholder="Ingrese su numero de documento" />
                </div>
            </div>
            <div class="column">
                <div class="input-box">
                    <label for="add_tec_nombre1">Primer nombre</label>
                    <input type="text" id="add_tec_nombre1" placeholder="Ingrese su primer nombre" />
                </div>

                <div class="input-box">
                    <label for="add_tec_nombre2">Segundo Nombre</label>
                    <input type="text" id="add_tec_nombre2" placeholder="Ingrese su segundo nombre" />
                </div>
            </div>

            <div class="column">
                <div class="input-box">
                    <label for="add_tec_apellido1">Primer apellido</label>
                    <input type="text" id="add_tec_apellido1" placeholder="Ingrese su primer apellido" />
                </div>
                <div class="input-box">
                    <label for="add_tec_apellido2">Segundo Apellido</label>
                    <input type="text" id="add_tec_apellido2" placeholder="Ingrese su segundo apellido" />
                </div>
            </div>

            <div class="column">
                <div class="input-box">
                    <label for="add_tec_correo">Correo Electronico</label>
                    <input type="text" id="add_tec_correo" placeholder="Ingrese su correo electronico" />
                </div>

                <div class="input-box">
                    <label for="add_tec_telefono">Telefono</label>
                    <input type="number" id="add_tec_telefono" placeholder="Ingrese su numero de telefono" />
                </div>
            </div>
            <?php if($_SESSION["rol"] === "adm"): ?>
                <div class="column">
                    <div class="input-box">
                        <label for="add_tec_empresa">Empresa</label>
                        <select name="" id="add_tec_empresa" class="">
                            <option value="">Seleccione la empresa a la que pertenece</option>';
                            <?php foreach($this->empresas as $empresa) {
                                echo '<option value="'.$empresa["emp_id"].'">'.$empresa["emp_nombre"].'</option>';
                            } ?>
                        </select>
                    </div>
                </div>
            <?php else: ?>
                <input type="hidden" id="add_tec_empresa" value="<?= $_SESSION["id"] ?>">
            <?php endif ?>

            <button type="submit">Guardar Datos</button>
        </form>
    </section>
</div>