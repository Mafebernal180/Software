<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/proyectoempresa/modelos/modelolibro.php'); 

if(isset($_POST['idLibro']) && !empty($_POST['idLibro']))
{
    $id_libro = $_POST['id_libro']; 
    $nombre_libro = $_POST['nombre_libro']; 
    $autor = $_POST['autor']; 
    $editorial = $_POST['editorial'];
    $año_publicacion = $_POST['año_publicacion'];
    $id_genero = $_POST['id_genero'];

    $objLibro = new modeloLibro($id_libro, 
                                $nombre_libro,
                                $autor,
                                $editorial,                                      
                                $año_publicacion,
                                $id_genero ); 

    $objLibro->insertarLibro(); 
    echo '<script type="text/javascript">
            alert("Libro INSERTADO CORRECTAMENTE!!!!!");    
            window.location.href="../menuUsuario.php"; 
        </script> ';
}

//Actualizar
if(isset($_POST['idLibroActualizar']) && !empty($_POST['idLibroActualizar']))
{
    $idLibro = $_POST['idLibroActualizar']; 
    $tituloLibro = $_POST['tituloLibro']; 
    $autorLibro = $_POST['autorLibro']; 
    $editorialLibro = $_POST['editorialLibro'];
    $anioPublicacion = $_POST['anioPublicacion'];
    $generoLibro = $_POST['generoLibro'];

    $objLibro = new modeloLibro($id_libro, 
                                $nombre_libro,
                                $autor,
                                $editorial,                                      
                                $año_publicacion,
                                $id_genero ); 

    $objLibro->actualizarLibro(); 
    echo '<script type="text/javascript">
            alert("Libro Actualizado CORRECTAMENTE!!!!!");    
            window.location.href="../vista-menu/libro/insertarLibro.php"; 
        </script> ';
}

//Eliminar
if(isset($_GET["idLibroEliminar"]) && !empty($_GET["idLibroEliminar"]))
{
    $idLibro = $_GET["idLibroEliminar"]; 

    echo '<script type="text/javascript">
            var respuesta = confirm("¿Desea Eliminar el libro con id='.$idLibro.'?");
            if(respuesta==true){
                
            }
            else{
                window.location.href="../vista-menu/libro/consultarLibro.php";
            }
        </script> ';

    $objLibro = new modeloLibro($idLibro,NULL, NULL,NULL,NULL,NULL,NULL); 

    $objLibro->eliminarLibro(); 
    echo '<script type="text/javascript">
            alert("Libro Eliminado CORRECTAMENTE!!!!!");    
            window.location.href="../vista-menu/libro/consultarLibro.php"; 
        </script> ';
}

//Funciones
//Funcion Listar
function consultarLista()
{
    $objLibro = new modeloLibro(NULL,NULL,NULL,NULL,NULL,NULL,NULL);
    $consultaLista = $objLibro->listarLibro();
    return $consultaLista;
}

//Funcion consultarxid
function consultarXid($idLibro){
    $objLibro = new modeloLibro($idLibro,NULL,NULL,NULL,NULL,NULL,NULL);
    $consultaXid = $objLibro->consultarLibroXid();
    return $consultaXid;
}

//funcion Consultarxnombre
function consultarTitulo($tituloLibro){
    $objLibro = new modeloLibro(NULL,$tituloLibro,NULL,NULL,NULL,NULL,NULL);
    $consultarTitulo = $objLibro->consultarLibroXtitulo();
    return $consultarTitulo;
}

//Funcion Consultar reporte
function reporte()
{
    $objLibro = new modeloLibro(NULL,NULL,NULL,NULL,NULL,NULL,NULL);
    $consultaLista = $objLibro->listarLibro();
    return $consultaLista;
}

?>
