<?php
    require_once('modeloConexion.php');
    class modeloLibro extends modeloConexion
    {
 Public function listarlibro()
        {
            $objConexion = new modeloConexion(); 
            $objPDO = $objConexion::conectar();
            
            try {
                $sql = $objPDO->prepare("SELECT * FROM libro;");
                $sql->execute();
                return $sql-> fetchALL(PDO::FETCH_OBJ);
    
                $objPDO = $objConexion::desconectar(); 
            } 
            catch (\Throwable $error) {
                echo 'ERROR: '. $error->getMessage();  
                die();
            }
        }
    }