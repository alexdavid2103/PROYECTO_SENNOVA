<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="public/css/ubicacion_motor.css" />
</head>

<body>
    <form class="form-add-ubimot" id="form_add_ubimot" onsubmit="return false">
        <label class="form-add-ubimot-label">Ubicación de los motores</label>
        <textarea class="form-add-ubimot-textArea" id="add_ubimot"></textarea>
        <p class="form-add-ubimot-text">
            Ingrese las ubicaciones en las que se encuentran ubicados los motores
            separados por comas (,).
        </p>
        <input class="form-add-ubimot-button" type="submit" value="Agregar  " />
    </form>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>;
    <script type="module" src="public/js/ubicacionMotor.js"></script>
</body>

</html>