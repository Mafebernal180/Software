<?php

    session_start();

    if($_SESSION['Usuario'] ==NULL || $_SESSION['Usuario']=='')
    {
        session_destroy();
        header('location: ../index.html');
    }
    else
    {
        $usuario = $_SESSION['Usuario'];
        echo '<script type="text/javascript">
        alert("'.$usuario.'");
        </script>';
    }
?>