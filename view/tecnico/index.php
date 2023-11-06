<link rel="stylesheet" href="public/css/tecnico.css">

<div class="container">
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
<div id="floatingCircle" class="floating-button" data-toggle="tooltip" data-title="Crear Tecnico">
    <i class="fas fa-plus"></i>
</div>

<section id="formContainer" class="container d-none">
    <header>Registrar Tecnico</header>
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

        <div class="input-box">
            <label>Correo Electronico</label>
            <input type="text" id="add_tec_correo" placeholder="Ingrese su correo electronico" />
        </div>

        <div class="column">
            <div class="input-box">
                <label>Telefono</label>
                <input type="number" id="add_tec_telefono" placeholder="Ingrese su numero de telefono" />
            </div>
            <div class="input-box">
                <label>Dirección</label>
                <input type="text" id="add_tec_direccion" placeholder="Ingrese su dirección" />
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
</section>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>;
<script type="module" src="public/js/tecnicos.js"></script>