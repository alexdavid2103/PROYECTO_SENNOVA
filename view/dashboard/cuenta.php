<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> </title>
  <link href="public/dashboard/css/cuenta.css" rel="stylesheet" media="all">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="public/img/logo.png" type="image/x-icon">
</head>

<body>
  <div class="container">
    <div class="title">Cambiar Información</div>
    <div class="content">
      <form action="#">
        <?php
        $userData = [];
        $fields = [];
        $selectData = [];

        switch ($_SESSION["rol"]) {
          case "emp":
            $userData = $this->empresas;
            $fields = [
              'Nombre' => 'emp_nombre',
              'Correo' => 'emp_correo',
              'Telefono' => 'emp_telefono',
              'Direccion' => 'emp_direccion'
            ];
            $selectData = $this->municipios;
            break;
          case "tec":
            $userData = $this->tecnicos;
            $fields = [
              'Primer Nombre' => 'tec_nombre1',
              'Segundo Nombre' => 'tec_nombre2',
              'Primer apellido' => 'tec_apellido1',
              'Segundo apellido' => 'tec_apellido2',
              'Correo' => 'tec_correo',
              'Telefono' => 'tec_telefono'
            ];
            break;
          case "adm":
            $userData = $this->admins;
            $fields = [
              'Primer Nombre' => 'adm_nombre1',
              'Segundo Nombre' => 'adm_nombre2',
              'Primer apellido' => 'adm_apellido1',
              'Segundo apellido' => 'adm_apellido2',
              'Correo' => 'adm_correo',
              'Telefono' => 'adm_telefono'
            ];
            break;
        } ?>

        <?php foreach ($userData as $data): ?>
          <?php if ($_SESSION["id"] === $data[$_SESSION["rol"] . "_id"]): ?>
            <div class="user-details">

              <?php foreach ($fields as $label => $field): ?>
                <div class="input-box">
                  <span class="details">
                    <?= $label ?>
                  </span>
                  <input value="<?= $data[$field] ?>" type="text" placeholder="Ingrese su <?= strtolower($label) ?>" required>
                </div>
              <?php endforeach ?>

              <?php if ($_SESSION["rol"] === "emp"): ?>
                <div class="input-box">
                  <span class="details">Municipio</span>
                  <select id="edit-perfil-mun" data-municipio="<?= $data[" emp_municipioFK"] ?>">

                    <?php foreach ($selectData as $municipio): ?>
                      <option value="<?= $municipio['mun_id'] ?>">
                        <?= $municipio['mun_nombre'] ?>
                      </option>
                    <?php endforeach ?>

                  </select>
                </div>
              <?php endif ?>

              <div class="input-box">
                <span class="details">Imagen</span>
                <input type="file" required>
              </div>
            </div>
            <div class="button">
              <input type="submit" value="Guardar">
            </div>

          <?php endif ?>
        <?php endforeach ?>

      </form>
    </div>
  </div>
  <?php if ($_SESSION['rol'] === 'emp'): ?>
    <script>
      window.addEventListener("DOMContentLoaded", () => {
        let value = document.getElementById("edit-perfil-mun").getAttribute("data-municipio");
        let select = document.getElementById("edit-perfil-mun");
        for (let option of select.options) {
          if (option.value === value) {
            option.selected = true;
            break;
          }
        }
      })
    </script>
  <?php endif ?>
</body>

</html>