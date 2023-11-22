<link rel="stylesheet" href="public/css/empresa.css">

<div class="row">
    <div class="flex-box">
        <?php foreach ($this->empresas as $empresa): ?>
            <div class="profile-card">
                <div class="image">
                    <i class="fas fa-user profile-img"></i>
                </div>

                <div class="text-data">
                    <span class="name">
                        <?= $empresa["emp_nombre"] ?>
                    </span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- <div id="floatingButton" class="position-fixed bottom-0 end-0 p-3" data-toggle="tooltip" data-title="Crear Tecnico" style="z-index: 1;">
    <button class="btn btn-primary rounded-circle">
        <i class="fas fa-plus"></i>
    </button>
</div> -->
<!-- PAGE CONTAINER-->
<section class="container">
    <header>Registrar Empresa</header>
    <form method="POST" action="?controller=empresa&action=add" class="form">

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
                    <?php foreach ($this->municipios as $municipio) {
                        echo '<option value="' . $municipio['mun_id'] . '">' . $municipio['mun_nombre'] . '</option>';
                    } ?>
                </select>
            </div>
        </div>



        <button>Registrar</button>
    </form>
</section>