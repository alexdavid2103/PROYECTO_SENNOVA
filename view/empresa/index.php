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
        <?php endforeach ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <h2 class="title-1 m-t-25 m-b-25">Ubicaciones registradas</h2>
        <div class="table-responsive table--no-card m-b-40">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Empresa</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->ubicaciones as $ubicacion): ?>
                        <tr>
                            <td>
                                <?= $ubicacion["ubimot_area"] ?>
                            </td>
                            <td>
                                <?php foreach ($this->empresas as $empresa) {
                                    if ($empresa["emp_id"] === $ubicacion["ubimot_empresaFK"]) {
                                        echo $empresa["emp_nombre"];
                                    }
                                } ?>
                            </td>
                            <td>
                                <button class="basicEditButton openFormEditMotor">Editar</button>
                            </td>
                            <td>
                                <button class="basicDeleteButton" data-id="<?= $motor['infmot_serie'] ?>">Eliminar</button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
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
                    <?php foreach ($this->municipios as $municipio): ?>
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