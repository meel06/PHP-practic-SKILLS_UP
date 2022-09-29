<?php
    require '../require/config.php';

    $name = $email = $phone = $address = $city = $communities = $Zcode= $format = $newscheck=  $text="";
    "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        print_r ($_POST);
        echo "<br><strong>Metodo post enviado</strong><br>";
        if (!empty($_POST["name"]) || !empty($_POST["email"]) || !empty($_POST["phone"]))
        echo "<br><strong>name post hay datos</strong><br>";
        $name= $_POST["name"];
        $email= $_POST["email"];
        $phone= $_POST["phone"];
        $address= $_POST["address"];
        $city= $_POST["city"];
        $communities= $_POST["Autonomous communities"];
        $Zcode= $_POST["Zcode"];
        $format= $_POST["format"];
        $newscheck= $_POST["newscheck"];
        $text= $_POST["text"];

        function limpiar_dato($data){
            $data = trim(data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

        }

        // nombre, email y nºtelefono.
        function validar_name($name){
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                return false;
            } else {
                return true;
            }


            }
        }

        function validar_phone($phone){
            if (!preg_match('/^[0-9] {10}+$/', $phone)) {
                echo "Valid phone number";
                }else {
                    echo "Invalid phone number";


                }
            }
        

            // Terminar las validaciones.
            /**
                
             */
                


             // Algoritmo Enviar formulario 
/*/ 
Si (llega datos) 
Entonces 
tratamos datos Si si hay información Entonces 
limpiar la información. validar la informaciñon. Si datos necesarios Entonces 
asegurar de que están bien escrito. Sino 
mandamos dato tal cual. Fin Si 
Mostrar que todos los datos son correctos para enviar a BBDD. Sino 
enviar datos necesarios Fin Si SiNo 
avisar no han llegado. Fin Si FinAlgoritmo 
/*/

        
    
?>