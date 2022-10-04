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
        echo "<br><strong>En los campos requeridos hay datos</strong><br>";
        $name = limpiar_dato($_POST["name"]);
        $email = limpiar_dato($_POST["email"]);
        $phone = limpiar_dato($_POST["phone"]);

        
        if (validar_name($name)){
            echo "La validación de Name es correcta<br>";
        } else{
            $name_err = true;
        }

        if (validar_email($email)){
            echo "La validación de Email es correcta<br>";
        } else{
            $email_err = true;
        }

        if (validar_phone($phone)){
            echo "La validación de Teléfono es correcta<br>";
        } else{
            $phone_err = true;
        }

        // Condición si no se cumple alguna validación, parar código
        if (validar_name($name) && validar_email($correo) && validar_phone($phone)){

            
            // A las variables que pueden ser NULL añadir if para guardar en BBDD como NULL

        if (isset($_POST["address"])) {
            $address = limpiar_dato($_POST["address"]);
        } else {
            $address = null;
        }
        if (isset($_POST["city"])){
            $city = limpiar_dato($_POST["city"]);
        } else{
            $city = NULL;
        }
        
        if (isset($_POST["communities"])){
            $communities = limpiar_dato($_POST["communities"]);
        } else{
            $communities = NULL;
        }
        
        if (isset($_POST["Zcode"])){
            $Zcode = limpiar_dato($_POST["Zcode"]);
        } else{
            $Zcode = NULL;
        } 
        
        if (isset($_POST["newscheck"])){
            $newscheck = limpiar_dato($_POST["newscheck"]);
        } else{
            $newscheck = NULL;
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

  
if (isset($_POST["topics"])){
    $topics = limpiar_dato($_POST["topics"]);
} else{
    $topics = NULL;
}
// ============================================================= BORRAME

echo "<br><strong>Name: </strong>".$name ."<br>";

echo "<br><strong>Email: </strong>".$email ."<br>";

echo "<br><strong>Teléfono: </strong>".$phone ."<br>";

// ============================================================= BORRAME
} else{
if ($name_err == true){
    echo "La validación de Nombre ha fallado<br>";
} elseif ($email_err == true) {
    echo "La validación de Email ha fallado<br>";
} elseif ($phone_err == true) {
    echo "La validación de Teléfono ha fallado<br>";
}
}
} else {
echo "Uno de los datos requeridos no ha sido rellenado";
}
} else{
echo "No hemos recibido por el métedo POST";
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