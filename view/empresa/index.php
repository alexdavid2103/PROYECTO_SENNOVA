<link rel="stylesheet" href="public/css/empresa.css">

<?php if ($_SESSION['rol'] === 'adm'): ?>
    <div class="row">
        <div class="flex-box">
            <?php foreach ($this->empresas as $empresa): ?>
                <div class="profile-card">
                    <div class="image">
                        <?php if (isset($empresa['emp_logo'])): ?>
                            <div class="cont_image">
                                <img src=<?= "public/userImages/{$empresa['emp_logo']}" ?> alt="">
                            </div>
                        <?php else: ?>
                            <i class="fas fa-user profile-img"></i>
                        <?php endif ?>
                    </div>

                    <div class="text-data">
                        <span class="name">
                            <?= $empresa["emp_nombre"] ?>
                        </span>
                    </div>

                    <ul class="card-buttons">
                        <li class="card-buttons__item">
                            <button class="editButton openFormEditEmpresa" data-id="<?= $empresa["emp_id"] ?>"
                                data-nombre="<?= $empresa["emp_nombre"] ?>" data-correo="<?= $empresa["emp_correo"] ?>"
                                data-telefono="<?= $empresa["emp_telefono"] ?>"
                                data-direccion="<?= $empresa["emp_direccion"] ?>"
                                data-municipio="<?= $empresa["emp_municipioFK"] ?>">
                                Editar
                            </button>
                        </li>
                        <li class="card-buttons__item">
                            <button type="button" class="deleteButton deleteEmpresaButton" data-id="<?= $empresa["emp_id"] ?>">
                                Borrar
                            </button>
                        </li>
                    </ul>
                </div>
            <?php endforeach ?>
        </div>
    </div>
<?php endif ?>

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
                        <?php if ($ubicacion['ubimot_empresaFK'] === $_SESSION['id'] || $_SESSION['rol'] === 'adm'): ?>
                            <tr>
                                <td class="position-relative flex-box align-items-center justify-content-end">
                                    <form action="" id="editUbicacionForm" class="editUbicacionForm" onsubmit="return false">
                                        <input 
                                            id="" 
                                            class="bg-transparent p-l-10 border-dark ubimot_nombre" 
                                            type="text"
                                            value="<?= $ubicacion["ubimot_area"] ?>" 
                                            data-id="<?= $ubicacion["ubimot_id"] ?>"
                                            readonly="true">
                                        <button 
                                            type="submit" 
                                            class="position-absolute m-r-5 saveEditUbicacionButton d-none" 
                                            data-id="<?= $ubicacion["ubimot_id"] ?>"   >
                                            <i class="fa-solid fa-save"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <?php foreach ($this->empresas as $empresa) {
                                        if ($empresa["emp_id"] === $ubicacion["ubimot_empresaFK"]) {
                                            echo $empresa["emp_nombre"];
                                            break;
                                        }
                                    } ?>
                                </td>
                                <td>
                                    <button 
                                        class="basicEditButton editUbicacionButton"
                                        data-id="<?= $ubicacion['ubimot_id'] ?>">Editar</button>
                                </td>
                                <td>
                                    <button class="basicDeleteButton deleteUbicacionButton" id=""
                                        data-id="<?= $ubicacion['ubimot_id'] ?>">Eliminar</button>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- PAGE CONTAINER-->
<?php if ($_SESSION['rol'] === 'adm'): ?>
    <div id="floatingCircle" class="floating-button btnAddEmpresa" data-toggle="tooltip" data-title="Agregar Empresa">
        <i class="fas fa-plus"></i>
    </div>
<?php endif ?>

<?php if ($_SESSION['rol'] === 'emp'): ?>
    <a href="?controller=empresa&action=ubicacionMotor">
        <div id="floatingCircle" class="floating-button" data-toggle="tooltip" data-title="Agregar Ubicación">
            <i class="fas fa-plus"></i>
        </div>
    </a>
<?php endif ?>

<?php include("view/empresa/formAddEmpresa.php") ?>

<?php include("view/empresa/formEditEmpresa.php") ?>

<script type="module" src="public/js/empresa.js"></script>
<script type="module" src="public/js/dataFormEditEmpresa.js"></script>