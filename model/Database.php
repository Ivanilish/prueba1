<?php
/**
 * Clase utilitaria que maneja la conexion/desconexion a la base de datos
 * mediante las funciones PDO (PHP Data Objects).
 * Utiliza el patron de diseno singleton para el manejo de la conexion.
 * @author mrea
 */
class Database {

    //Propiedades estaticas con la informacion de la conexion (DSN):
   
    //Propiedades estaticas con la informacion de la conexion (DSN):
    private static $dbName = 'heroku_1be2cdbbab525da';
    private static $dbHost = 'us-cdbr-iron-east-04.cleardb.net';
    private static $dbUsername = 'b54b6d23824a3a';
    private static $dbUserPassword = 'af925382';
    //Propiedad para control de la conexion:
    private static $conexion = null;

    /**
     * No se permite instanciar esta clase, se utilizan sus elementos
     * de tipo estatico.
     */
    public function __construct() {
        exit('No se permite instanciar esta clase.');
    }

    /**
     * Metodo estatico que crea una conexion a la base de datos.
     * @return type
     */
    public static function connect() {
        // Una sola conexion para toda la aplicacion (singleton):
        if (null == self::$conexion) {
            try {
                self::$conexion = new PDO("mysql:host=" . self::$dbHost . ";" . "dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$conexion;
    }

    /**
     * Metodo estatico para desconexion de la bdd.
     */
    public static function disconnect() {
        self::$conexion = null;
    }

}
?>
