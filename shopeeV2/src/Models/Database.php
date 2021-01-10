<?php

namespace App\Models;

use \PDO;

class Database
{
    private $_db;
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $dbname = 'order_system';
    private static $_instance;

    private function __construct() {

        $this->_db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->user, $this->pass);
        $this->_db->query("SET NAMES 'utf8'");
        $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    private function __clone() {
    }

    public static function getInstance() {

        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function getDB() {

        return $this->_db;
    }

    public function __destruct() {
        $this->_db = null;
    }

}