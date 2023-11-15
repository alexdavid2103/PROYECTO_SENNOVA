<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>password</title>
    <link href="public/dashboard/css/password.css" rel="stylesheet" media="all">
    <!-- Fontawesome CDN Link For Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
</head>

<body>
    <form action="#" id="passwordContainer">
        <h2>Cambiar Contraseña</h2>
        <div class="form-group password">
            <label for="cont_anterior">Contraseña Anterior</label>
            <input type="password" id="cont_anterior" placeholder="Ingrese su contraseña anterior" required>
            <i id="pass-toggle-btn" class="fa-solid fa-eye" data-target="cont_anterior"></i>
        </div>
        <div class="form-group password">
            <label for="password">Contraseña Nueva</label>
            <input type="password" id="password" placeholder="Ingrese su nueva contraseña" required>
            <i id="pass-toggle-btn" class="fa-solid fa-eye" data-target="password"></i>
        </div>
        <div class="form-group password">
            <label for="confirm_password">Confirmar Contraseña</label>
            <input type="password" id="confirm_password" placeholder="confirmar contraseña" required>
            <i id="pass-toggle-btn" class="fa-solid fa-eye"  data-target="confirm_password"></i>
        </div>
        <div class="form-group submit-btn">
            <input type="submit" value="Cambiar">
        </div>
    </form>

    <script src="public/js/password.js"></script>
</body>

</html>