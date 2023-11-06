<link rel="stylesheet" href="public\css\contrasena.css">
<title>Recuperar Contraseña</title>
<div class="container">
    <div class="cont_form" id="">

        <form method="POST" action="?controller=main&action=rPassword" class="form" id="form-recoverPassword"
            onsubmit="return false">

            <h2 class="title">Recuperar<br> Contraseña</h2>

            <div class="cont_input">
                <label>Numero de documento o NIT</label>
                <!-- <i class="fa fa-user"></i> -->
                <input type="number" id="validId" inputmode="none" pattern="[0-9]*"
                    placeholder="Ingrese su N. Identificación">
            </div>

            <div class="cont_input">
                <label>Corrreo Electronico</label>
                <!-- <i class="fa fa-user"></i> -->
                <input type="email" id="validEmail" placeholder="Ingrese su Email">
            </div>

            <div class="button">
                <button type="submit" id="form-recoverPassword-btn"><span>Enviar</span></button>
            </div>

        </form>
    </div>
</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>

<script type="text/javascript">
    emailjs.init('pdkSkxkJpo7uoM93W')
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>;
<script type="module" src="public/js/recuperarContraseña.js"></script>