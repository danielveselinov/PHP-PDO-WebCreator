<?php 

namespace Database\Connection;

use PDO;
use PDOException;

class Db 
{
    private static $instance = null;

    public static function connect()
    {
        if (is_null(self::$instance)) {
            self::$instance = self::init();
        } 

        return self::$instance;
    }

    private static function init()
    {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=". DB_NAME, DB_USERNAME, DB_PASSWORD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

            return $pdo;
        } catch (PDOException $ex) {
            file_put_contents(__DIR__ . "/../../log.txt", $ex->getMessage() . PHP_EOL, FILE_APPEND);
            header("Location: ".PATH."404");
            die();
        }
    }
}