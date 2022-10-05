<?php
require '../require/config.php';

$name = $email = $phone = $address = $city = $communities = $Zcode = $format = $newscheck = $newsletter = "";
$name_err = $email_err = $phone_err = false;

// Funciones :

function limpiar_dato($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Nombre, Email y Nº teléfono

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
    if (!preg_match('/^[0-9]{9}+$/', $phone)) {
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

        if (validar_name($name)) {
            // echo "La validación de Name es correcta<br>";
        } else {
            $name_err = true;
        }

        if (validar_email($email)) {
            // echo "La validación de Email es correcta<br>";
        } else {
            $email_err = true;
        }

        if (validar_phone($phone)) {
            // echo "La validación de Teléfono es correcta<br>";
        } else {
            $phone_err = true;
        }

        // Condición si no se cumple alguna validación, parar código

        if (validar_name($name) && validar_email($email) && validar_phone($phone)) {

            // A las variables que pueden ser NULL añadir if para guardar en BBDD como NULL

            if (isset($_POST["address"])) {
                $address = limpiar_dato($_POST["address"]);
            } else {
                $address = null;
            }
            if (isset($_POST["city"])) {
                $city = limpiar_dato($_POST["city"]);
            } else {
                $city = null;
            }

            if (isset($_POST["communities"])) {
                $communities = limpiar_dato($_POST["communities"]);
            } else {
                $communities = null;
            }

            if (isset($_POST["Zcode"])) {
                $Zcode = limpiar_dato($_POST["Zcode"]);
            } else {
                $Zcode = null;
            }

/*             if (isset($_POST["newscheck"])) {
                $newscheck = limpiar_dato($_POST["newscheck"]);
            } else {
                $newscheck = null;
            } */

            if (isset($_POST["format"])) {
                $format = limpiar_dato($_POST["format"]);
            } else {
                $format = null;
            }

            if (isset($_POST["text"])) {
                $text = limpiar_dato($_POST["text"]);
            } else {
                $text = null;
            }
            // ============================================================= BORRAME

            echo "<br> <strong> Name: </strong>  $name <br>";
            echo "<br> <strong> Email: </strong> $email <br>";
            echo "<br> <strong> Teléfono: </strong> $phone <br>";
            echo "<br> <strong> Address: </strong>  $address <br>";
            echo "<br> <strong> City: </strong>  $city <br>";
            echo "<br> <strong> Communities: </strong>  $communities <br>";
            echo "<br> <strong> Code: </strong>  $Zcode <br>";
            echo "<br> <strong> Format: </strong>  $format <br>";
            echo "<br> <strong> NewsCheck: </strong>  $newscheck <br>";
            //echo "<br> <strong> NewsLetter: </strong>  $newsletter <br>";

            // ============================================================= BORRAME
        } else {
            echo "Fallo las validaciones <br>";
            if ($name_err == true) {
                echo "La validación de Nombre ha fallado<br>";
            } elseif ($email_err == true) {
                echo "La validación de Email ha fallado<br>";
            } elseif ($phone_err == true) {
                echo "La validación de Teléfono ha fallado<br>";
            }
        }

    } else {
        echo "No llegaron datos requeridos";
    }
} else {
    echo "No hemos recibido por el método POST";
}

// ======================  BORRAME

/* Si (llega datos) Entonces✔
    tratamos datos
	Si datos llegan los datos necesarios entonces✔
		limpiar la información. ✔
		//asegurar de que están bien escrito.
		validar la informacion. ✔
		Si cumple las validaciones seguimos con el reto de datos.✔
			Si no llegan variables?**
				Asignarles NULL. ✔
			si llegan
				limpiamos los datos y asignamos a las variables.✔
				Si hay información Entonces
					Mostrar que todos los datos son correctos para enviar a BBDD.
		Si alguna no cumple la validación o todas.
			Mensaje de aviso de que validación a fallado.
	SiNo
		Mensaje de aviso de que no han llegado los datos necesarios.
SiNo
	avisar no han llegado.
Fin Si */
?>
