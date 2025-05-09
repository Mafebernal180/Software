<?php
require_once 'modeloConexion.php';
require_once 'modeloUsuario.php';

try {
    $objPDO = modeloConexion::conectar();

    // Ahora puedes utilizar $objPDO para realizar consultas

    $objUsuario = new modeloUsuario(NULL, NULL, NULL, 'jdguerraa@sanmateo.edu.co', NULL, NULL, NULL, NULL, NULL);
    $objConsulta = $objUsuario->consultaLogin();

    if ($objConsulta) {
        echo $objConsulta->nombreUsuario;
        echo $objConsulta->contrasenaUsuario;
    } else {
        echo 'Usuario no encontrado';
    }
} catch (\Throwable $error) {
    echo 'Error: ' . $error->getMessage() . '</br>';
    die();
}
?>