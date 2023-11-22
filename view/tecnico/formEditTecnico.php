<div class="contForm" id="formEditTecnico">
    <button type="button" class="fa-solid fa-xmark closeFormEdit closeFormEditTecnico"></button>
    <section id="formContainer" class="container">
        <header>Editar Tecnico</header>
        <form action="?controller=tecnicos&action=edit" class="form" id="form_edit_tecnico" onsubmit="return false">
            <div class="column">
                <div class="input-box">
                    <label for="edit_tec_id">Numero de documento</label>
                    <input value="" type="number" id="edit_tec_id" placeholder="Ingrese su numero de documento"
                        readonly="true" />
                </div>
            </div>
            <div class="column">
                <div class="input-box">
                    <label for="edit_tec_nombre1">Primer nombre</label>
                    <input value="" type="text" id="edit_tec_nombre1" placeholder="Ingrese su primer nombre" />
                </div>

                <div class="input-box">
                    <label for="edit_tec_nombre2">Segundo Nombre</label>
                    <input value="" type="text" id="edit_tec_nombre2" placeholder="Ingrese su segundo nombre" />
                </div>
            </div>

            <div class="column">
                <div class="input-box">
                    <label for="edit_tec_apellido1">Primer apellido</label>
                    <input value="" type="text" id="edit_tec_apellido1" placeholder="Ingrese su primer apellido" />
                </div>
                <div class="input-box">
                    <label for="edit_tec_apellido2">Segundo Apellido</label>
                    <input value="" type="text" id="edit_tec_apellido2" placeholder="Ingrese su segundo apellido" />
                </div>
            </div>

            <div class="column">
                <div class="input-box">
                    <label for="edit_tec_correo">Correo Electronico</label>
                    <input value="" type="text" id="edit_tec_correo" placeholder="Ingrese su correo electronico" />
                </div>

                <div class="input-box">
                    <label for="edit_tec_telefono">Telefono</label>
                    <input value="" type="number" id="edit_tec_telefono" placeholder="Ingrese su numero de telefono" />
                </div>
            </div>

            <button type="submit">Guardar Datos</button>
        </form>
    </section>
</div>