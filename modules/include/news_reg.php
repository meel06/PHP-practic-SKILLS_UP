<?php
require '../require/config.php';

$name = $email = $phone = $address = $city = $communities = $Zcode = $format = $newscheck = $newsletter = "";

// Funciones :

function limpiar_dato($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// nombre, email y nºtelefono.
function validar_name($name)
{
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        return false;
    } else {
        return true;
    }

}

function validar_phone($phone)
{
    if (!preg_match('/^[0-9] {9}+$/', $phone)) {
        return false;
    } else {
        return true;

    }
}

function validar_email($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    } else {
        return true;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    print_r($_POST);
    //  echo "<br><strong>Metodo post enviado</strong><br>";
    // Variables requeridas para enviar a Base de datos: name, email y phone.
    if (!empty($_POST["name"]) || !empty($_POST["email"]) || !empty($_POST["phone"])) {
        echo "<br><strong>name post hay datos</strong><br>";
        $name = limpiar_dato($_POST["name"]);
        $email = limpiar_dato($_POST["email"]);
        $phone = limpiar_dato($_POST["phone"]);

        if (isset($_POST["address"])) {
            $address = limpiar_dato($_POST["address"]);
        } else {
            $address = null;
        }

        $address = limpiar_dato($_POST["address"]);
        $city = limpiar_dato($_POST["city"]);
        $communities = limpiar_dato($_POST["communities"]);
        $Zcode = limpiar_dato($_POST["Zcode"]);
        $format = limpiar_dato($_POST["format"]);
        $newscheck = limpiar_dato($_POST["newscheck"]);
        $text = limpiar_dato($_POST["text"]);

    }
}

var_dump($newsletter);

$othert = limpiar_dato($_POST["othert"]);
echo "<strong>Noticias que quiere recibir: $newsletter";
var_dump($name);

// ==========================  BORRAME
echo "<br><strong>Name:</strong> $name <br>";
echo "<strong>Telefono:</strong> $phone <br>";
echo "<strong>Email: </strong> $email <br>";

if (validar_name($name)) {
    echo "validada";
} else {
    echo "no valida";
}

// ======================  BORRAME

/* Si (llega datos) Entonces
tratamos datos
Si si hay información Entonces
Si no llegan variables?**
Asignarles NULL.
limpiar la información. check!!
validar la informacinon.
Si datos necesarios Entonces
asegurar de que están bien escrito.
SiNo
mandamos dato tal cual.
Fin Si
Mostrar que todos los datos son correctos para enviar a BBDD.
SiNo
enviar datos necesarios
Fin Si
SiNo
avisar no han llegado.
Fin Si */
?>