<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    if (($_POST["usuario"] != "" && $_POST["clave"] != "")) {
        //Creando sesiones
        $_SESSION["usuario"] = $_POST["usuario"];
    } else {
        header("Location: index.php");
    }
}

if (!isset($_POST["chkRecordar"])) {
    if (!isset($_GET["id"])) {
        $recordar = "";
    } else {
        if (isset($_COOKIE["c_recordar"])) {
            $recordar = $_COOKIE["c_recordar"];
        } else {
            $recordar = "";
        }
    }
} else {
    $recordar = $_POST["chkRecordar"];
}

if ($recordar != "") {
    setcookie("c_usuario", (isset($_POST["usuario"]) ? $_POST["usuario"] : $_COOKIE["c_usuario"]), time() + 60 * 60 * 24);
    setcookie("c_clave", (isset($_POST["clave"]) ? $_POST["clave"] : $_COOKIE["c_clave"]), time() + 60 * 60 * 24);
    setcookie("c_recordar", $recordar, time() + 60 * 60 * 24);
} else {
    setcookie("c_recordar", "", 1);
}

$idioma = "es";

if (!isset($_COOKIE["c_idioma"])) {
    setcookie("c_idioma", "es", time() + 60 * 60 * 24);
} else {
    $idioma = $_COOKIE["c_idioma"];
}
if (isset($_GET["idioma"])) {
    if ($_GET["idioma"] != "") {
        setcookie("c_idioma", $_GET["idioma"], time() + 60 * 60 * 24);
        $idioma = $_GET["idioma"];
    }
}
switch ($idioma) {
    case 'es':
        $fp = fopen("./archivos/categorias_es.txt", "r");
        $_CATEGORIAS = [];
        while (!feof($fp)) {
            $linea = fgets($fp);
            $_CATEGORIAS[] = $linea;
        }
        fclose($fp);
        break;
    case 'en':
        $fp = fopen("./archivos/categorias_en.txt", "r");
        $_CATEGORIAS = [];
        while (!feof($fp)) {
            $linea = fgets($fp);
            $_CATEGORIAS[] = $linea;
        }
        fclose($fp);
        break;
    default:
        break;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Principal</title>
</head>

<body>
    <fieldset>
        <h1>PANEL PRINCIPAL</h1>
        <h3>Bienvenido Usuario: <?php echo $_SESSION["usuario"]; ?> </h3>
        <a href="panelPrincipal.php?idioma=es&id=1">ES (Español)</a> |
        <a href="panelPrincipal.php?idioma=en&id=1">EN (English)</a>
        <br><br>
        <a href="cerrarSesion.php">Cerrar Sesion</a>
        <br>
        <h2>Product List</h2>
        <?php
        foreach ($_CATEGORIAS as $item) {
        ?>
            <p><?php echo $item;
                ?></p>
        <?php }
        ?>
    </fieldset>
</body>

</html>