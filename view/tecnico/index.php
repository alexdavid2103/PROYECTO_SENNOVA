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
    <link href="public/dashboard/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="public/dashboard/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="public/dashboard/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="public/dashboard/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="public/dashboard/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="public/dashboard/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="public/dashboard/css/theme.css" rel="stylesheet" media="all">

    <!--  -->
    <link rel="stylesheet" href="public/dashboard/css/form.css">

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
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="index.html">Dashboard 1</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="?controller=dashboard&action=charts"><i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
                            <a href="table.html"><i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="form.html"><i class="far fa-check-square"></i>Forms</a>
                        </li>
                        <li>
                            <a href="calendar.html"><i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.html"><i class="fas fa-map-marker-alt"></i>Maps</a>
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
                        <li class="active has-sub">
                            <a class="js-arrow" href="?controller=dashboard&action=index"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="">
                            <a href="?controller=dashboard&action=empresas"><i class="fas fa-chart-bar"></i>Empresas</a>
                        </li>
                        <li class="">
                            <a href="?controller=dashboard&action=tecnicos"><i class="fas fa-table"></i>Tecnicos</a>
                        </li>
                        <li class="">
                            <a href="?controller=dashboard&action=motores"><i class="far fa-check-square"></i>Motores</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
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
                                                    <img src="public/dashboard/images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <!-- Otra notificación de correo electrónico individual -->
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="public/dashboard/images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
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
                                                        <img src="public/dashboard/images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">john doe</a>
                                                    </h5>
                                                    <span class="email">johndoe@example.com</span> <!-- Correo electrónico del usuario -->
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

            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <!-- <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Credit Card</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Pay Invoice</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Payment amount</label>
                                                <input id="cc-pament" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false" value="100.00">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Name on card</label>
                                                <input id="cc-name" name="cc-name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Card number</label>
                                                <input id="cc-number" name="cc-number" type="tel" class="form-control cc-number identified visa" value="" data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Expiration</label>
                                                        <input id="cc-exp" name="cc-exp" type="tel" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration"
                                                            data-val-cc-exp="Please enter a valid month and year" placeholder="MM / YY"
                                                            autocomplete="cc-exp">
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Security code</label>
                                                    <div class="input-group">
                                                        <input id="x_card_code" name="x_card_code" type="tel" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code"
                                                            data-val-cc-cvc="Please enter a valid security code" autocomplete="off">

                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Pay $100.00</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <section class="container">
                <header>Registration Form</header>
                <form action="#" class="form">
                    <div class="input-box">
                        <label>Full Name</label>
                        <input type="text" placeholder="Enter full name" required />
                    </div>

                    <div class="input-box">
                        <label>Email Address</label>
                        <input type="text" placeholder="Enter email address" required />
                    </div>

                    <div class="column">
                        <div class="input-box">
                            <label>Phone Number</label>
                            <input type="number" placeholder="Enter phone number" required />
                        </div>
                        <div class="input-box">
                            <label>Birth Date</label>
                            <input type="date" placeholder="Enter birth date" required />
                        </div>
                    </div>
                    <div class="gender-box">
                        <h3>Gender</h3>
                        <div class="gender-option">
                            <div class="gender">
                                <input type="radio" id="check-male" name="gender" checked />
                                <label for="check-male">male</label>
                            </div>
                            <div class="gender">
                                <input type="radio" id="check-female" name="gender" />
                                <label for="check-female">Female</label>
                            </div>
                            <div class="gender">
                                <input type="radio" id="check-other" name="gender" />
                                <label for="check-other">prefer not to say</label>
                            </div>
                        </div>
                    </div>
                    <div class="input-box address">
                        <label>Address</label>
                        <input type="text" placeholder="Enter street address" required />
                        <input type="text" placeholder="Enter street address line 2" required />
                        <div class="column">
                            <div class="select-box">
                                <select>
                                    <option hidden>Country</option>
                                    <option>America</option>
                                    <option>Japan</option>
                                    <option>India</option>
                                    <option>Nepal</option>
                                </select>
                            </div>
                            <input type="text" placeholder="Enter your city" required />
                        </div>
                        <div class="column">
                            <input type="text" placeholder="Enter your region" required />
                            <input type="number" placeholder="Enter postal code" required />
                        </div>
                    </div>
                    <button>Submit</button>
                </form>
            </section>
            <!-- END MAIN CONTENT-->

            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="public/dashboard/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="public/dashboard/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="public/dashboard/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- dashboard/Vendor JS       -->
    <script src="public/dashboard/vendor/slick/slick.min.js">
    </script>
    <script src="public/dashboard/vendor/wow/wow.min.js"></script>
    <script src="public/dashboard/vendor/animsition/animsition.min.js"></script>
    <script src="public/dashboard/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="public/dashboard/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="public/dashboard/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="public/dashboard/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="public/dashboard/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="public/dashboard/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="public/dashboard/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="public/dashboard/js/main.js"></script>

</body>

</html>
<!-- end document-->