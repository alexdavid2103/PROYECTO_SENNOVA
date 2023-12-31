<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <link rel="shortcut icon" href="public/img/logo.png" type="image/x-icon">
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <!-- <link href="css/font-face.css" rel="stylesheet" media="all"> -->
    <link href="public/dashboard/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="public/dashboard/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="public/dashboard/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <!--=============== REMIXICONS ===============-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.4.0/remixicon.css" crossorigin="">
    <!-- Bootstrap CSS-->
    <link href="public/dashboard/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- dashboard/Vendor CSS-->
    <link href="public/dashboard/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="public/dashboard/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet"
        media="all">
    <link href="public/dashboard/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="public/dashboard/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="public/dashboard/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="public/dashboard/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="public/dashboard/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="public/dashboard/css/theme.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="public/dashboard/css/form.css">

    <!--  -->
    <link rel="stylesheet" href="public/dashboard/css/dashboard.css">

    <link rel="stylesheet" href="public/css/form.css">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <nav class="nav_mobile d-lg-none">
            <ul>
                <li class="dashboardLink active">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </li>
                <?php if ($_SESSION['rol'] !== 'tec'): ?>
                    <li class="empresasLink">
                        <i class="fas fa-building"></i>
                        <span>Empresas</span>
                    </li>
                <?php endif ?>

                <?php if ($_SESSION['rol'] === 'emp' || $_SESSION['rol'] === 'adm'): ?>
                    <li class="tecnicosLink">
                        <i class="fas fa-user"></i>
                        <span>Tecnicos</span>
                    </li>
                <?php endif ?>
                <li class="motoresLink">
                    <i class="fas fa-gear"></i>
                    <span>Motores</span>
                </li>
            </ul>
        </nav>
        <!-- END HEADER MOBILE -->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="?controller=main&action=index">
                    <img src="public/dashboard/images/senatech.png" alt="senatech" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="dashboardLink active">
                            <a class="" href="#"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <?php if ($_SESSION['rol'] !== 'tec'): ?>
                            <li class="empresasLink">
                                <a class="" href="#"><i class="fas fa-building"></i>Empresas</a>
                            </li>
                        <?php endif ?>
                        <?php if ($_SESSION['rol'] === 'emp' || $_SESSION['rol'] === 'adm'): ?>
                            <li class="tecnicosLink">
                                <a class="" href="#"><i class="fas fa-user"></i>Tecnicos</a>
                            </li>
                        <?php endif ?>

                        <li class="motoresLink">
                            <a class="" href="#"><i class="fas fa-gear"></i>Motores</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- HEADER DESKTOP-->
        <!-- Encabezado de la versión de escritorio -->
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">
                        <!-- Botones y notificaciones -->
                        <div class="header-button justify-content-end">
                            <!-- Información de la cuenta del usuario -->
                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">
                                    <div class="image">
                                        <?php if (isset($_SESSION['image'])): ?>
                                            <img src="<?= "public/userImages/{$_SESSION['image']}" ?>"
                                                alt="<?= $_SESSION['image'] ?>">
                                        <?php else: ?>
                                            <i class="fa-solid fa-user" style="font-size: 50px"></i></i>
                                        <?php endif; ?>
                                    </div>
                                    <div class="content">
                                        <a class="js-acc-btn" href="#">
                                            <?php if (isset($_SESSION['id'])) {
                                                echo $_SESSION['nombre'] . " " . $_SESSION['apellido'];
                                            } ?>
                                        </a> <!-- Nombre del usuario -->
                                    </div>
                                    <!-- Opciones de la cuenta del usuario desplegable -->
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                            <div class="image text-center">
                                                <?php if (isset($_SESSION['image'])): ?>
                                                    <img src="<?= "public/userImages/{$_SESSION['image']}" ?>"
                                                        alt="<?= $_SESSION['image'] ?>">
                                                <?php else: ?>
                                                    <i class="fa-solid fa-user" style="font-size: 70px"></i></i>
                                                <?php endif; ?>
                                            </div>
                                            <div class="content">
                                                <h5 class="name">
                                                    <a href="#">
                                                        <?php if (isset($_SESSION['id'])) {
                                                            echo $_SESSION['nombre'] . " " . $_SESSION['apellido'];
                                                        } ?>
                                                    </a>
                                                </h5>
                                                <span class="email">
                                                    <?php if (isset($_SESSION['id'])) {
                                                        echo $_SESSION['correo'];
                                                    } ?>
                                                </span>
                                                <!-- Correo electrónico del usuario -->
                                            </div>
                                        </div>
                                        <!-- Opciones de la cuenta del usuario -->
                                        <div class="account-dropdown__body">
                                            <div class="account-dropdown__item">
                                                <a href="?controller=dashboard&action=cuenta" class="">
                                                    <i class="zmdi zmdi-account"></i>Cuenta</a>
                                            </div>
                                            <div class="account-dropdown__item">
                                                <a href="?controller=dashboard&action=password">
                                                    <i class="zmdi zmdi-settings"></i>Contraseña</a>
                                            </div>
                                        </div>
                                        <!-- Opción para cerrar sesión -->
                                        <div class="account-dropdown__footer">
                                            <a href="?controller=main&action=salir">
                                                <i class="zmdi zmdi-power"></i>Salir</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER DESKTOP-->

        <!-- PAGE CONTAINER-->
        <div class="page-container" id="viewDashboard">

            <!-- MAIN CONTENT-->
            <div class="main-content p-sm-t-0">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Descripción general</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <?php if ($_SESSION['rol'] === 'adm'): ?>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="overview-item overview-item--c1">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="fas fa-building"></i>
                                                </div>
                                                <div class="text">
                                                    <?php $count = 0;
                                                    foreach ($this->empresas as $empresa) {
                                                        $count++;
                                                    } ?>
                                                    <h2>
                                                        <?= $count ?>
                                                    </h2>

                                                    <span>Empresas</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>

                            <?php if ($_SESSION['rol'] === 'adm' || $_SESSION['rol'] === 'emp'): ?>

                                <div class="col-sm-6 col-lg-4">
                                    <div class="overview-item overview-item--c2">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                <div class="text">
                                                    <?php $count = 0;
                                                    foreach ($this->tecnicos as $tecnico) {
                                                        if ($tecnico['tec_empresaFK'] === $_SESSION['id'] || $_SESSION['rol'] === 'adm') {
                                                            $count++;
                                                        }
                                                    } ?>
                                                    <h2>
                                                        <?= $count ?>
                                                    </h2>
                                                    <span>Tecnicos</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fas fa-cog"></i>
                                            </div>
                                            <div class="text">
                                                <?php
                                                $count = 0;
                                                foreach ($this->motores as $motor) {
                                                    if (
                                                        $motor['infmot_empresaFK'] === $_SESSION['id'] ||
                                                        $motor['infmot_tecnicoFK'] === $_SESSION['id'] ||
                                                        $_SESSION['rol'] === 'adm'
                                                    ) {
                                                        $count++;
                                                    }
                                                }
                                                ?>
                                                <h2>
                                                    <?= $count ?>
                                                </h2>
                                                <span>Motores</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if ($_SESSION['rol'] === 'adm'): ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2 class="title-1 m-b-25">Empresas registradas</h2>
                                    <div class="table-responsive table--no-card m-b-40">
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                    <th>NIT</th>
                                                    <th>Nombre</th>
                                                    <th>Correo</th>
                                                    <th>Telefono</th>
                                                    <th>Municipio</th>
                                                    <th>Dirección</th>
                                                    <th>Registro</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($this->empresas as $empresa): ?>
                                                    <tr>
                                                        <td>
                                                            <?= $empresa["emp_id"] ?>
                                                        </td>
                                                        <td>
                                                            <?= $empresa["emp_nombre"] ?>
                                                        </td>
                                                        <td>
                                                            <?= $empresa["emp_correo"] ?>
                                                        </td>
                                                        <td>
                                                            <?= $empresa["emp_telefono"] ?>
                                                        </td>
                                                        <td>
                                                            <?php foreach ($this->municipios as $municipio) {
                                                                if ($municipio["mun_id"] === $empresa["emp_municipioFK"]) {
                                                                    echo $municipio["mun_nombre"];
                                                                }
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <?= $empresa["emp_direccion"] ?>
                                                        </td>
                                                        <td>
                                                            <?= $empresa["emp_registro"] ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                        <?php if ($_SESSION['rol'] === 'adm' || $_SESSION['rol'] === 'emp'): ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2 class="title-1 m-b-25">Tecnicos registrados</h2>
                                    <div class="table-responsive table--no-card m-b-40">
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nombre</th>
                                                    <th>Correo</th>
                                                    <th>Telefono</th>
                                                    <?php if ($_SESSION['rol'] !== 'emp'): ?>
                                                        <th>Empresa</th>
                                                    <?php endif ?>
                                                    <th>Registro</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($this->tecnicos as $tecnico): ?>
                                                    <?php if ($_SESSION['rol'] === 'adm' || $tecnico['tec_empresaFK'] === $_SESSION['id']): ?>
                                                        <tr>
                                                            <td>
                                                                <?= $tecnico["tec_id"] ?>
                                                            </td>
                                                            <td>
                                                                <?= $tecnico["tec_nombre1"] . " " . $tecnico["tec_apellido1"] ?>
                                                            </td>
                                                            <td>
                                                                <?= $tecnico["tec_correo"] ?>
                                                            </td>
                                                            <td>
                                                                <?= $tecnico["tec_telefono"] ?>
                                                            </td>
                                                            <?php if ($_SESSION['rol'] !== 'emp'): ?>
                                                                <td>
                                                                    <?php foreach ($this->empresas as $empresa) {
                                                                        if ($empresa["emp_id"] === $tecnico["tec_empresaFK"]) {
                                                                            echo $empresa["emp_nombre"];
                                                                        }
                                                                    } ?>
                                                                </td>
                                                            <?php endif ?>
                                                            <td>
                                                                <?= $tecnico["tec_registro"] ?>
                                                            </td>
                                                        </tr>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>

                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">Motores registrados</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Serie</th>
                                                <?php
                                                if ($_SESSION['rol'] === 'adm'): ?>
                                                    <th>Empresa</th>
                                                <?php endif ?>
                                                <?php if ($_SESSION['rol'] !== 'tec'): ?>
                                                    <th>Tecnico</th>
                                                <?php endif ?>
                                                <th>Ubicación</th>
                                                <th>Estado</th>
                                                <th>Registro</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($this->motores as $motor): ?>
                                                <?php if (
                                                    $_SESSION['rol'] === 'adm' ||
                                                    $motor['infmot_empresaFK'] === $_SESSION['id'] ||
                                                    $motor['infmot_tecnicoFK'] === $_SESSION['id']
                                                ): ?>
                                                    <tr>
                                                        <td>
                                                            <?= $motor["infmot_serie"] ?>
                                                        </td>
                                                        <?php if ($_SESSION['rol'] === 'adm'): ?>
                                                            <td>
                                                                <?php foreach ($this->empresas as $empresa) {
                                                                    if ($empresa["emp_id"] === $motor["infmot_empresaFK"]) {
                                                                        echo $empresa["emp_nombre"];
                                                                    }
                                                                } ?>
                                                            </td>
                                                        <?php endif ?>
                                                        <?php if ($_SESSION['rol'] !== 'tec'): ?>
                                                            <td>
                                                                <?php
                                                                $asignado = false;

                                                                foreach ($this->tecnicos as $tecnico) {
                                                                    if ($tecnico["tec_id"] === $motor["infmot_tecnicoFK"]) {
                                                                        echo $tecnico["tec_nombre1"] . ' ' . $tecnico["tec_apellido1"];
                                                                        $asignado = true;
                                                                        break;
                                                                    }
                                                                }

                                                                if (!$asignado) {
                                                                    echo "No asignado";
                                                                }
                                                                ?>
                                                            </td>
                                                        <?php endif ?>
                                                        <td>
                                                            <?php foreach ($this->ubicaciones as $ubicacion) {
                                                                if ($motor["infmot_ubicacionFK"] === $ubicacion["ubimot_id"]) {
                                                                    echo $ubicacion["ubimot_area"];
                                                                }
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <?php foreach ($this->estados as $estado) {
                                                                if ($motor["infmot_estadoFK"] === $estado["est_id"]) {
                                                                    echo $estado["est_nombre"];
                                                                }
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <?= $motor["infmot_registro"] ?>
                                                        </td>
                                                    </tr>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->

        <div class="page-container d-none" id="viewEmpresas">
            <div class="main-content p-sm-t-0">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <?php include("view/empresa/index.php") ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-container d-none" id="viewTecnicos">
            <div class="main-content p-sm-t-0">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <?php include("view/tecnico/index.php") ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-container d-none" id="viewMotores">
            <div class="main-content p-sm-t-0">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <?php include("view/motor/index.php") ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- ============================= SCRIPS ============================= -->

    <!-- Jquery JS-->
    <script src="public/dashboard/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="public/dashboard/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="public/dashboard/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- dashboard/Vendor JS       -->
    <script src="public/dashboard/vendor/slick/slick.min.js"></script>
    <script src="public/dashboard/vendor/wow/wow.min.js"></script>
    <script src="public/dashboard/vendor/animsition/animsition.min.js"></script>
    <script src="public/dashboard/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="public/dashboard/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="public/dashboard/vendor/counter-up/jquery.counterup.min.js"></script>
    <script src="public/dashboard/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="public/dashboard/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="public/dashboard/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="public/dashboard/vendor/select2/select2.min.js"></script>

    <!-- Main JS-->
    <script src="public/dashboard/js/main.js"></script>
    <script src="public/js/dashboard.js"></script>
    <script src="https://kit.fontawesome.com/575d3461ce.js" crossorigin="anonymous"></script>


</body>

</html>
<!-- end document-->