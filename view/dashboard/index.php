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
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <!-- <link href="css/font-face.css" rel="stylesheet" media="all"> -->
    <link href="public/dashboard/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="public/dashboard/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="public/dashboard/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

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

        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="?controller=main&action=index">
                            <img src="public/dashboard/images/senatech.png" alt="SenaTech" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="" id="">
                            <a class="" href="#"><i class="fas fa-building"></i>Empresas</a>
                        </li>
                        <li class="" id="">
                            <a class="" href="#"><i class="fas fa-users"></i>Tecnicos</a>
                        </li>
                        <li class="" id="">
                            <a class="" href="#"><i class="fas fa-gears"></i>Motores</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="?controller=main&action=index">
                    <img src="public/dashboard/images/senatech.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active" id="dashboardLink">
                            <a class="" href="#"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="" id="empresasLink">
                            <a class="" href="#"><i class="fas fa-building"></i>Empresas</a>
                        </li>
                        <li class="" id="tecnicosLink">
                            <a class="" href="#"><i class="fas fa-users"></i>Tecnicos</a>
                        </li>
                        <li class="" id="motoresLink">
                            <a class="" href="#"><i class="fas fa-gears"></i>Motores</a>
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
                        <div class="header-button">
                            <div class="noti-wrap">
                                <!-- Icono de notificaciones -->

                                <!-- Icono de correo electrónico -->
                                <div class="noti__item js-item-menu">
                                    <i class="zmdi zmdi-email"></i>
                                    <span class="quantity">1</span> <!-- Cantidad de correos electrónicos -->
                                    <!-- Lista de correos electrónicos desplegable -->
                                    <div class="email-dropdown js-dropdown">
                                        <div class="email__title">
                                            <p>You have 3 New Emails</p>
                                        </div>
                                        <!-- Correo electrónico individual -->
                                        <div class="email__item">
                                            <div class="image img-cir img-40">
                                                <img src="public/dashboard/images/icon/avatar-06.jpg"
                                                    alt="Cynthia Harvey" />
                                            </div>
                                            <div class="content">
                                                <p>Meeting about new dashboard...</p>
                                                <span>Cynthia Harvey, 3 min ago</span>
                                            </div>
                                        </div>
                                        <!-- Otra notificación de correo electrónico individual -->
                                        <div class="email__item">
                                            <div class="image img-cir img-40">
                                                <img src="public/dashboard/images/icon/avatar-05.jpg"
                                                    alt="Cynthia Harvey" />
                                            </div>
                                            <div class="content">
                                                <p>Meeting about new dashboard...</p>
                                                <span>Cynthia Harvey, Yesterday</span>
                                            </div>
                                        </div>
                                        <!-- Enlace para ver todos los correos electrónicos -->
                                        <div class="email__footer">
                                            <a href="#">See all emails</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Icono de notificaciones -->
                                <div class="noti__item js-item-menu">
                                    <i class="zmdi zmdi-notifications"></i>
                                    <span class="quantity">3</span> <!-- Cantidad de notificaciones -->
                                    <!-- Lista de notificaciones desplegable -->
                                    <div class="notifi-dropdown js-dropdown">
                                        <div class="notifi__title">
                                            <p>You have 3 Notifications</p>
                                        </div>
                                        <!-- Notificación individual -->
                                        <div class="notifi__item">
                                            <div class="bg-c1 img-cir img-40">
                                                <i class="zmdi zmdi-email-open"></i>
                                            </div>
                                            <div class="content">
                                                <p>You got a email notification</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <!-- Otra notificación individual -->
                                        <div class="notifi__item">
                                            <div class="bg-c3 img-cir img-40">
                                                <i class="zmdi zmdi-file-text"></i>
                                            </div>
                                            <div class="content">
                                                <p>You got a new file</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <!-- Enlace para ver todas las notificaciones -->
                                        <div class="notifi__footer">
                                            <a href="#">All notifications</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Información de la cuenta del usuario -->
                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">
                                    <div class="image">
                                        <img src="public/dashboard/images/icon/avatar-01.jpg" alt="John Doe" />
                                    </div>
                                    <div class="content">
                                        <a class="js-acc-btn" href="#">john doe</a> <!-- Nombre del usuario -->
                                    </div>
                                    <!-- Opciones de la cuenta del usuario desplegable -->
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                            <div class="image">
                                                <a href="#">
                                                    <img src="public/dashboard/images/icon/avatar-01.jpg"
                                                        alt="John Doe" />
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h5 class="name">
                                                    <a href="#">john doe</a>
                                                </h5>
                                                <span class="email">johndoe@example.com</span>
                                                <!-- Correo electrónico del usuario -->
                                            </div>
                                        </div>
                                        <!-- Opciones de la cuenta del usuario -->
                                        <div class="account-dropdown__body">
                                            <div class="account-dropdown__item">
                                                <a href="#">
                                                    <i class="zmdi zmdi-account"></i>Account</a>
                                            </div>
                                            <div class="account-dropdown__item">
                                                <a href="#">
                                                    <i class="zmdi zmdi-settings"></i>Setting</a>
                                            </div>
                                        </div>
                                        <!-- Opción para cerrar sesión -->
                                        <div class="account-dropdown__footer">
                                            <a href="?controller=main&action=salir">
                                                <i class="zmdi zmdi-power"></i>Logout</a>
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
            <div class="main-content">
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
                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fas fa-building"></i>
                                            </div>
                                            <div class="text">
                                                <h2>388</h2>
                                                <span>Empresas</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div class="text">
                                                <h2>668</h2>
                                                <span>Tecnicos</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fas fa-cog"></i>
                                            </div>
                                            <div class="text">
                                                <h2>1,086</h2>
                                                <span>Motores</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="au-card recent-report">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 mb-4 text-center">Empresas por Municipios</h3>
                                        <div class="recent-report__chart">
                                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 821.1 983" style="enable-background:new 0 0 821.1 983;"
                                                xml:space="preserve">

                                                <g class="municipio" id="suan">
                                                    <path class="municipios" d="M539.1,983L497,939.8c-0.9-6.8-1.7-13.7-2.6-20.5c3.1-4.2,6.2-8.5,9.2-12.7l14.4-11.1l8.2-14.2l4-6.9l8.9-12.2
                                                        h44.3v8.9c1.9,0.9,3.9,1.8,5.8,2.7c3.6,1.7,7.2,3.4,10.8,5l-21,27.7l-2.2,8.9c-3.6,2.9-7.1,5.8-10.7,8.7
                                                        C557,943.7,548,963.4,539.1,983L539.1,983z" />
                                                </g>
                                                <g class="municipio" id="santa_lucia">
                                                    <path class="municipios"
                                                        d="M529.8,876.3l-18.6-2l-12-5.5l6.8-6.7h9.4l9.8-9.2h-20.7l-8.7-19.6l-25.5-1.7l-7.9-7.9l-13.1-0.7l-1.1-11.8
                                                        l-12.2,1.3l-15.4-3.5c-2.4,1.5-4.8,3.1-7.2,4.6c-2.5-0.2-5.1-0.5-7.6-0.7c0.6,3.7,1.2,7.4,1.8,11.1c-2.2,2.1-4.4,4.2-6.7,6.3
                                                        c-6.4-0.5-12.8-1-19.2-1.5c-2.5,1.4-4.9,2.7-7.4,4.1c1.8,1.4,3.7,2.7,5.5,4.1c-0.4,1-0.7,2-1.1,3c-5.4-1.1-10.8-2.2-16.2-3.3
                                                        c-1.6,2.1-3.2,4.2-4.8,6.3c5.9,2.5,11.8,4.9,17.7,7.4l29.9,2.8l15.5,17.5l16.2,4.2l3.5,15.5l56.7,49.7c-1-6.8-2-13.7-3-20.5
                                                        c2.2-2.6,4.4-5.2,6.7-7.8c1.4-2.1,2.8-4.1,4.2-6.2c4.5-3.4,9-6.7,13.6-10L529.8,876.3L529.8,876.3z" />
                                                </g>
                                                <g class="municipio" id="campo_de_la_cruz">
                                                    <path class="municipios" d="M600,878.9c-5.5-2.6-11.1-5.2-16.6-7.8v-8.5c-2.7-0.1-5.3-0.2-8-0.3h-36.3c-1.5,1.9-3,3.9-4.5,6.2
                                                        c-1.8,2.7-3.4,5.4-4.8,7.9c-2.4-0.3-4.9-0.5-7.3-0.8c-3.6-0.5-7.2-1.1-10.8-1.6l-12.5-3.9l6.4-6.9h7.8c2.4-1.9,4.8-3.9,7.2-5.8
                                                        c1.5-1.8,2.9-3.5,4.4-5.3l-21.3,1.9c-1.1-3.5-2.2-7.1-3.3-10.6c-1.2-3.5-2.4-6.9-3.6-10.4h-18.3c-3.6-1.3-7.1-2.6-10.7-4l-5.3-5.3
                                                        c4.5-1.3,9-2.6,13.5-3.9v-15.5l10.5-2.4l8.3-8.3l8.3-2.2l5.5,7.2l6.4,1.1l2.2,7.5l4.7-0.3l-1.1-9.7l9.1-5.8
                                                        c2.7-0.9,5.5-1.9,8.2-2.8c3.2-1.2,6.4-2.4,9.5-3.6l15.8,7.5l4.4-7.5l16.1-2.5c1.9-0.9,3.8-1.8,5.7-2.7c3.3-0.6,6.6-1.2,9.9-1.8
                                                        c4.2-2.7,8.4-5.3,12.6-8c3.7,2,7.4,3.9,11.1,5.9c1-1.4,2-2.9,3-4.3c0-6.7,0.1-13.4,0.1-20.1h7.2l2.2-7.2c4-5.2,7.9-10.3,11.9-15.5
                                                        l14.7-9.4l3.6-12.5l10.5-13l10.5,4.4h10v14.4l-8.3,5.8l-6.1,42.1l-2.5,7.5l-20.5,26.6l-35.7,14.4l-15.2,18.3l0.8,32.7L600,878.9
                                                        L600,878.9z" />
                                                </g>
                                                <g class="municipio" id="candelaria">
                                                    <path class="municipios" d="M677.5,694.7l-12.6,14l-4.4,12.9l-10,5.5l-7,4.8l-6.7,10l-3.7,7.4v3.7h-7v19.6l-3,3.3l-11.1-5.9l-9.2,7.4
                                                        l-14,2.6l-7,4.4h-12.9l-3.7,7.4l-15.9-7.4c-6.2,2.3-12.3,4.6-18.5,6.9c-0.1-2.1-0.2-4.1-0.3-6.2c-2,0.2-3.9,0.5-5.9,0.7
                                                        c0.5-4.9,1-9.8,1.5-14.8l-7.4-10.3c-2.2,0.6-4.4,1.2-6.7,1.8l-6.7-10.7l4.4-4.8c0.1-8,0.2-16,0.4-24c6.9,2,13.8,3.9,20.7,5.9
                                                        c-0.4-3.3-0.7-6.7-1.1-10c1.6-2,3.2-3.9,4.8-5.9c-1.6-1-3.2-2-4.8-3l1.5-15.5l-4.8-3c2.3-1.7,4.5-3.3,6.8-5
                                                        c0.5-2.1,1.1-4.3,1.6-6.4c0.3-2.1,0.6-4.2,0.8-6.3l-0.7-7.4l5.9-4.1l-1.5-4.1h-9.6l-4.8-6.3l4.8-4.8l-9.2-3l7.4-10.7l16.6-3
                                                        l6.3-2.6l22.5,8.9c1,0.7,2,1.5,3,2.2c-0.2-4.3-0.5-8.6-0.7-12.9l-3-5.5l9.6-1.5l21-1.5l-3.3-7c3-1.7,5.9-3.4,8.9-5.2l8.5,5.9
                                                        c1.5,0.8,2.9,1.5,4.4,2.2l16.6,6.7l11.4,10l0.7,11.4l-5.5,3.7l8.5,15.9c7.3,6,14.5,12.1,21.8,18.1c2.6-0.4,5.2-0.7,7.8-1.1
                                                        L677.5,694.7L677.5,694.7z" />
                                                </g>
                                                <g class="municipio" id="manati">
                                                    <path class="municipios" d="M530.2,789.9l-9.6,7.4c0.3,2.1,0.6,4.3,0.9,6.4c0.1,1.1,0.2,2.1,0.4,3.2c-1.6,0.1-3.1,0.2-4.7,0.3
                                                        c-0.3-2.4-0.7-4.9-1-7.3l-6.3-1.5l-7-6.7c-2.7,0.6-5.4,1.2-8.1,1.8c-2.8,2.8-5.5,5.5-8.3,8.3l-10.5,2.4v15.5l-14,4.1l-12.2-1.8
                                                        l-1.8-10l-10,1.5l-17-4.8l-7.5,4.8l-7.6-0.7l1.8,11.1l-6.7,6.3l-19.2-1.5l-7.4,4.1l5.5,4.1l-1.1,3l-16.2-3.3l-4.8,6.3l-26.6-7.8
                                                        l-36.6-36.9l7.4-8.1l8.5,1.8l14.4-22.1l12.6-40.2l-0.4-9.6l21-13.7h12.6l0.4-45l24.7,1.8l5.5,3.7l8.5-5.5l11.4,5.9l22.5,0.7
                                                        l12.2-9.2l2.6-8.1l12.2-3.3l-5.2-9.6l21.8,3.3l34.3,5.2l8.5,3l-5.9,4.1l3.7,5.2l11.1,1.1v4.8l-4.1,3l1.1,8.5l-3,11.8l-6.3,3.7
                                                        l4.8,4.8l-1.8,14.4l4.8,3l-4.4,5.2L531,729l-20.7-5.9V749l-5.5,3.3l8.1,10.7l5.9-2.2l7.4,10.3c-0.5,4.9-1,9.8-1.5,14.8
                                                        c2-0.2,3.9-0.5,5.9-0.7L530.2,789.9L530.2,789.9z" />
                                                </g>
                                                <g class="municipio" id="repelon">
                                                    <path class="municipios"
                                                        d="M294.9,797.8l-21.3-4.2l-28.8,5.9l-34.3,10.7L190.6,784l-17-12.9v-13.7l-11.1-3.3l-6.3-7h-11.1l20.3-11.1
                                                        l-10.7-14.8l-18.1-1.5l-21-4.1l-22.1-6.3l-9.2,5.5l-7.8-5.5l-28.1,3.7l-4.8,5.2l-15.5-13.7l18.8-9.6l3-10.7l7.4-8.5l-1.5-17.7
                                                        l12.9-10.3l2.2-13.3h5.2l-1.8-11.8h-8.9c0.1-1.1,0.1-2.2,0.2-3.2c2.6-1.5,5.3-3,7.9-4.5c3-4.5,6-8.9,9-13.4
                                                        c2.9,5.3,5.8,10.7,8.7,16l7.4-3.7l10,15.1l-10.3,15.1v9.2l8.5-0.4l4.4,3.7l9.2-0.4l13.7-14.4l-1.1-6.7l-7-3l-2.2-11.4
                                                        c1-0.8,2.1-1.7,3.1-2.6c0.9-0.8,1.9-1.5,2.8-2.2c4.1-3.1,8.3-6.3,12.4-9.4c5.7-2.2,11.4-4.3,17.1-6.4l6.7-10l27.7,6.3
                                                        c1.7-3.3,3.4-6.7,5.1-10l15.3,10.3c0.4-5.3,0.7-10.6,1.1-15.9l8.5-6.7v-8.5h15.1l8.1,8.9l22.1,5.2l14-21.8
                                                        c13.9,6.1,27.7,12.2,41.6,18.3c9.7,9.6,19.3,19.1,29,28.7l13.2,27.6l4.4,12.2v60.5l-17,3.3l-16.2,11.1l-1.5,16.2l-11.1,34
                                                        l-14.8,21.8l-8.5-1.8C299.7,792.6,297.3,795.2,294.9,797.8L294.9,797.8z" />
                                                </g>
                                                <g class="municipio" id="sabanalarga">
                                                    <path class="municipios"
                                                        d="M371.1,660.5c-0.1-5.7-0.2-11.3-0.4-17c-5.8-12.8-11.5-25.7-17.3-38.5c-5-5.2-10-10.3-15-15.5
                                                        c-4.7-4.9-9.5-9.8-14.2-14.7l2.2-22.1c0.1-3.1,0.2-6.3,0.4-9.4c-3-8.2-6.1-16.5-9.1-24.8c-0.2-4.7-0.5-9.3-0.7-14
                                                        c1-0.7,2.1-1.4,3.1-2.1c2.4-1.3,4.8-2.7,7.2-4c-0.9-4-1.8-7.9-2.7-11.9c-2.5-1.2-5.1-2.4-7.7-3.6v-13.3h10l-10-13.8l10.5-5.5l8.6-6
                                                        c1.2,1.1,2.4,2.2,3.6,3.2l13.8-5l10-5.5l17.2,7.8l26-5l18.3,12.7c0.3-1.4,0.6-2.7,0.9-4.1c1.4,0.5,2.8,1,4.2,1.5l23.1,20.9l5-10.5
                                                        c5.8,0.2,11.5,0.3,17.3,0.5c4.4-0.9,8.9-1.8,13.3-2.7c3.7-0.4,7.3-0.7,11-1.1v-7.8l6.1-8.9v-5.5l13.3,9.4v-6.7l8.6-1.4l1.4,4.7
                                                        l-5.5,5.5l1.1,4.4l6.9-3.9l8.3-0.8l9.1-8.9l1.9-6.9c8.4,0.5,16.9,1,25.4,1.6c1.1-2.1,2.2-4.2,3.4-6.4c3.4-0.2,6.8-0.3,10.1-0.5
                                                        c0.7-1.2,1.3-2.4,1.9-3.6h3.2c0.8,3.5,1.6,7.1,2.4,10.6c6.9,18.5,13.9,36.9,20.8,55.4c0.2,6,0.4,12,0.6,18
                                                        c0.1,9.4,0.2,18.8,0.4,28.2l12.2,6.3l9.2,11.8h6.3V567l-9.2,7l-5.9-0.4l2.2,9.6l-3.7,14.8l-11.8,7.8l2.2,8.1l-11.8-8.1l-8.1,5.2
                                                        l3.3,7l-20.7,0.4l-2.6,2.6l-7.8-0.4l4.1,5.9l-0.7,12.9l-25.8-12.2l-5.9,4.4c-5.5,0.7-11.1,1.5-16.6,2.2c-2.2,3.9-4.4,7.9-6.7,11.8
                                                        l-57.2-8.5l5.2,10c-3.6,1.1-7.1,2.2-10.7,3.3c-0.5,2.4-1,4.8-1.5,7.2c-4.6,3.4-9.1,6.8-13.7,10.1h-20.7l-12.6-6.7
                                                        c-3,1.8-5.9,3.7-8.9,5.5c-2.3-1.1-4.7-2.2-7-3.3c-7.1-0.7-14.3-1.4-21.4-2.1C372.3,661,371.7,660.8,371.1,660.5L371.1,660.5z" />
                                                </g>
                                                <g class="municipio" id="ponedera">
                                                    <path class="municipios"
                                                        d="M596.3,427c7.5,20.7,15,41.3,22.5,62V533l13.3,8.1l9.2,10.3h4.4v14.4l-8.9,8.9h-4.1l1.1,12.9l-5.2,12.6
                                                        l-10,5.5l2,7.4l16.1,6.3l13.3,13.3v11.4h-6.3l10.7,19.2l20.7,16.2h8.1l-5.5,14.4l7.4,4.8h11.8l5.9-13.7l12.6-1.5l24-26.2l17-1.5
                                                        l9.2-9.2l21-5.5l7.4-14v-40.2l18.8-17.7l-1.5-19.2l-5.2-13.7l-25.8-18.1l-0.7-8.1l-14.3-2.6c-3.7,1.1-7.4,2.2-11.2,3.3l-15.5-2.2
                                                        l-7.4-7l-5.5,3.7l-14.4-5.9c0,0-8.5,0.8-8.5,0.8c0,0-6.8,0.6-6.8,0.6c-5.7-1.3-11.4-2.7-17.2-4l-3.7-8.9l-4.8-1.5l-3,4.4l-8.5-6.7
                                                        l-7.8,0.7l-1.8-10.3l-4.1-3.7l3.3-7l-6.3-7.4c-1.4-1.8-2.9-3.7-4.3-5.5c-1.1-2.7-2.3-5.4-3.4-8.1l-10.3-0.4
                                                        c-1.6-1.4-3.3-2.7-4.9-4.1c-3-0.3-6-0.5-9-0.8l-6.5-1.1l-2.9-9.5L596.3,427L596.3,427z" />
                                                </g>
                                                <g class="municipio" id="palmar">
                                                    <path class="municipios"
                                                        d="M779.7,510.1l-14.3-2.6c-3.7,1.1-7.4,2.2-11.2,3.3c-4.3-0.6-8.6-1.1-12.9-1.7l-8.9-6.8l-4.8,2.6l-15.9-6.3
                                                        c-2.7,0.5-5.4,1-8,1.4c-3.4,0.7-6.3,0.7-8.2,0.6c-2.7-0.2-4.9-0.8-7.5-1.4c-2.2-0.6-4-1.1-5.3-1.6c-1.3-0.4-2.6-0.9-4-1.3l-1.3-2.2
                                                        l-2.2-6.3c-1.6-0.5-3.2-1-4.8-1.5l-3,4.8l-7-7.4c-3.2,0.5-6.3,1-9.5,1.5c-0.3-3.2-0.7-6.4-1-9.6c-1.5-1.8-2.9-3.6-4.4-5.4
                                                        c0.9-2,1.9-4,2.8-6c7.4-4.4,14.9-8.8,22.3-13.1c2.7-0.4,5.3-0.8,8-1.1c1.4,1.9,2.9,3.8,4.3,5.7c0.8-2.6,1.7-5.2,2.5-7.9
                                                        c6.3-1.2,12.6-2.4,18.8-3.6c0.9-3.3,1.8-6.6,2.6-9.9c0.7-2.3,1.4-4.7,2.2-7.1l5-1.5c1.2-1.4,2.3-2.7,3.5-4.1c0.6-3,1.2-5.9,1.8-8.9
                                                        c5.4,0.2,10.8,0.5,16.2,0.7c6.2-2.3,12.3-4.7,18.5-7l28.4-12.2c8.9,1.5,17.7,3,26.6,4.4c1.7,11.9,3.4,23.9,5.2,35.8l5.2,15.9v21.8
                                                        l-6.7,17.3l-12.2,8.9l-11.8,3.3C785.9,504.7,782.8,507.4,779.7,510.1L779.7,510.1z" />
                                                </g>
                                                <g class="municipio" id="santo_tomas">
                                                    <path class="municipios" d="M648.7,464l-7.8-8.5l-6.7-12.2c1.7-0.1,3.4-0.2,5.2-0.4c1.2-7.1,2.5-14.3,3.7-21.4l9.2-5.2L655,396l13.7-24
                                                        v-5.9l18.8-5.5l10.3,4.4l29.5-9.2l11.8,7.4l49.5,1.5l10.3,6.7l3.7-6.7c3.4-0.1,6.7-0.2,10.1-0.3c0.3,5.3,0.7,10.6,1,15.8l-4.4,11.4
                                                        v7.4l-26.2-4.1c-3.4,1.3-6.8,2.5-10.1,3.8c-3.1,1.2-6.3,2.5-9.4,3.7c-3.1,1.4-6.2,2.8-9.3,4.3l-18.5,7l-16.6-1.1l-1.5,9.2
                                                        c-1,1.4-2.1,2.8-3.1,4.1c-1.9,0.6-3.8,1.2-5.7,1.8l-4.4,16.6l-19.2,3.7l-2.2,8.1l-4.4-6.3c-3.6,0.9-7.1,1.7-10.7,2.6
                                                        C661.5,456.4,655.1,460.2,648.7,464L648.7,464z" />
                                                </g>
                                                <g class="municipio" id="sabanagrande">
                                                    <path class="municipios"
                                                        d="M812.7,364.3c-3.4,0.1-6.7,0.2-10.1,0.3c-1.2,2.2-2.5,4.4-3.7,6.7c-3.4-2.3-6.9-4.7-10.3-7h-43.6l-15.9-7.4
                                                        l-32.5,7.9l-9.2-4.2v-3.7l7.4-1.5V347H690v-11.4l-7.8-5.2l10.3-10.3l63.1-10.3l4.8-3.7l12.6,2.6l-3.3-13.3
                                                        c3.6-0.4,7.2-0.8,10.8-1.2c3.3-0.5,6.6-0.9,9.8-1.4l8.1,19.6l0.7,20.5C803.8,343.3,808.3,353.8,812.7,364.3L812.7,364.3z" />
                                                </g>
                                                <g class="municipio" id="polonuevo">
                                                    <path class="municipios"
                                                        d="M692.3,321.5l-108.9-5.2v3c3,2.7,5.9,5.4,8.9,8.1c-2.7,1.5-5.4,3-8.1,4.5c-2,1.1-3.9,2.2-5.9,3.3
                                                        c2.6,1.3,5.3,2.6,7.9,4c2.2,1.2,4.5,2.5,6.8,3.7l-1,3.7c-1.9,0.4-3.8,0.7-5.7,1.1c-3.3,2-6.5,4-9.8,5.9c2.6,1,5.2,2,7.7,3.1
                                                        c-0.1,1.9-0.2,3.9-0.3,5.8c-1.6,1-3.2,2-4.8,3l-2.2,14.4h-12.9l-3,13.1c2,3.7,4,7.5,6,11.2l0.4,4.4l4.4,2.6v5.5l6.3,2.2l3.7-2.6
                                                        l8.9,2.6l1.1,3h3.7l1.1,5.2h4.8l2.6,10l16.2,1.5l3,4.4h16.6c1.2-7.1,2.5-14.3,3.7-21.4c3.1-1.7,6.2-3.4,9.2-5.2
                                                        c0.9-6.8,1.7-13.5,2.6-20.3c4.3-7.5,8.6-15,12.9-22.5l1.5-7.8l18.1-5.2l0.4-4.8c2.3-0.3,4.7-0.6,7-0.9V347H690v-11.4
                                                        c-2.6-1.7-5.2-3.4-7.8-5.2C685.6,327.4,688.9,324.4,692.3,321.5L692.3,321.5z" />
                                                </g>
                                                <g class="municipio" id="malambo">
                                                    <path class="municipios" d="M583.7,316.3c36.8,1.5,73.6,3,110.4,4.4c16.5-3,32.9-6,49.4-9.1c4.2-0.8,8.4-1.5,12.6-2.3
                                                        c1.7-1.1,3.4-2.2,5-3.3c4,0.8,8,1.6,12,2.5c-1.2-4.7-2.5-9.4-3.7-14c7-0.6,14-1.2,21-1.8c1.7-6.2,3.4-12.3,5.2-18.5v-17.7
                                                        c0.9-4.3,1.7-8.6,2.6-12.9c-2.1-0.9-4.2-1.8-6.3-2.7v-7.6c-1.5,1.7-3,3.4-4.4,5.2l-12.9-7.4c-2.3,0.5-4.7,0.9-7,1.4
                                                        c-2.1,0.3-4.2,0.6-6.3,0.9v-4.9c-2.6-1.6-5.2-3.2-7.8-4.8c-3,1.6-5.9,3.2-8.9,4.8c1,2.6,2,5.2,3,7.8l-3,3.7
                                                        c-2.6-2.1-5.2-4.2-7.8-6.3h-4.8v10c-3.1-1.4-6.2-2.7-9.2-4.1c-1.3,1.7-2.5,3.4-3.8,5.2c-0.5,0.7-1.1,1.5-1.6,2.2
                                                        c-3.7-0.1-7.5-0.2-11.2-0.3v-5.2c-0.7-0.7-1.5-1.5-2.2-2.2c-1.3-1.3-2.7-2.7-4-4c-2.3,2.1-4.7,4.2-7,6.3c-2.5-0.6-5-1.2-7.5-1.8
                                                        c-0.3,1.6-0.6,3.2-0.9,4.8l-14.8-0.7l-3.7-4.8c3.2-4.3,6.4-8.6,9.6-12.9c-3.2-0.1-6.5-0.2-9.7-0.4c-3,2.1-6.1,4.2-9.1,6.3
                                                        c-3.8,0.1-7.6,0.2-11.4,0.4l-10.1,8c1.5,1.8,3,3.5,4.6,5.3c2.5,1.8,4.9,3.7,7.4,5.5c-14.6,3.7-29.3,7.4-43.9,11.1l-4.4,10.5
                                                        c1.1,3.6,2.1,7.2,3.2,10.8c0.7,1.9,1.3,3.8,2,5.8c0.3,1.1,0.5,2.2,0.8,3.2l-12.6,12.2c-0.7,3.1-1.5,6.2-2.2,9.2L583.7,316.3
                                                        L583.7,316.3z" />
                                                </g>
                                                <g class="municipio" id="soledad">
                                                    <polygon class="municipios" points="798.2,243.6 791.9,241.7 791.9,233.2 787.5,238.4 774.6,231 761.3,233.6 761.3,228.4 753.5,223.6 
                                                        744.7,228.4 747.6,236.2 744.7,239.9 736.9,233.6 732.1,233.6 732.1,243.6 722.9,239.5 717.7,246.5 706.3,246.5 706.3,241.4 
                                                        700,235.1 693,241.4 685.2,239.1 683.8,243.9 669.7,244.3 665.7,238.8 675.6,225.9 665.7,225.9 656.8,231.8 645.4,231.8 662,210.7 
                                                        660.5,196 680.5,191.2 709.6,191.2 711.8,178.6 739.9,165.3 769.8,165.3 772,179.3 786.4,187.8 794.1,188.2 800.1,194.1 
                                                        821.1,201.9 821.1,210.7 797.8,228.1 	" />
                                                </g>
                                                <g class="municipio" id="barranquilla">
                                                    <path class="municipios" d="M769.8,165.3c-10.1-0.1-20.2-0.2-30.3-0.4l-13.8,7.1c-4.6,2.2-9.3,4.4-13.9,6.6l-2.1,11.9
                                                        c-9.9,0.3-19.9,0.5-29.8,0.8c-6.5,1.6-12.9,3.1-19.4,4.7H652c-1.5-2.5-3.1-5-4.6-7.5c-0.8-1.3-1.6-2.6-2.4-3.9l-12.2-9.6V169
                                                        l-22.5,1.5L595.2,158h-3.7l-2.2,4.4l-20.7,2.2l-1.5-9.2c-5.9,0.8-11.9,1.6-17.8,2.4c-5.1,0.7-10.3,1.3-15.4,2h-4.1l2.2-7.4l8.1-5.5
                                                        l7.4,2.6l3-5.5h7.8l-1.5-6.7l-13.7-8.9l17.3-3.3l1.1-5.5l12.6-2.6l8.1,8.9l5.9-3l-6.3-3.3l0.4-8.1L597,97.8l1.5-8.1l8.1-10.3h28.1
                                                        l10.3,3.3c4.8-6.9,9.6-13.8,14.4-20.7c-5.3,1.5-10.6,3-15.9,4.4h-28.4l-3.3,7.4l-12.9,1.1l2.2-8.1l-4.1-7h-5.5l4.1-24.4l7-2.2
                                                        l2.6,2.6l5.2-4.8l-5.9-3.7l2.2-10l33.2-11.8l1.8,11.8l11.4,17l18.5,15.5l42.5,4.8l8.5,14l6.7,2.2c13,17.6,26,35.2,39,52.8
                                                        C768.8,137.5,769.3,151.4,769.8,165.3L769.8,165.3z" />
                                                </g>
                                                <g class="municipio" id="puerto_colombia">
                                                    <path class="municipios"
                                                        d="M595.2,37.8c-1.5,7.5-2.9,14.9-4.4,22.4c2.1-0.1,4.2-0.2,6.3-0.4c1.4,2.3,2.7,4.7,4.1,7
                                                        c-0.7,2.7-1.5,5.4-2.2,8.1c3-0.2,5.9-0.5,8.9-0.7c1.4-0.1,2.7-0.2,4.1-0.4c1.2-2.2,2.5-4.4,3.7-6.7l26.9-0.4l17-4.8
                                                        c-4.8,6.9-9.6,13.8-14.4,20.7c-3.3-1.4-6.7-2.7-10-4.1l-28.4,0.4c-2.7,3.6-5.4,7.1-8.1,10.7c-0.5,2.7-1,5.4-1.5,8.1
                                                        c-4.9,4.6-9.8,9.1-14.8,13.7c-0.1,2.7-0.2,5.4-0.4,8.1l6.3,3.3l-5.9,3c-2.7-3-5.4-5.9-8.1-8.9c-4.2,0.9-8.4,1.7-12.6,2.6
                                                        c-0.4,1.8-0.7,3.7-1.1,5.5c-5.6,1.1-11.1,2.1-16.7,3.2c4.3,3,8.7,6,13,9c0.5,2.2,1,4.4,1.5,6.7h-7.8c-1.1,1.8-2.2,3.7-3.3,5.5
                                                        c-2.3-0.9-4.7-1.7-7-2.6c-2.3,1.6-4.6,3.2-6.9,4.7l-1.9,8.9l-8.9-4.8c-3.7,0.1-7.4,0.2-11.1,0.4c1.8-2.6,3.7-5.2,5.5-7.8
                                                        c-0.1-2.6-0.2-5.1-0.3-7.7c3.7-1,7.3-2,11-2.9c0.9-1.8,1.7-3.7,2.6-5.5c-2.3-2.5-4.7-4.9-7-7.4h-12.6c-1.8-0.6-3.7-1.2-5.5-1.8
                                                        c0.2,2.7,0.5,5.4,0.7,8.1l-8.5,0.4l-4.8-4.4l-7,5.5l-17-11.8l-10.3-0.4l-10.7,3.7l-4.8,2.2l-6.3-8.1l15.9-4.8l4.4-5.2h13.7
                                                        l11.4-13.3l1.8-6.3L514,71.2l13.3-10.7l-0.4-11.8l15.9-1.5l24-2.6L595.2,37.8L595.2,37.8z" />
                                                </g>
                                                <g class="municipio" id="galapa">
                                                    <path class="municipios"
                                                        d="M531.7,160.9l35.4-6.3c0.5,3.3,1,6.7,1.5,10c6.9-0.7,13.8-1.5,20.7-2.2c1.2-1.5,2.4-3,3.6-4.4
                                                        c5.8,4.2,11.6,8.4,17.5,12.6c7.5-0.3,15-0.5,22.5-0.8v5.2c4.1,3.2,8.1,6.4,12.2,9.6c2.3,3.8,4.7,7.6,7,11.4h8.5
                                                        c0.9,4.8,1.7,9.6,2.6,14.4l-17,21.4l-11.1,8.1l4.8,5.5c1.3,0.9,2.5,1.9,3.8,2.9c1.2,0.9,2.4,1.8,3.6,2.7l-36,9.1
                                                        c-2.5,0.6-5,1.3-7.5,1.9c-2.1,3.8-4.2,7.7-6.3,11.5c-4.5,0.6-9,1.1-13.4,1.6l-9.1,1.7c-3.4-1.6-6.9-3.2-10.3-4.8
                                                        c-0.6,1-1.1,2-1.7,3L560,280c-0.8,1.5-1.7,3-2.5,4.5c-1.9-3.6-3.8-7.2-5.7-10.8c-4.4,1.4-8.7,2.7-13.1,4.1
                                                        c-7.2-2.5-14.3-5.1-21.5-7.6c-2.7,1.4-5.3,2.8-8,4.2c-3.3-2.3-6.7-4.7-10-7c-2.6-0.7-5.3-1.3-7.9-2c1.8-1.8,3.6-3.6,5.3-5.4
                                                        l-1.1-6.3l14.4-2.6l-4.4-7.4l7.8-0.4l1.8-10.3l-6.3-7.8l11.1-13.3l-0.4-41.3L531.7,160.9L531.7,160.9z" />
                                                </g>
                                                <g class="municipio" id="baranoa">
                                                    <path class="municipios"
                                                        d="M490.3,266.2c3.9,0.6,7.9,1.1,11.8,1.7l7,6.7l8.1-4.8l21.4,8.1l12.9-4.4l5.9,11.1l7-12.6l10,4.4l24-3.3
                                                        l6.7,19.2l-12.9,12.2l-2.2,8.9c-2.9,1.2-5.7,2.3-8.6,3.5c0.7,0.8,1.3,1.6,1.9,2.4l8.9,8.1l-14,7.8l14.8,7.4l-1.1,4.8h-5.2
                                                        l-10.3,6.3l7.8,2.6l-0.4,6.3l-4.8,3l-2.2,14.4h-12.9l-3.7,13.3l6.7,8.9c0.1,2.2,0.2,4.4,0.4,6.7c1.5,0.5,3,1,4.4,1.5
                                                        c0.1,2.3,0.3,4.5,0.4,6.8c1.9,0.7,3.9,1.4,5.8,2.1c1.2-1.1,2.5-2.2,3.7-3.3c1.6,0.7,3.2,1.4,4.7,2.1c1.6,0.9,3.1,1.8,4.7,2.7
                                                        c-0.4,1.7-0.9,3.4-1.3,5.1h-10l-3.7,7l-21.4-2.2l-5.9,5.2l-7.8,11.1h-10.7l-5.9,3.3l-0.7-4.4l5.5-5.5l-1.5-4.4l-8.5,3.7v4.1
                                                        l-11.4-8.9l-2.6,3.7c-3.6-0.4-7.1-0.7-10.7-1.1c0.8-2.2,1.6-4.5,2.4-6.7c2-1.8,4-3.7,6.1-5.5c0.5-3.4,1-6.8,1.5-10.2
                                                        c0.1-3.8,0.2-7.7,0.3-11.5c3.3-1.4,6.7-2.8,10-4.1l2.2-12.6l-9.2-4.4l1.1-11.1l-20.3-13.5c-2.7,0.1-5.4,0.1-8.1,0.2
                                                        c-2.5-2.3-4.9-4.7-7.4-7h-15.5l-6.3-6.3c-6-0.9-12.1-1.7-18.1-2.6c-5.5-5.2-11.1-10.3-16.6-15.5c1.5-1.6,3-3.2,4.4-4.8l-5.9-7
                                                        c3.6-2,7.1-3.9,10.7-5.9c1.5,2,3,3.9,4.4,5.9l13.3-0.4c5.1-2.1,10.1-4.2,15.1-6.3c-0.4-3.6-0.7-7.2-1-10.8c2-4.2,3.9-8.3,5.8-12.5
                                                        c5.7-1.9,11.3-3.7,17-5.6C483.7,274.8,487,270.5,490.3,266.2L490.3,266.2z" />
                                                </g>
                                                <g class="municipio" id="tubara">
                                                    <path class="municipios"
                                                        d="M436.4,118.1c2.1,2.7,4.2,5.4,6.3,8.1c2.6-1.1,5.2-2.2,7.8-3.2c2.6-0.9,5.2-1.8,7.7-2.7
                                                        c3.4,0.1,6.9,0.2,10.3,0.4c5.5,3.8,11.1,7.6,16.6,11.4c2.5-1.7,4.9-3.4,7.4-5.2c1.6,1.5,3.2,3,4.8,4.4c2.8-0.1,5.7-0.2,8.5-0.4
                                                        c-0.2-2.7-0.5-5.4-0.7-8.1l5.5,1.8h12.6l7,7.4l-2.6,5.5l-10.7,3.7v8.1l-5.5,6.7h12.6l8.1,5.5l-14,10.7l0.7,40.6
                                                        c-1.7,2.2-3.4,4.4-5,6.6c-1.6,2-3.3,3.9-4.9,5.9l4.3,5.3c0.4,0.9,0.8,1.9,1.3,2.8c-0.4,3.3-0.7,6.7-1.1,10
                                                        c-2.6,0.1-5.2,0.2-7.8,0.4c1.5,2.5,3,4.9,4.4,7.4c-4.8,0.9-9.6,1.7-14.4,2.6l1.1,6.3c-5.5,6.4-11.1,12.8-16.6,19.2l-16.6,5.2
                                                        l-5.9,11.8l1.1,11.4l-16.2,6.7h-12.2l-4.4-5.9l-10.7,5.9l-1.6-8.9l7.1-4.1l-4.8-4.4h-15.1c-0.9-1.2-1.7-2.5-2.6-3.7
                                                        c2.2-1.1,4.4-2.2,6.7-3.3c-3.6-3.9-7.1-7.9-10.7-11.8c1.4-2.2,2.7-4.4,4.1-6.7c-2.8-1.5-5.7-3-8.5-4.4h-19.2
                                                        c-3.2-2.2-6.4-4.4-9.6-6.7l-12.2-5.2l-2.2-9.2l-10-6.3l-4.4,2.6l-3.3-6.7h-5.9c-1.9,2.4-3.8,4.7-5.7,7.1c-2.8-2.6-5.5-5.2-8.3-7.8
                                                        l18.5-7.4l12.9-1.1l23.6-20.7l-1.5-8.5l-5.9-2.2l5.5-12.6l5.2-2.2l7-17.7l-5.9-8.5l-8.1,0.4l-5.2,7.8l-8.9,0.4l-4.1,4.8l-1.5-7
                                                        l5.5-7l12.9-3.7l6.7-3l25.8-20.3l13.3-3.7l-0.4-5.5C415,117.6,425.7,117.8,436.4,118.1L436.4,118.1z" />
                                                </g>
                                                <g class="municipio" id="juan_de_acosta">
                                                    <path class="municipios"
                                                        d="M308.7,235.1c2.8,2.6,5.5,5.2,8.3,7.8c1.9-2.4,3.8-4.7,5.7-7.1c2.1,0.2,4.1,0.4,6.2,0.5l3.1,6.1
                                                        c1.5-0.9,3-1.7,4.4-2.6c3.3,2.1,6.7,4.2,10,6.3c0.7,3.1,1.5,6.2,2.2,9.2c4.6,2.2,9.1,4.4,13.7,6.7c1.5,0.9,3,1.8,4.5,2.7
                                                        c1.2,0.8,2.4,1.7,3.6,2.5h19.2l8.5,4.4l-4.1,6.7l6.3,7.8l5.5,4.1l-7.8,3.3l2.6,3.7h12.8l7.5,4.4l-7.5,4.8l2.3,8.9l5.2,6.3l-4.4,4.8
                                                        l18.5,15.5v8.9l-6.3,3l-11.1-8.1l-9.2,9.6v5.9h-25.1l-5.2-3.7l-0.4,13.7l-4.8,3l-20.7-10.3l-11.1,5.2c-3.7-0.3-7.3-0.6-11-0.9
                                                        c-1.5-0.5-3-0.9-4.5-1.3c-3.6,2.7-7.1,5.4-10.7,8.1c-0.6-2-1.2-3.9-1.8-5.9c-6.3-0.2-12.6-0.5-18.8-0.7L260,345.9l-5.9,3.3v5.2
                                                        l-7.8,0.4l-6.7-5.5l-6.7-0.4l-9.2-26.2l-7.4,2.6l-28.4-3l-10.7,7.4l-6.7-3.7l-42.8,1.5l-3.3-5.5l-6.3,7.8l-7.8-0.4v-5.9l-5.9,1.8
                                                        l-13.3,3.3l7-7.4l1.8-6.7L123,316l22.5-15.1l35.1-0.7l9.6-5.5l-1.5-8.5l4.1-0.4l7.4-13.3l17.7-2.2l-0.4-8.9l10.7,0.7l32.9-4.8
                                                        c0.5-2.7,0.9-5.4,1.4-8c8-1.3,16.1-2.6,24.1-3.9c0.6-3.4,1.2-6.8,1.8-10.2L308.7,235.1L308.7,235.1z" />
                                                </g>
                                                <g class="municipio" id="usiacuri">
                                                    <path class="municipios"
                                                        d="M434.2,341.8l17,2.6l6.3,6.3H473l7.4,7h7.8l19.9,14v9.2l8.5,6.7l-1.5,11.4l-10.3,3.7l-0.4,12.6l-2.2,10.3
                                                        l-7,6.3l-0.7,5.2h10.3l-0.4,6.7l-4.8,4.4l0.4,10h-13.7l-10.9,3.3l-17.2-1.5l-4.4,11.8l-23.7-21.8c-1.6-0.5-3.2-0.9-4.8-1.4v5.2
                                                        l-18.6-13.8c-5.4,1-10.9,2.1-16.4,3.1c-3.2,0.6-6.5,1.2-9.7,1.9c-5.3-3-10.6-5.9-15.9-8.9c-8.2,3.8-16.4,7.6-24.6,11.5
                                                        c-1.4-1-2.7-2.1-4.1-3.1l6.6-6.6v-4.4c1.5-0.5,3-1,4.4-1.5c1.5-2.8,3-5.5,4.4-8.3c4.2-1.2,8.5-2.5,12.7-3.7l4.6-17.9
                                                        c-2.5-2.7-4.9-5.4-7.4-8.1c-0.5-2.5-1-4.9-1.5-7.4c-7.3-1.3-14.6-2.7-21.9-4c1.2-4.7,2.5-9.3,3.7-14c3.5-1.6,7-3.3,10.5-4.9
                                                        l21,10.1l4.5-2.8c0.1-4.4,0.2-8.8,0.4-13.2c1.9,1,3.7,1.9,5.5,2.9c8.2,0.1,16.5,0.2,24.7,0.4V355c3.1-3.2,6.2-6.4,9.2-9.6
                                                        c3.7,2.7,7.4,5.4,11.1,8.1c2.1-1,4.2-2,6.3-3C434.7,347.7,434.5,344.7,434.2,341.8L434.2,341.8z" />
                                                </g>
                                                <g class="municipio" id="piojo">
                                                    <path class="municipios" d="M92.4,328.9l12.2-2.6l5.5-3l2.6,5.5h10.7l1.5-5.5l3.3,2.8h45l4.1,5.3l11.1-8.1l25.1,2.2l10.3-2.2l10.3,25.1
                                                        l10,3.7h9.6l6.3-7l35.4,23.6h17.7l1.8,5.9c2.2-1.7,4.5-3.4,6.7-5.1c1.3-1,2.6-2,4-3.1c5.4,0.9,10.8,1.7,16.2,2.6l-4.1,14l22.1,3.3
                                                        l1.5,7.4l7.4,8.1l-4.8,18.5l-12.9,3.7l-4.1,7.8l-4.4,1.5v4.4l-7.4,7.4l-6.3,3.7l-5.5,3.6c-2.2,1.1-4.4,2.3-6.5,3.4
                                                        c3.3,4.6,6.7,9.2,10,13.8c-3.5-0.3-6.9-0.7-10.4-1c-18.7-0.6-37.5-1.2-56.2-1.8c-4.3-4.1-8.6-8.1-12.9-12.2
                                                        c-1.4,1.6-2.7,3.2-4.1,4.8c-4.3,0.8-8.6,1.5-12.9,2.2c-4.7-0.2-9.4-0.5-14-0.7l-6.3-3.7l1.1,8.5l-7.8,11.4l-11.1-11.8l-18.5,3
                                                        l-5.9-5.5l-2.6,5.9l-35.1-0.4l-13.7-4.4c-3,4.9-5.9,9.8-8.9,14.8c-1.8,0.7-3.7,1.5-5.5,2.2c-8.7-10.6-17.3-21.2-26-31.7
                                                        c-8.9,0-17.8,0-26.8,0l-3.7-14.4c-2.8-3.4-5.7-6.9-8.5-10.3c11.6-13.3,23.1-26.6,34.7-39.9l1.1-9.2l10-8.1l-15.5-8.1l12.9-10.3
                                                        l1.1-8.5l10-2.6L92.4,328.9L92.4,328.9z" />
                                                </g>
                                                <g class="municipio" id="luruaco">
                                                    <path class="municipios"
                                                        d="M315.7,468.4v14l8.9,3.7l2.2,12.6l-11.1,6.3l2.6,18l8.5,20.1l-1.5,34.3l-36.1-16.7c-2.1-0.8-4.2-1.7-6.3-2.5
                                                        c-4.3,7.4-8.6,14.8-12.9,22.1c-7.8-1.8-15.5-3.7-23.2-5.5c-2.7-3-5.4-5.9-8.1-8.9h-15.1v8.2c-2.8,2.3-5.7,4.7-8.5,7
                                                        c-0.4,5.3-0.7,10.6-1.1,15.9l-12.9-8.7c-0.9-0.7-1.7-1.3-2.6-2l-5.2,10.7l-26.9-7l-7.8,11.1l-17,5.9l-9.6,7.4
                                                        c-2.6,2.2-5.1,4.4-7.7,6.6c0.8,3.9,1.5,7.8,2.3,11.7c2.2,0.9,4.3,1.8,6.5,2.7l1.1,6.7c-4.6,4.8-9.1,9.6-13.7,14.4
                                                        c-3.1,0.1-6.2,0.2-9.2,0.4c-1.5-1.2-3-2.5-4.4-3.7l-8.5,0.1c-0.1-3.1-0.2-6.2-0.4-9.3c3.6-4.9,7.1-9.8,10.7-14.8
                                                        c-0.6-1.2-1.2-2.5-1.8-3.7L98,614.2l-6.3,2.6c-1.5-2.3-3-4.6-4.5-6.9l-4.7-7.8L73.2,615l-8.1,4.4l-7.8-11.8V581l15.5-20.7l4.1-21.4
                                                        L63.3,519l-34.3-19.2l-22.1-8.5L9,479.5l-5.9-15.1l25.1-9.2l-2.6-15.9l11.8-14.8l5.9,6.3l3.3,5.5l2.2,13.3l28.4-0.4l25.1,31.7
                                                        l5.5-2.2l7.8-14l17,3l32.3,1.5l2.4-5.9l4.8,6.3l22.5-3c3,3.5,6.1,6.9,9.1,10.4c2.8-3.8,5.5-7.6,8.3-11.4c-0.6-2.7-1.2-5.5-1.8-8.2
                                                        l5.5,2.6c2.7,0.5,5.5,1,8.2,1.5c2.2,0.1,4.4,0.2,6.6,0.3l12.6-1.8l4.4-5.2l15.1,12.2L315.7,468.4L315.7,468.4z" />
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="au-card recent-report">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 mb-4 text-center"></h3>
                                        <div class="recent-report__chart">

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">Motores registrados</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Serie</th>
                                                <th>Empresa</th>
                                                <th>Tecnico</th>
                                                <th>Ubicación</th>
                                                <th>Estado</th>
                                                <th>Registro</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($this->motores as $motor) {
                                                echo '<tr>';
                                                echo '<td>' . $motor["infmot_serie"] . '</td>';
                                                echo '<td>';
                                                foreach ($this->empresas as $empresa) {
                                                    if ($empresa["emp_id"] == $motor["infmot_empresaFK"]) {
                                                        echo $empresa["emp_nombre"];
                                                    }
                                                }
                                                echo '</td>';
                                                echo '<td>';
                                                foreach ($this->tecnicos as $tecnico) {
                                                    if ($tecnico["tec_id"] == $motor["infmot_tecnicoFK"]) {
                                                        echo $tecnico["tec_nombre1"] . ' ' . $tecnico["tec_apellido1"];
                                                    }
                                                }
                                                echo '</td>';
                                                echo '<td>';
                                                foreach ($this->ubicaciones as $ubicacion) {
                                                    if ($motor["infmot_ubicacionFK"] == $ubicacion["ubimot_id"]) {
                                                        echo $ubicacion["ubimot_area"];
                                                    }
                                                }
                                                echo '</td>';
                                                echo '<td>';
                                                foreach ($this->estados as $estado) {
                                                    if ($motor["infmot_estadoFK"] == $estado["est_id"]) {
                                                        echo $estado["est_nombre"];
                                                    }
                                                }
                                                echo '</td>';
                                                echo '<td>' . $motor["infmot_registro"] . '</td>';
                                                echo '</tr>';
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title"
                                        style="background-image:url('public/images/bg-title-01.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3><i class="fas fa-building"></i>Empresas</h3>
                                    </div>
                                    <div class="au-inbox-wrap js-inbox-wrap">
                                        <div class="au-message js-list-load">
                                            <div class="au-message__noti">
                                                <!-- Formulario de búsqueda -->
                                                <form class="form-header" action="" method="POST">
                                                    <input class="au-input au-input--l" type="text" name="search"
                                                        placeholder="Bucar empresas" />
                                                    <button class="au-btn--submit" type="submit">
                                                        <i class="zmdi zmdi-search"></i> <!-- Icono de búsqueda -->
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="au-message-list">
                                                <div class="au-message__item unread">
                                                    <div class="au-message__item-inner">
                                                        <div class="au-message__item-text">
                                                            <div class="avatar-wrap">
                                                                <div class="avatar">
                                                                    <img src="public/dashboard/images/icon/avatar-02.jpg"
                                                                        alt="John Smith">
                                                                </div>
                                                            </div>
                                                            <div class="text">
                                                                <h5 class="name">John Smith</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="au-message__footer"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title"
                                        style="background-image:url('public/landing_page/images/bg-title-02.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3><i class="fas fa-users"></i>Tecnicos</h3>
                                    </div>
                                    <div class="au-inbox-wrap js-inbox-wrap">
                                        <div class="au-message js-list-load">
                                            <div class="au-message__noti">
                                                <!-- Formulario de búsqueda -->
                                                <form class="form-header" action="" method="POST">
                                                    <input class="au-input au-input--l" type="text" name="search"
                                                        placeholder="Bucar tecnicos" />
                                                    <button class="au-btn--submit" type="submit">
                                                        <i class="zmdi zmdi-search"></i> <!-- Icono de búsqueda -->
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="au-message-list">
                                                <div class="au-message__item unread">
                                                    <div class="au-message__item-inner">
                                                        <div class="au-message__item-text">
                                                            <div class="avatar-wrap online">
                                                                <div class="avatar">
                                                                    <img src="public/dashboard/images/icon/avatar-03.jpg"
                                                                        alt="Nicholas Martinez">
                                                                </div>
                                                            </div>
                                                            <div class="text">
                                                                <h5 class="name">Nicholas Martinez</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="au-message__footer"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a
                                            href="https://colorlib.com">Colorlib</a>.</p>
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
            <?php
            include("view/empresa/index.php");
            ?>
        </div>

        <div class="page-container d-none" id="viewTecnicos">
            <?php
            include("view/tecnico/index.php");
            ?>
        </div>

        <div class="page-container d-none" id="viewMotores">
            <?php
            include("view/motor/index.php");
            ?>
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

</body>

</html>
<!-- end document-->