<link rel="stylesheet" href="public/css/empresa.css">

<div class="row">
    <div class="flex-box">
        <?php foreach($this->empresas as $empresa): ?>
            <div class="profile-card">
                <div class="image">
                    <i class="fas fa-user profile-img"></i>
                </div>

                <div class="text-data">
                    <span class="name">
                        <?= $empresa["emp_nombre"] ?>
                    </span>
                </div>

                <ul class="card-buttons">
                    <li class="card-buttons__item">
                        <button class="editButton openFormEditEmpresa" 
                            data-id="<?= $empresa["emp_id"] ?>"
                            data-nombre="<?= $empresa["emp_nombre"] ?>" 
                            data-correo="<?= $empresa["emp_correo"] ?>"
                            data-telefono="<?= $empresa["emp_telefono"] ?>"
                            data-direccion="<?= $empresa["emp_direccion"] ?>"
                            data-municipio="<?= $empresa["emp_municipioFK"] ?>"
                            >
                            Editar
                        </button>
                    </li>
                    <li class="card-buttons__item">
                        <button type="button" class="deleteButton deleteTecnicoButton" data-id="<?= $empresa["emp_id"] ?>">
                            Borrar
                        </button>
                    </li>
                </ul>
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
                    <?php foreach($this->ubicaciones as $ubicacion): ?>
                        <tr>
                            <td>
                                <?= $ubicacion["ubimot_area"] ?>
                            </td>
                            <td>
                                <?php foreach($this->empresas as $empresa) {
                                    if($empresa["emp_id"] === $ubicacion["ubimot_empresaFK"]) {
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

<div id="floatingCircle" class="floating-button btnAddEmpresa" data-toggle="tooltip" data-title="Agregar Empresa">
    <i class="fas fa-plus"></i>
</div>

<?php include("view/empresa/formAddEmpresa.php") ?>

<?php include("view/empresa/formEditEmpresa.php") ?>

<script type="module" src="public/js/empresa.js"></script>
<script type="module" src="public/js/dataFormEditEmpresa.js"></script>