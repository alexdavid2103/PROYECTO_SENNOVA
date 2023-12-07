<div class="contForm" id="formEditEmpresa">
    <button type="button" class="fa-solid fa-xmark closeFormEdit closeFormEditEmpresa"></button>
    <section class="container">
        <header>Editar Empresa</header>
        <form method="POST" action="?controller=empresa&action=edit" class="form" id="form_edit_empresa"
            onsubmit="return false">

            <div class="input-box">
                <label for="edit_emp_id">NIT</label>
                <input type="text" id="edit_emp_id" placeholder="Ingrese el NIT de la empresa"/>
            </div>

            <div class="input-box">
                <label for="edit_emp_nombre">Nombre</label>
                <input type="text" id="edit_emp_nombre" placeholder="Ingrese el nombre"/>
            </div>

            <div class="column">
                <div class="input-box">
                    <label for="edit_emp_correo">Correo</label>
                    <input type="email" id="edit_emp_correo" placeholder="Ingrese el correo"/>
                </div>
                <div class="input-box">
                    <label for="edit_emp_telefono">Telefono</label>
                    <input type="number" id="edit_emp_telefono" placeholder="Ingrese su telefono"/>
                </div>
            </div>

            <div class="column">
                <div class="input-box">
                    <label for="edit_emp_direccion">Direccion</label>
                    <input type="text" id="edit_emp_direccion" placeholder="Ingrese su direccion"/>
                </div>

                <div class="input-box">
                    <label for="edit_emp_municipio">Municipio</label>
                    <select class="select" name="Sexo" id="edit_emp_municipio">
                        <option value="" selected>Seleciona tu municipio</option>
                        <?php foreach($this->municipios as $municipio): ?>
                            <option value="<?= $municipio['mun_id'] ?>">
                                <?= $municipio['mun_nombre'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>

            <button>Guardar</button>
        </form>
    </section>
</div>