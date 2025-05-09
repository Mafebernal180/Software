<?php
    require_once('modeloConexion.php');
    class modeloUsuario extends modeloConexion
    {
       //ATRIBUTOS 
    private $idUsuario;
    private $nombreUsuario;
    private $apellidoUsuario;
    private $correoUsuario;                               
    private $telefonoUsuario;
    private $direccionUsuario; 
    private $contrasenaUsuario;
    private $rolUsuario;
    private $estadoUsuario;

    //METODO CONSTRUCTOR
    function __construct($idUsuarioIn, $nombreUsuarioIn, $apellidoUsuarioIn, $correoUsuarioIn,
                        $telefonoUsuarioIn, $direccionUsuarioIn, $contrasenaUsuarioIn,
                        $rolUsuarioIn, $estadoUsuarioIn)
    {
        $this->idUsuario = $idUsuarioIn; 
        $this->nombreUsuario = $nombreUsuarioIn; 
        $this->apellidoUsuario = $apellidoUsuarioIn;
        $this->correoUsuario = $correoUsuarioIn;  
        $this->telefonoUsuario = $telefonoUsuarioIn;
        $this->direccionUsuario = $direccionUsuarioIn;
        $this->contrasenaUsuario = $contrasenaUsuarioIn;
        $this->rolUsuario = $rolUsuarioIn; 
        $this->estadoUsuario = $estadoUsuarioIn; 
    }

    //METODO PARA CONSULTAR EL LOGIN
    public function consultaLogin()
    {
        $objConexion = new modeloConexion(); 
        $objPDO = $objConexion->conectar(); 

        try {
            $sql = $objPDO->prepare('SELECT nombreUsuario, correoUsuario, contrasenaUsuario, rolUsuario FROM usuario WHERE correoUsuario = :correoUsuario');
            $sql->bindparam(':correoUsuario', $this->correoUsuario);
            $sql->execute(); 

            // Verificar si se encontraron resultados
            if ($sql->rowCount() == 1) {
                return $sql->fetch(PDO::FETCH_OBJ); 
            } else {
                return false; // Usuario no encontrado
            }

        } catch (\Throwable $error) { 
            echo 'ERROR: '. $error->getMessage();
            die();
        } 
    }


        //METODOS DE LA CLASE 

        public function insertarUsuario(){
            $objConexion = new modeloConexion(); 
            $objPDO = $objConexion->conectar(); 
        
            try {
                $sql = $objPDO->prepare("INSERT INTO Usuario 
                                            VALUES (:idUsuario, :nombreUsuario, :apellidoUsuario, :direccionUsuario,
                                                    :telefonoUsuario, :correoUsuario, :contrasenaUsuario,:repetirContrasena, :rolUsuario, :estadoUsuario, '1' )"); 
                $sql->bindParam(':idUsuario', $this->idUsuario);
                $sql->bindParam(':nombreUsuario', $this->nombreUsuario);
                $sql->bindParam(':apellidoUsuario', $this->apellidoUsuario);
                $sql->bindParam(':correoUsuario', $this->correoUsuario);
                $sql->bindParam(':telefonoUsuario', $this->telefonoUsuario);
                $sql->bindParam(':direccionUsuario', $this->direccionUsuario);
                $sql->bindParam(':contrasenaUsuario', $this->contrasenaUsuario);
                $sql->bindParam(':repetirContrasena', $this->repetirContrasena);
                $sql->bindParam(':rolUsuario', $this->rolUsuario); 
                $sql->bindParam(':estadoUsuario', $this->estadoUsuario);
        
                $sql->execute(); 
        
                $objPDO = $objConexion->desconectar();
            } catch (\Throwable $error) {
                echo 'ERROR: '. $error->getMessage();  
                die();
            }
        }
        
        Public function listarUsuario()
        {
            $objConexion = new modeloConexion(); 
            $objPDO = $objConexion::conectar();
            
            try {
                $sql = $objPDO->prepare("SELECT * FROM Usuario;");
                $sql->execute();
                return $sql-> fetchALL(PDO::FETCH_OBJ);
    
                $objPDO = $objConexion::desconectar(); 
            } 
            catch (\Throwable $error) {
                echo 'ERROR: '. $error->getMessage();  
                die();
            }
        }
        

        public function consultarUsuarioXid(){
            $objConexion = new modeloconexion();
            $objPDO = $objConexion ::conectar();
                try {
                    $sql = $objPDO->prepare("SELECT * FROM  Usuario 
                                               WHERE idUsuario = :idUsuario"); 
                    $sql->bindparam(':idUsuario',$this->idUsuario);
                    $sql->execute ();
                    return $sql->fetch(PDO::FETCH_OBJ);

                    $objPDO = $objConexion::desconectar();

                } catch (\Throwable $error) {
                    echo 'ERROR: '. $error->getMessage(); 
                    die();
                }
        }
        public function actualizarUsuario(){  
            $objConexion = new modeloConexion(); 
            $objPDO = $objConexion::conectar();
            try {
                $sql = $objPDO->prepare("UPDATE Usuario SET                                  
                                                            nombreUsuario =:nombreUsuario,
                                                            apellidoUsuario =:apellidoUsuario,
                                                            correoUsuario =:correoUsuario,
                                                            telefonoUsuario =:telefonoUsuario,
                                                            direccionUsuario =:direccionUsuario,
                                                            contrasenaUsuario = :contrasenaUsuario,
                                                            repetirContrasena = :repetirContrasena,
                                                            rolUsuario=:rolUsuario,
                                                            estadoUsuario=:estadoUsuario WHERE idUsuario =:idUsuario;");
                $sql->bindparam(':idUsuario',$this->idUsuario);
                $sql->bindparam(':nombreUsuario',$this->nombreUsuario);
                $sql->bindparam(':apellidoUsuario',$this->apellidoUsuario);
                $sql->bindparam(':correoUsuario',$this->correoUsuario);
                $sql->bindparam(':telefonoUsuario',$this->telefonoUsuario);
                $sql->bindparam(':direccionUsuario',$this->direccionUsuario);
                $sql->bindparam(':contrasenaUsuario',$this->contrasenaUsuario);
                $sql->bindParam(':repetirContrasena', $this->repetirContrasena);
                $sql->bindparam(':rolUsuario',$this->rolUsuario);                
                $sql->bindparam(':estadoUsuario',$this->estadoUsuario);

                $sql->execute(); 

                $objPDO = $objConexion::desconectar(); 
            } catch (\Throwable $error) {
                echo 'ERROR: '. $error->getMessage();  
                die();
            }
        }      

        public function eliminarUsuario(){       
            $objConexion = new modeloConexion(); 
            $objPDO = $objConexion::conectar();
            try {
                $sql = $objPDO->prepare("DELETE FROM Usuario 
                                                    WHERE idUsuario = :idUsuario"); 
                $sql->bindparam(':idUsuario',$this->idUsuario);

                $sql->execute(); 

                $objPDO = $objConexion::desconectar(); 
            } catch (\Throwable $error) {
                echo 'ERROR: '. $error->getMessage();  
                die();
            }   
        }

        public function consultarUsuarioXnombre(){
            $objConexion = new modeloconexion();
            $objPDO = $objConexion ::conectar();
                try {
                    $sql = $objPDO->prepare("SELECT * FROM  Usuario 
                                               WHERE nombreUsuario = :nombreUsuario"); 
                    $sql->bindparam(':nombreUsuario',$this->nombreUsuario);
                    $sql->execute ();
                    return $sql->fetchALL(PDO::FETCH_OBJ);

                } catch (\Throwable $error) {
                    echo 'ERROR: '. $error->getMessage(); 
                    die();
                }
        }
    }
?>