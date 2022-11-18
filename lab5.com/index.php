<?php
        
        
        require_once("controllers/principal_controllers.php");
        require_once("controllers/contacto_controllers.php");
        require_once("controllers/usuario_controllers.php");
        require_once("utils/seg.php");
       
       
        if (count($_GET)==0)
        call_user_func("principal_controllers::index");
        else{
            $controlador = seg::decodificar($_GET["c"]);
            $metodo =seg::decodificar($_GET["m"]);
            call_user_func($controlador."_controllers::".$metodo);
        }
        
?> 