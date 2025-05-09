<?php
// Incluir archivo de conexión
include '../modelos/modeloConexion.php';

try {
    // Establecer conexión a la base de datos
    $conexion = modeloConexion::conectar();

    // Verificar si se enviaron datos por POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verificar si se han enviado todas las variables necesarias
        if (isset($_POST['nombreUsuario']) && isset($_POST['apellidoUsuario']) && isset($_POST['correoUsuario']) && isset($_POST['contrasenaUsuario']) && isset($_POST['repetirContrasena'])) {
            
            // Obtener datos del formulario
            $nombreUsuario = $_POST['nombreUsuario'];
            $apellidoUsuario = $_POST['apellidoUsuario'];
            $correoUsuario = $_POST['correoUsuario'];
            $contrasenaUsuario = $_POST['contrasenaUsuario'];
            $repetirContrasena = $_POST['repetirContrasena'];

            // Verificar si las contraseñas coinciden
            if ($contrasenaUsuario !== $repetirContrasena) {
                echo "Las contraseñas no coinciden.";
                exit();
            }

            // Crear la consulta SQL utilizando una consulta preparada
            $query = "INSERT INTO usuario (nombreUsuario, apellidoUsuario, correoUsuario, contrasenaUsuario, repetirContrasena)
                    VALUES (?, ?, ?, ?, ?)";
            
            // Preparar la consulta
            $statement = $conexion->prepare($query);

            // Verificar si la consulta se preparó correctamente
            if ($statement) {
                // Ejecutar la consulta
                $ejecutar = $statement->execute([$nombreUsuario, $apellidoUsuario, $correoUsuario, $contrasenaUsuario, $repetirContrasena]);

                // Verificar si la consulta se ejecutó con éxito
                if ($ejecutar) {
                    echo "Usuario registrado exitosamente.";
                    echo '<script>
                        alert("Usuario registrado exitosamente.");
                        window.location = "../indexinicio.html";
                        </script>';
                } else {
                    echo "Error al registrar el usuario: " . $statement->errorInfo()[2];
                }
            } else {
                echo "Error al preparar la consulta: " . $conexion->errorInfo()[2];
            }
        } else {
            echo "No se enviaron todos los datos requeridos.";
        }
    } else {
        echo "La solicitud no es de tipo POST.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>