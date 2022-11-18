<?php
        #if (session_status() == 1 ) session_status();
        
require_once("models/contacto.php");
class contacto_controllers
{
    public static function crear()
    {
        if (isset($_SESSION["usuario"])){
        $titulo = "Creacion de comentario de Contacto";
        require_once("views/template/header.php");
        require_once("views/template/navbar.php");
        require_once("views/contacto/crear.php");
        require_once("views/template/footer.php");
        } else{
           
            header("location:index.php?c=".seg::codificar("principal")."&m=".seg::codificar("error"));
 
        }

    }
    public static function mostrar(){

        if ($_POST) {
            if (!isset($_POST["token"]) ||  !seg::validarSession($_POST["token"])){
                echo "Acceso restringido";
                exit();
            }
           


            empty($_POST["txtNombre_contacto"]) ? $error[0] = "el nombre del contacto es necesario:" : $nombre = $_POST["txtNombre_contacto"];
            empty($_POST["txtCorreo_contacto"]) ? $error[1] = "el nombre del contacto es necesario:" : $correo = $_POST["txtCorreo_contacto"];
            $comentario = $_POST["txtComentario_contacto"];

            if (isset($error)) {
                
                $titulo = "Creacion de comentario de Contacto";
                require_once("views/template/header.php");
                require_once("views/template/navbar.php");
                require_once("views/contacto/crear.php");
                require_once("views/template/footer.php");

            } else {

                $nombre = filter_var($nombre, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $correo = filter_var($correo, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $comentario = filter_var($comentario, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                $contacto = new contacto($nombre, $correo, $comentario);
                $resultados = $contacto->getDatos();

                $titulo = "Mostrar datos de contacto";
                require_once("views/template/header.php");
                require_once("views/template/navbar.php");
                require_once("views/contacto/mostrar.php");
                require_once("views/template/footer.php");
            }




        }
    }
}

?>