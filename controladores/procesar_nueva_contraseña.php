<?php
require_once('../modelos/modeloUsuario.php'); // Incluimos el archivo del modelo de usuario

// Iniciamos la sesión
session_start();

// Verificamos si se ha enviado una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificamos si se han recibido todas las claves necesarias
    if (isset($_POST["contrasenaUsuario"]) && isset($_POST["repetirContrasena"]) && isset($_SESSION["idUsuario"])) {
        // Recuperamos las contraseñas del formulario
        $contrasenaUsuario = $_POST["contrasenaUsuario"];
        $repetirContrasena = $_POST["repetirContrasena"];
        
        // Verificamos si las contraseñas coinciden
        if ($contrasenaUsuario === $repetirContrasena) {
            // Creamos una instancia del modelo de usuario
            $modeloUsuario = new modeloUsuario(null, null, null, null, null, null, $contrasenaUsuario,$repetirContrasena, null, null); // Los valores nulos se reemplazarán en el proceso
            
            // Obtenemos el ID del usuario de la sesión
            $idUsuario = $_SESSION["idUsuario"];
            
            // Llamamos a la función para actualizar la contraseña
            $modeloUsuario->setIdUsuario($idUsuario); // Configuramos el ID del usuario
            $modeloUsuario->actualizarUsuario(); // Llamamos a la función de actualización
            
            echo '¡La nueva contraseña se ha guardado exitosamente!';
            echo '<script>window.location = "../indexinicio.html";</script>';
            exit; // Terminamos la ejecución del script
        } else {
            // Si las contraseñas no coinciden, mostramos un mensaje de error
            echo "Error: Las contraseñas no coinciden. Por favor, inténtalo de nuevo.";
        }
    } else {
        // Si no se han recibido todas las claves necesarias, mostramos un mensaje de error
        echo "Error: No se han recibido todas las claves necesarias.";
    }
} else {
    // Si no se ha enviado una solicitud POST, redireccionamos al formulario
    header("Location: indexrinicio.html");
    exit; // Finalizamos la ejecución del script
}
?>
