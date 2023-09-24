<link rel="stylesheet" href="public\css\login.css">
<title>Iniciar sesión</title>
<div class="container">
    <div class="cont_form" id="">

        <!-- <figure class="login_img">
            <img src="public\img/Logo_blanco.png" alt="">
        </figure> -->

        <form method="POST" action="?controller=usuario&action=validar" class="form" onsubmit="return false">

            <h2 class="title">Iniciar sesión</h2>

            <div class="cont_input">
                <label>Numero de documento</label>
                <!-- <i class="fa fa-user"></i> -->
                <input type="number" id="id" inputmode="none" pattern="[0-9]*" required>
            </div>

            <div class="cont_input">
                <label>Contraseña</label>
                <!-- <i class="fa fa-lock"></i> -->
                <input type="password" id="password" required>
            </div>

            <div class="password">
                <p><a href="#">Olvidaste tu contraseña?</a></p>
            </div>

            <div class="button">
                <button type="submit" id="" onclick="login(event)"><span>Ingresar</span></button>
            </div>

            <div class="registro_seccion">
                <p>¿No tienes cuenta? <a href="?controller=main&action=registro">Registrate</a></p>
            </div>

        </form>
    </div>
</div>
<script src="public/js/login.js" type="text/javascript"></script>