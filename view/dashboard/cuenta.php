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
      <form onsubmit="return false" id="formUpdateInfo">
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
                <?php
                $id = $fields[$label];
                ?>
                <div class="input-box">
                  <span class="details">
                    <?= $label ?>
                  </span>
                  <input id="<?= $id ?>" value="<?= $data[$field] ?>" type="text"
                    placeholder="Ingrese su <?= strtolower($label) ?>">
                </div>
              <?php endforeach ?>

              <?php if ($_SESSION["rol"] === "emp"): ?>
                <div class="input-box">
                  <span class="details">Municipio</span>
                  <select id="emp_municipio" data-municipio="<?= $data["emp_municipioFK"] ?>">

                    <?php foreach ($selectData as $municipio): ?>
                      <option value="<?= $municipio['mun_id'] ?>">
                        <?= $municipio['mun_nombre'] ?>
                      </option>
                    <?php endforeach ?>

                  </select>
                </div>
              <?php endif ?>

              <div class="input-box input-box-image">
                <span class="details">Imagen</span>
                <?php $image = $_SESSION['rol'] === 'emp' ? $data[$_SESSION["rol"] . "_logo"] : $data[$_SESSION["rol"] . "_foto"] ?>
                <input id="UpdateImage" type="file" value="<?= "public/userImages/{$image}" ?>">
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
        let value = document.getElementById("emp_municipio").getAttribute("data-municipio");
        let select = document.getElementById("emp_municipio");
        for (let option of select.options) {
          if (option.value === value) {
            option.selected = true;
            break;
          }
        }
      })
    </script>
  <?php endif ?>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <?php
  switch ($_SESSION['rol']) {
    case 'adm':
      echo '<script type="module" src="public/js/admin.js"></script>';
      break;
    case 'emp':
      echo '<script type="module" src="public/js/emp.js"></script>';
      break;
    case 'tec':
      echo '<script type="module" src="public/js/tec.js"></script>';
      break;
  }
  ?>
</body>

</html>