<?php

    class DatabaseConnection{
        private static $instance = null;
        private $connection;

        private $username = 'gigi';
        private$password = 'password';
        private $database = 'localhost/XE';

        function __construct(){
            $this->connection = oci_pconnect($this->username, $this->password, $this->database);
        }

        public static function getInstance(){
            if(!self::$instance) {
                self::$instance = new DatabaseConnection();
            }
            return self::$instance;
        }
    
        public function getConnection(){
            return $this->connection;
        }
    }

?>