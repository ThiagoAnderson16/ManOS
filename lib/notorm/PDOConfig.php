<?php

class PDOConfig extends PDO {

    public $engine = "mysql";
    public $host = "mysql.hostinger.com.br";
    public $database = "u240311195_manos";
    public $user = "u240311195_manos";
    public $pass = "manosifrn2016";
    
    
    static private $instance = null;
    
    static public function getInstance() {
        if (null === self::$instance) {
            $c = __CLASS__;
            self::$instance = new $c;
        }
        return self::$instance;
    }
    
    public function __construct(){
        $dns = $this->engine . ':dbname=' . $this->database . ";host=" . $this->host;
        parent::__construct($dns, $this->user, $this->pass);
        parent::setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND , "SET NAMES utf8");
        parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        parent::setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        
    }
    private function __clone(){}

}

