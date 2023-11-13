<form action="?controller=tecnicos&action=add" class="form" id="form_add_tecnico" onsubmit="return false">
    <div class="column">
        <div class="input-box">
            <label>Numero de documento</label>
            <input type="number" id="add_tec_id" placeholder="Ingrese su numero de documento" />
        </div>
    </div>
    <div class="column">
        <div class="input-box">
            <label>Primer nombre</label>
            <input type="text" id="add_tec_nombre1" placeholder="Ingrese su primer nombre" />
        </div>

        <div class="input-box">
            <label>Segundo Nombre</label>
            <input type="text" id="add_tec_nombre2" placeholder="Ingrese su segundo nombre" />
        </div>
    </div>

    <div class="column">
        <div class="input-box">
            <label>Primer apellido</label>
            <input type="text" id="add_tec_apellido1" placeholder="Ingrese su primer apellido" />
        </div>
        <div class="input-box">
            <label>Segundo Apellido</label>
            <input type="text" id="add_tec_apellido2" placeholder="Ingrese su segundo apellido" />
        </div>
    </div>

    <div class="column">
        <div class="input-box">
            <label>Correo Electronico</label>
            <input type="text" id="add_tec_correo" placeholder="Ingrese su correo electronico" />
        </div>

        <div class="input-box">
            <label>Telefono</label>
            <input type="number" id="add_tec_telefono" placeholder="Ingrese su numero de telefono" />
        </div>
    </div>

    <div class="column">
        <div class="input-box">
            <label>Empresa</label>
            <select name="" id="add_tec_empresa" class="">
                <option value="">Seleccione la empresa a la que pertenece</option>
                <?php foreach ($this->empresas as $empresa) {
                    echo '<option value="' . $empresa["emp_id"] . '">' . $empresa["emp_nombre"] . '</option>';
                } ?>
            </select>
        </div>
    </div>

    <button type="submit">Guardar Datos</button>
</form>