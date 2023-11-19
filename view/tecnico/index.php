<link rel="stylesheet" href="public/css/tecnico.css">
<link rel="stylesheet" href="public/css/formEdit.css">

<div class="row justify-content-center">
    <div class="flex-box">
        <?php foreach ($this->tecnicos as $tecnico) {
            if ($tecnico["tec_empresaFK"] === $_SESSION["id"] || $_SESSION["rol"] === "adm") {
                $avatar = strtoupper(substr($tecnico["tec_nombre1"], 0, 1) . substr($tecnico["tec_apellido1"], 0, 1));
                
                echo '<div class="card m-0">
                    <div class="card-info">
                        <div class="card-avatar">' . $avatar . '</div>
                        <div class="card-title">' . $tecnico["tec_nombre1"] . "<br/>" . $tecnico["tec_apellido1"] . '</div>
                        <div class="card-subtitle">';
                
                foreach ($this->empresas as $empresa) {
                    if ($tecnico["tec_empresaFK"] === $empresa["emp_id"]) {
                        echo $empresa["emp_nombre"];
                    }
                }
                
                echo '</div>
                    </div>
                    <ul class="card-buttons">
                        <li class="card-buttons__item">
                            <button class="editButton openFormEditTecnico" 
                                data-id="' . $tecnico["tec_id"] . '"
                                data-nombre1="' . $tecnico["tec_nombre1"] . '"
                                data-nombre2="' . $tecnico["tec_nombre2"] . '"
                                data-apellido1="' . $tecnico["tec_apellido1"] . '"
                                data-apellido2="' . $tecnico["tec_apellido2"] . '"
                                data-correo="' . $tecnico["tec_correo"] . '"
                                data-telefono="' . $tecnico["tec_telefono"] . '"
                            >
                                Editar
                            </button>
                        </li>
                        <li class="card-buttons__item">
                            <button type="button" class="deleteButton deleteTecnicoButton" data-id="' . $tecnico["tec_id"] . '">
                                Borrar
                            </button>
                        </li>
                    </ul>
                </div>';
            }
        } ?>
    </div>
</div>

<!-- <div id="floatingButton" class="position-fixed bottom-0 end-0 p-3" data-toggle="tooltip" data-title="Crear Tecnico" style="z-index: 1;">
    <button class="btn btn-primary rounded-circle">
        <i class="fas fa-plus"></i>
    </button>
</div> -->
<div id="floatingCircle" class="floating-button" data-toggle="tooltip" data-title="Agregar Tecnico">
    <i class="fas fa-plus"></i>
</div>

<section id="formContainer" class="container d-none">
    <header>Registrar Tecnico</header>
    <?php include("view/tecnico/formAddTecnico.php") ?>
</section>



<?php include("view/tecnico/formEditTecnico.php") ?>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="module" src="public/js/tecnicos.js"></script>
<script type="module" src="public/js/dataFormEditTecnico.js"></script>