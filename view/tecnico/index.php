<link rel="stylesheet" href="public/css/tecnico.css">

<div class="row">
    <div class="flex-box">
        <?php foreach ($this->tecnicos as $tecnico) {
            if ($tecnico["tec_empresaFK"] === $_SESSION["id"] || $_SESSION["rol"] === "adm") {
                echo '<div class="card m-0">
            <div class="card-info">
                <div class="card-avatar"><i class="fas fa-user"></i></div>
                <div class="card-title">' . $tecnico["tec_nombre1"] . " " . $tecnico["tec_apellido1"] . '</div>
                <div class="card-subtitle">';
                foreach ($this->empresas as $empresa) {
                    if ($tecnico["tec_empresaFK"] === $empresa["emp_id"]) {
                        echo $empresa["emp_nombre"];
                    }
                }
                echo '</div>
            </div>
            <ul class="card-social">
                <li class="card-social__item">
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
    <?php include("view/tecnico/formAddMotor.php") ?>
</section>

<section id="formContainer" class="container d-none">
    <header>Editar Tecnico</header>
    <?php include("view/tecnico/formEditMotor.php") ?>
</section>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="module" src="public/js/tecnicos.js"></script>