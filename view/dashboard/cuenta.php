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
            $fields = ['Nombre' => 'emp_nombre', 'Email' => 'emp_correo', 'Telefono' => 'emp_telefono', 'Direccion' => 'emp_direccion'];
            $selectData = $this->municipios;
            break;
          case "tec":
            $userData = $this->tecnicos;
            $fields = ['Nombre' => 'tec_nombre1', 'Email' => 'tec_correo', 'Telefono' => 'tec_telefono'];
            break;
          case "adm":
            $userData = $this->admins;
            $fields = ['Nombre' => 'adm_nombre1', 'Email' => 'adm_correo', 'Telefono' => 'adm_telefono'];
            break;
        }

        foreach ($userData as $data) {
          if ($_SESSION["id"] === $data[$_SESSION["rol"] . "_id"]) {
            echo '<div class="user-details">';
            foreach ($fields as $label => $field) {
              echo '<div class="input-box">
                      <span class="details">' . $label . '</span>
                      <input value="' . $data[$field] . '" type="text" placeholder="Ingrese su ' . strtolower($label) . '" required>
                    </div>';
            }
            if ($_SESSION["rol"] === "emp") {
              echo '<div class="input-box">
                      <span class="details">Municipio</span>
                      <select id="edit-perfil-mun" data-municipio="' . $data["emp_municipioFK"] . '">';
              foreach ($selectData as $municipio) {
                echo '<option value="' . $municipio['mun_id'] . '">' . $municipio['mun_nombre'] . '</option>';
              }
              echo '</select></div>';
            }
            echo '<div class="input-box">
                    <span class="details">Imagen</span>
                    <input type="file" required>
                  </div>
                  </div>
                  <div class="button">
                    <input type="submit" value="Guardar">
                  </div>';
            break;
          }
        }
        ?>
      </form>
    </div>
  </div>
  <?php if ($_SESSION['rol'] === 'emp') {
    echo '
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
  </script>';
  }
  ?>
</body>

</html>