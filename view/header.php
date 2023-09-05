<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="public/css/nav.css">
    <link rel="stylesheet" href="public/css/footer.css">
</head>

<body>
    <div class="cont_nav">
        <nav class="nav">
            <a href="?controller=main&action=index">
                <div class="logo">
                    <img src="public/img/senatech.png" alt="">
                    <!-- <p>SenaTech</p> -->
                </div>
            </a>

            <button class="fa fa-bars"></button>
            <!-- <button class="fa fa-close"></button> -->

            <ul class="links">
                <li><a class="link" href="?controller=main&action=index">Inicio</a></li>
                <?php
                if (isset($_SESSION['id'])) {
                    echo '<li><a class="link" href="?controller=usuario&action=salir">Salir</a></li>';
                } else {
                    echo '<li><a class="link" href="?controller=dashboard&action=index">Dashboard</a></li>';
                    echo '<li><a class="link" href="?controller=main&action=login">Iniciar sesión</a></li>';
                    echo '<li><a class="link" href="?controller=main&action=register">Registrarse</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>