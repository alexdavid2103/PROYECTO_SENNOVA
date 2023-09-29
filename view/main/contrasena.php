<link rel="stylesheet" href="public\css\contrasena.css">
<title>Recuperar Contraseña</title>
<div class="container">
    <div class="cont_form" id="">

        <form method="POST" action="?controller=usuario&action=validar" class="form" onsubmit="return false">

            <h2 class="title">Recuperar<br> Contraseña</h2>

            <div class="cont_input">
                <label>Corrreo Electronico</label>
                <!-- <i class="fa fa-user"></i> -->
                <input type="number" id="id" inputmode="none" pattern="[0-9]*" placeholder="Ingrese su Email" required>
            </div>

            <div class="button">
                <button type="submit" id="" onclick="login(event)"><span>Enviar</span></button>
            </div>

        </form>
    </div>
</div>