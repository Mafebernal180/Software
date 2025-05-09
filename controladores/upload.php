<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["archivo"])) {
    $nombreArchivo = $_FILES["archivo"]["name"];
    $tipoArchivo = $_FILES["archivo"]["type"];
    $tamañoArchivo = $_FILES["archivo"]["size"];
    $tempArchivo = $_FILES["archivo"]["tmp_name"];
    $errorArchivo = $_FILES["archivo"]["error"];

    // Directorio donde se guardarán los archivos cargados
    $directorioDestino = "archivos_cargados/";

    // Mover el archivo del directorio temporal al directorio de destino
    if ($errorArchivo === UPLOAD_ERR_OK) {
        $rutaArchivoDestino = $directorioDestino . $nombreArchivo;
        if (move_uploaded_file($tempArchivo, $rutaArchivoDestino)) {
            echo "El archivo $nombreArchivo se ha cargado correctamente.";
        } else {
            echo "Error al cargar el archivo.";
        }
    } else {
        echo "Error al cargar el archivo: ";
        switch ($errorArchivo) {
            case UPLOAD_ERR_INI_SIZE:
                echo "El archivo es más grande que el tamaño permitido por el servidor.";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                echo "El archivo es más grande que el tamaño permitido por el formulario.";
                break;
            case UPLOAD_ERR_PARTIAL:
                echo "El archivo no se ha podido cargar completamente.";
                break;
            case UPLOAD_ERR_NO_FILE:
                echo "No se ha seleccionado ningún archivo para cargar.";
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                echo "No existe un directorio temporal donde guardar el archivo.";
                break;
            case UPLOAD_ERR_CANT_WRITE:
                echo "No se puede escribir el archivo en el disco.";
                break;
            case UPLOAD_ERR_EXTENSION:
                echo "Una extensión de PHP ha detenido la carga del archivo.";
                break;
            default:
                echo "Error desconocido.";
                break;
        }
    }
} else {
    echo "No se ha enviado ningún archivo.";
}
?>