<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> </title>
    <link href="public/dashboard/css/cuenta.css" rel="stylesheet" media="all">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Cambiar Información</div>
    <div class="content">
      <form action="#">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nombre</span>
            <input type="text" placeholder="Ingrese su nombre" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Ingrese su correo" required>
          </div>
          <div class="input-box">
            <span class="details">Telefono</span>
            <input type="number" placeholder="Ingrese su telefono" required>
          </div>
          <div class="input-box">
            <span class="details">Imagen</span>
            <input type="file" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
