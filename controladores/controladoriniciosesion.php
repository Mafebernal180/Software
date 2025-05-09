<?php
session_start();

// Mostrar errores de PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir el archivo de conexión
include '../modelos/modeloConexion.php';

// Verificar si se están enviando datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se han enviado todas las variables necesarias
    if (isset($_POST['nombreUsuario']) && isset($_POST['correoUsuario']) && isset($_POST['contrasenaUsuario']) && isset($_POST['rolUsuario'])) {
        // Obtener los datos del formulario
        $nombreUsuario = $_POST['nombreUsuario'];
        $correoUsuario = $_POST['correoUsuario'];
        $contrasenaUsuario = $_POST['contrasenaUsuario'];
        $rolUsuario = $_POST['rolUsuario']; 

        try {
            // Obtener la conexión
            $conexion = modeloConexion::conectar();

            // Realizar la consulta SQL
            $validar_login = $conexion->prepare("SELECT * FROM usuario WHERE nombreUsuario=:nombreUsuario AND correoUsuario=:correoUsuario AND contrasenaUsuario=:contrasenaUsuario AND rolUsuario=:rolUsuario");
            $validar_login->bindParam(':nombreUsuario', $nombreUsuario);
            $validar_login->bindParam(':correoUsuario', $correoUsuario);
            $validar_login->bindParam(':contrasenaUsuario', $contrasenaUsuario);
            $validar_login->bindParam(':rolUsuario', $rolUsuario);
            $validar_login->execute();

            // Verificar si se encontraron resultados
            if ($validar_login->rowCount() > 0) {
                // Obtener los datos del usuario
                $usuario = $validar_login->fetch(PDO::FETCH_ASSOC);

                // Establecer la sesión del usuario
                $_SESSION['usuario'] = $usuario;

                // Verificar el rol del usuario
                if ($usuario['rolUsuario'] == 'ADMIN') {
                    // Si es ADMIN, redirigir a la página de administración
                    header("Location: ../vista-Menu/menu.php");
                    exit;
                } else {
                    // Si no es ADMIN, redirigir a la página de menú del usuario normal
                    header("Location: ../vista-Menu/menuUsuario.php");
                    exit;
                }
            } else {
                // Mostrar un mensaje de error y redirigir al usuario a la página de inicio
                echo '<script>
                    alert("El usuario no existe. Por favor, verifique los datos introducidos.");
                    window.location = "../indexinicio.html";
                </script>';
                exit;
            }
        } catch (PDOException $e) {
            // Mostrar un mensaje de error si ocurre una excepción
            echo "Error: " . $e->getMessage();
            exit;
        }
    } else {
        // Mostrar un mensaje de error si no se enviaron todos los datos requeridos
        echo "Error: No se han enviado todos los datos requeridos.";
        exit;
    }
} else {
    // Mostrar un mensaje de error si la solicitud no es de tipo POST
    echo "Error: La solicitud no es de tipo POST.";
    exit;
}
?>

