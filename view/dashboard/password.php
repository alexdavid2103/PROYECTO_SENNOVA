<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>password</title>
    <link href="public/dashboard/css/password.css" rel="stylesheet" media="all">
    <!-- Fontawesome CDN Link For Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
</head>

<body>
    <form action="?controller=main&action=updatePassword" id="form-update-password" onsubmit="return false">
        <h2>Cambiar Contraseña</h2>
        <div class="form-group password">
            <label for="currentPassword">Contraseña Anterior</label>
            <input type="password" id="currentPassword" placeholder="Ingrese su contraseña anterior">
            <i id="pass-toggle-btn" class="fa-solid fa-eye" data-target="cont_anterior"></i>
        </div>
        <div class="form-group password">
            <label for="newPassword">Contraseña Nueva</label>
            <input type="password" id="newPassword" placeholder="Ingrese su nueva contraseña">
            <i id="pass-toggle-btn" class="fa-solid fa-eye" data-target="password"></i>
        </div>
        <div class="form-group password">
            <label for="confirmNewPassword">Confirmar Contraseña</label>
            <input type="password" id="confirmNewPassword" placeholder="confirmar contraseña">
            <i id="pass-toggle-btn" class="fa-solid fa-eye" data-target="confirm_password"></i>
        </div>
        <div class="form-group submit-btn">
            <input type="submit" value="Cambiar">
            <button type="button" onclick="goBack()">Regresar</button>
        </div>
    </form>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="module" src="public/js/updatePassword.js"></script>
</body>

</html>