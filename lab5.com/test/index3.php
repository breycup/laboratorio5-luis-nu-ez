<?php
    echo "El estatus de la sesion es". session_status();
    session_start();
    echo "<br>  El estatus de la sesion es". session_status();
    session_destroy();
    
?>