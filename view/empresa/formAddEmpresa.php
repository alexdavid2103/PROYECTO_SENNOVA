<div class="contForm" id="formAddEmpresa">
    <button type="button" class="fa-solid fa-xmark closeFormEdit closeFormAddEmpresa"></button>
    <section class="container">
        <header>Registrar Empresa</header>
        <form method="POST" action="?controller=empresa&action=add" class="form" id="form_add_empresa"
            onsubmit="return false">

            <div class="input-box">
                <label for="add_emp_id">NIT</label>
                <input type="text" id="add_emp_id" placeholder="Ingrese el NIT de la empresa" required />
            </div>

            <div class="input-box">
                <label for="add_emp_nombre">Nombre</label>
                <input type="text" id="add_emp_nombre" placeholder="Ingrese el nombre" required />
            </div>

            <div class="column">
                <div class="input-box">
                    <label for="add_emp_correo">Correo</label>
                    <input type="email" id="add_emp_correo" placeholder="Ingrese el correo" required />
                </div>
                <div class="input-box">
                    <label for="add_emp_telefono">Telefono</label>
                    <input type="number" id="add_emp_telefono" placeholder="Ingrese su telefono" required />
                </div>
            </div>

            <div class="column">
                <div class="input-box">
                    <label for="add_emp_direccion">Direccion</label>
                    <input type="text" id="add_emp_direccion" placeholder="Ingrese su direccion" required />
                </div>

                <div class="input-box">
                    <label for="add_emp_municipio">Municipio</label>
                    <select class="select" name="Sexo" id="add_emp_municipio">
                        <option value="" selected>Seleciona tu municipio</option>
                        <?php foreach($this->municipios as $municipio): ?>
                            <option value="<?= $municipio['mun_id'] ?>">
                                <?= $municipio['mun_nombre'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>

            <button>Registrar</button>
        </form>
    </section>
</div>