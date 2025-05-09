<?php
include '../modelos/modeloConexion.php';

// Recuperar los datos del formulario
$nombreUsuario = $_POST['nombreUsuario'];
$apellidoUsuario = $_POST['apellidoUsuario'];
$direccionUsuario = $_POST['direccionUsuario'];
$telefonoUsuario = $_POST['telefonoUsuario'];
$correoUsuario = $_POST['correoUsuario'];
$contrasena = $_POST['contrasena'];
$repetirContrasena = $_POST['repetirContrasena'];
$rolUsuario = $_POST['rolUsuario'];
$estadoUsuario = $_POST['estadoUsuario'];

if ($contrasena == $repetirContrasena) {
    // Crear una instancia de la clase modeloConexion para obtener una conexión PDO
    $objConexion = new modeloConexion();
    $objPDO = $objConexion->conectar(); // Crear la conexión PDO

    // Verificar si la conexión PDO se creó correctamente
    if ($objPDO) {
        // Preparar la consulta SQL sin repetirContrasena
        $sentencia = $objPDO->prepare("INSERT INTO usuario 
            (nombreUsuario, apellidoUsuario, correoUsuario, telefonoUsuario, direccionUsuario, contrasenaUsuario, rolUsuario, estadoUsuario)
            VALUES (:nombreUsuario, :apellidoUsuario, :correoUsuario, :telefonoUsuario, :direccionUsuario, :contrasenaUsuario, :rolUsuario, :estadoUsuario)");

        // Asociar los parámetros con los valores
        $sentencia->bindParam(':nombreUsuario', $nombreUsuario);
        $sentencia->bindParam(':apellidoUsuario', $apellidoUsuario);
        $sentencia->bindParam(':correoUsuario', $correoUsuario);
        $sentencia->bindParam(':telefonoUsuario', $telefonoUsuario);
        $sentencia->bindParam(':direccionUsuario', $direccionUsuario);
        $sentencia->bindParam(':contrasenaUsuario', $contrasena); // Solo insertar la contraseña una vez
        $sentencia->bindParam(':rolUsuario', $rolUsuario);
        $sentencia->bindParam(':estadoUsuario', $estadoUsuario);

        $sentencia->execute(); 
        echo '<script>
                alert("Se ha guardado el usuario correctamente.");
                window.location = "../vista-Menu/Menu.php";
                </script>';
    }
} else {
    echo '<script>
    alert("Las contraseñas no son iguales, por favor validar");
    window.location = "../vista-Menu/usuario/insertarusuario.php";
    </script>';
}
?>

    


