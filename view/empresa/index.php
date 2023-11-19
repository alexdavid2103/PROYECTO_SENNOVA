<link rel="stylesheet" href="public/css/empresa.css">

<div class="row">
    <div class="flex-box">
        <?php foreach ($this->empresas as $empresa) {
            echo '<div class="card m-0">
                    <div class="card-info">
                        <div class="card-avatar"><i class="fas fa-user"></i></div>
                        <div class="card-text">
                            <div class="card-title">' . $empresa["emp_nombre"] . '</div>
                            <div class="card-subtitle">';
                            // foreach ($this->empresas as $empresa) {
                            //     if ($tecnico["tec_empresaFK"] === $empresa["emp_id"]) {
                            //         echo $empresa["emp_nombre"];
                            //     }
                            // }
                            echo '</div>
                        </div>
                    </div>
                    <ul class="card-social">
                        <li class="card-social__item">
                        </li>
                    </ul>
                </div>';
        } ?>
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
            <label>NIT</label>
            <input type="text" placeholder="Ingrese el NIT de la empresa" required />
        </div>

        <div class="input-box">
            <label>Nombre</label>
            <input type="text" placeholder="Ingrese el nombre" required />
        </div>

        <div class="column">
            <div class="input-box">
                <label>Correo</label>
                <input type="email" placeholder="Ingrese el correo" required />
            </div>
            <div class="input-box">
                <label>Telefono</label>
                <input type="number" placeholder="Ingrese su telefono" required />
            </div>
        </div>

        <div class="column">
            <div class="input-box">
                <label>Direccion</label>
                <input type="text" placeholder="Ingrese su direccion" required />
            </div>

            <div class="input-box">
                <label>Municipio</label>
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