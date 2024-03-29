<?php

// class Database
// {
//     static public function  connect(){
//         $db_name = 'wiki_ko';
//         $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
//         $db = new PDO('mysql:host=localhost;dbname='.$db_name.';charset=utf8', 'root', '', $options);
//         return $db;
//     }
// }
// new Database();


define('DB_HOST', 'localhost');

define('DB_NAME', 'wiki_ko');

define('DB_USER', 'root');

define('DB_PASS', '');
// include_once '../config.php';
class Database
{
    private static $instance;
    private $connection;
    private function __construct() {
        $this->connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }

    
}
