<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
  </head>
  <body>
    <h1>Bienvenido a BestBuy!</h1>
    <!-- Formulario HTML-->
    <form action="mipanel.php" method="POST">
      <!-- Caja de texto-->
      <fieldset>
        Nombre: <br />
        <input type="text" name="nombre" /><br />
        <!-- Caja de texto tipo Password-->
        Clave: <br />
        <input type="password" name="clave" /><br /><br />
        <!-- Botón para enviar el formulario-->
        <input type="submit" name="btnEnviar" />
      </fieldset>
    </form>
    <!-- Vínculo o Enlace en HTML-->
    <br />
    <a href="fichero_destino">Click aquí</a>
  </body>
</html>
