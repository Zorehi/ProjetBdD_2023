<?php

namespace App\Core;

use PDO;
use PDOException;

class Database extends PDO {
    // Instance unique de la classe
    private static $instance;

    // Propriétés de la base de données
    private const DBHOST = "localhost";
    private const DBNAME = "projetbdd";
    private const DBUSER = "root";
    private const DBPASS = "";

    private function __construct() {
        // DSN de connexion
        $_dsn = "mysql:host=" . self::DBHOST . ";dbname=" . self::DBNAME;

        $option = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {

            parent::__construct($_dsn, self::DBUSER, self::DBPASS, $option);

        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}

?>