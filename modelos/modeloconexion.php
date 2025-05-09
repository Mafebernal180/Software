<?php
class modeloConexion
{
    private static $objPDO;

    private $bdHost = "localhost";
    private $bdName = "biblioteca";
    private $bdUser = "root";
    private $bdUserPass = "";

    public static function conectar()
    {
        if (!isset(self::$objPDO)) {
            self::$objPDO = new PDO('mysql:host=localhost;dbname=biblioteca;charset=utf8', 'root', '');
            self::$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$objPDO;
    }
}

?>