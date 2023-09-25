<link rel="stylesheet" href="public\css\registro.css">
<title>Registrate</title>

<div class="container">
  <div class="title">Registrarse</div>
  <div class="content">
    <form method="POST" action="?controller=usuario&action=validar" onsubmit="return false">
      <div class="user-details">
        <div class="input-box">
          <span class="details">NIT</span>
          <input type="text" id="emp_id" placeholder="Ingrese el NIT de la empresa" required>
        </div>
        <div class="input-box">
          <span class="details">Nombre</span>
          <input type="text" id="emp_nombre" placeholder="Ingrese el nombre" required>
        </div>
        <div class="input-box">
          <span class="details">Correo</span>
          <input type="text" id="emp_correo" placeholder="Ingrese el correo" required>
        </div>
        <div class="input-box">
          <span class="details">Telefono</span>
          <input type="text" id="emp_telefono" placeholder="Ingrese su telefono" required>
        </div>
        <div class="input-box">
          <span class="details">Dirección</span>
          <input type="text" id="emp_direccion" placeholder="Ingrese su dirección" required>
        </div>
        <div class="input-box">
          <span class="details" for="Sexo">Departamento</span>
          <select class="select" name="Sexo" id="emp_departamento">
            <option value="" selected disabled>Seleciona tu departamento</option>
          </select>
        </div>
        <!-- <div class="input-box">
            <label class="details" for="Sexo">Municipio</label>
            <select name="Sexo" id="emp_municipio">
                <option value="" selected disabled>Seleciona tu Municipio</option>
            </select>
        </div> -->
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