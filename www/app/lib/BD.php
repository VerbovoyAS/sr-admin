<?php 
    // Connect Date Base
    echo 'BD';
class DB {
    private static $_db = null;
    public $pass;
    
    public static function getInstanse(){
        include_once 'mysql.php';
        
        if(self::$_db == null)
            self::$_db = new PDO('mysql:host=database:3306;dbname='.$db_name.';charset=UTF8', $db_user, $db_pass);
            
        return self::$_db;
    }

    private function __construct(){}
    private function __clone(){}
    private function __wakeup(){}
}

