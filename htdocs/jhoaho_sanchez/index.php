<?php
$usuario = "";
$clave = "";
$recordar = false;

if (isset($_COOKIE["c_recordar"]) && $_COOKIE["c_recordar"] != "") {
  $recordar = true;
  $usuario = $_COOKIE["c_usuario"];
  $clave = $_COOKIE["c_clave"];
  $recordar = $_COOKIE["c_recordar"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
</head>

<body>
  <form action="panelPrincipal.php" method="POST">
    <fieldset>
      <h1>LOGIN</h1>
      Usuario:
      <br />
      <input type="text" name="usuario" value="<?php echo $usuario ?>" />
      <br />
      Clave:
      <br />
      <input type="password" name="clave" value="<?php echo $clave ?>" />
      <br />
      <input type="checkbox" name="chkRecordar" <?php echo ($recordar) ? "checked" : "" ?> /> Recordarme
      <br />
      <input type="submit" value="Enviar" />
    </fieldset>
  </form>
</body>

</html>