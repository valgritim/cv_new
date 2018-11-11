<?php

class Database
{
    private static $dbHost = "db741587726.db.1and1.com";
    private static $dbName = "db741587726";
    private static $dbUser = "dbo741587726";
    private static $dbUserpassword = "V67a96a99!";
    
     private static $connection = null;
    
    public static function connect()
    {
        try{
                self::$connection = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName, self::$dbUser,self::$dbUserpassword);
    
            }
            catch (PDOException $e)
            {
    
                die($e->getMessage());        
            }
            return self::$connection;
     }
     
     public static function disconnect(){
        self::$connection = null;
     
     }
    
}

Database::connect();

?>
