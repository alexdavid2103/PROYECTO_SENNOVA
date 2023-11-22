<link rel="stylesheet" href="public\css\registro.css">
<title>Registrate</title>

<div class="container">
  <div class="title">Registrarse</div>
  <div class="content">

    <form method="POST" action="?controller=empresa&action=add" id="form_add_empresa" onsubmit="return false">
      <div class="user-details">

        <div class="input-box">
          <span class="details">NIT</span>
          <input type="text" id="add_emp_id" placeholder="Ingrese el NIT de la empresa">
        </div>

        <div class="input-box">
          <span class="details">Nombre</span>
          <input type="text" id="add_emp_nombre" placeholder="Ingrese el nombre">
        </div>

        <div class="input-box">
          <span class="details">Correo</span>
          <input type="email" id="add_emp_correo" placeholder="Ingrese el correo">
        </div>

        <div class="input-box">
          <span class="details">Telefono</span>
          <input type="text" id="add_emp_telefono" placeholder="Ingrese su telefono">
        </div>

        <div class="input-box">
          <span class="details" for="Sexo">Municipio</span>
          <select class="select" name="Sexo" id="add_emp_municipio">
            <option value="" selected>Seleciona tu municipio</option>
            <?php foreach ($this->municipios as $municipio) {
              echo '<option value="' . $municipio['mun_id'] . '">' . $municipio['mun_nombre'] . '</option>';
            } ?>
          </select>
        </div>

        <div class="input-box">
          <span class="details">Dirección</span>
          <input type="text" id="add_emp_direccion" placeholder="Ingrese su dirección">
        </div>
            
      </div>

      <div class="button">
        <button type="submit"><span>Registrarse</span></button>
      </div>

      <div class="login_seccion">
        <p id="login_link">¿Ya tienes cuenta? <a href="?controller=main&action=login">Iniciar Sesión</a></p>
      </div>

    </form>
  </div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>;
<!-- <script src="public/js/filtroMunicipios.js"></script> -->
<script type="module" src="public/js/registro.js"></script>