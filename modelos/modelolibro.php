<?php
require_once('modeloConexion.php');

class modeloLibro extends modeloConexion
{
    //ATRIBUTOS 
    private $idLibro;
    private $tituloLibro;
    private $autorLibro;
    private $editorialLibro;
    private $anioPublicacion;
    private $generoLibro;
    private $estadoLibro;

    //METODO CONSTRUCTOR - ENCAPSULAMIENTO 
    function __construct($idLibroIn, $tituloLibroIn, $autorLibroIn, $editorialLibroIn, $anioPublicacionIn, $generoLibroIn, $estadoLibroIn)
    {
        $this->idLibro = $idLibroIn; 
        $this->tituloLibro = $tituloLibroIn; 
        $this->autorLibro = $autorLibroIn;
        $this->editorialLibro = $editorialLibroIn;
        $this->anioPublicacion = $anioPublicacionIn;
        $this->generoLibro = $generoLibroIn;
        $this->estadoLibro = $estadoLibroIn; 
    }

    //METODOS DE LA CLASE 

    public function insertarLibro()
    {
        $objConexion = new modeloConexion(); 
        $objPDO = $objConexion::conectar();

        try {
            $sql = $objPDO->prepare("INSERT INTO Libro VALUES 
                                        (:idLibro, :tituloLibro, :autorLibro, :editorialLibro, :anioPublicacion, :generoLibro, :estadoLibro, '1' )"); 
            $sql->bindparam(':idLibro', $this->idLibro);
            $sql->bindparam(':tituloLibro', $this->tituloLibro);
            $sql->bindparam(':autorLibro', $this->autorLibro);
            $sql->bindparam(':editorialLibro', $this->editorialLibro);
            $sql->bindparam(':anioPublicacion', $this->anioPublicacion);
            $sql->bindparam(':generoLibro', $this->generoLibro);
            $sql->bindparam(':estadoLibro', $this->estadoLibro);

            $sql->execute(); 

            $objPDO = $objConexion::desconectar(); 
        } catch (\Throwable $error) {
            echo 'ERROR: '. $error->getMessage();  
            die();
        }
    }      

    public function listarLibro()
    {
        $objConexion = new modeloConexion(); 
        $objPDO = $objConexion::conectar();
        
        try {
            $sql = $objPDO->prepare("SELECT * FROM Libro");
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_OBJ);

            $objPDO = $objConexion::desconectar(); 
        } 
        catch (\Throwable $error) {
            echo 'ERROR: '. $error->getMessage();  
            die();
        }
    }

    public function consultarLibroXid()
    {
        $objConexion = new modeloConexion();
        $objPDO = $objConexion::conectar();

        try {
            $sql = $objPDO->prepare("SELECT * FROM Libro WHERE idLibro = :idLibro"); 
            $sql->bindparam(':idLibro', $this->idLibro);
            $sql->execute ();
            return $sql->fetchAll(PDO::FETCH_OBJ);

            $objPDO = $objConexion::desconectar();

        } catch (\Throwable $error) {
            echo 'ERROR: '. $error->getMessage(); 
            die();
        }
    }

    public function actualizarLibro()
    {
        $objConexion = new modeloConexion(); 
        $objPDO = $objConexion::conectar();
        
        try {
            $sql = $objPDO->prepare("UPDATE Libro SET                                  
                                            tituloLibro = :tituloLibro,
                                            autorLibro = :autorLibro,
                                            editorialLibro = :editorialLibro,
                                            anioPublicacion = :anioPublicacion,
                                            generoLibro = :generoLibro,
                                            estadoLibro = :estadoLibro 
                                            WHERE idLibro = :idLibro;");
            $sql->bindparam(':idLibro', $this->idLibro);
            $sql->bindparam(':tituloLibro', $this->tituloLibro);
            $sql->bindparam(':autorLibro', $this->autorLibro);
            $sql->bindparam(':editorialLibro', $this->editorialLibro);
            $sql->bindparam(':anioPublicacion', $this->anioPublicacion);
            $sql->bindparam(':generoLibro', $this->generoLibro);
            $sql->bindparam(':estadoLibro', $this->estadoLibro);

            $sql->execute(); 

            $objPDO = $objConexion::desconectar(); 
        } catch (\Throwable $error) {
            echo 'ERROR: '. $error->getMessage();  
            die();
        }
    }      

    public function eliminarLibro()
    {
        $objConexion = new modeloConexion(); 
        $objPDO = $objConexion::conectar();

        try {
            $sql = $objPDO->prepare("DELETE FROM Libro WHERE idLibro = :idLibro"); 
            $sql->bindparam(':idLibro', $this->idLibro);

            $sql->execute(); 

            $objPDO = $objConexion::desconectar(); 
        } catch (\Throwable $error) {
            echo 'ERROR: '. $error->getMessage();  
            die();
        }   
    }

    public function consultarLibroXtitulo()
    {
        $objConexion = new modeloConexion();
        $objPDO = $objConexion::conectar();

        try {
            $sql = $objPDO->prepare("SELECT * FROM Libro WHERE tituloLibro = :tituloLibro"); 
            $sql->bindparam(':tituloLibro', $this->tituloLibro);
            $sql->execute ();
            return $sql->fetchAll(PDO::FETCH_OBJ);

            $objPDO = $objConexion::desconectar();

        } catch (\Throwable $error) {
            echo 'ERROR: '. $error->getMessage(); 
            die();
        }
    }
}
?>
