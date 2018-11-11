<?php

class Database
{
    private static $dbHost = "db752855193.db.1and1.com";
    private static $dbName = "db752855193";
    private static $dbUser = "dbo752855193";
    private static $dbUserpassword = "V67a96a99!";
    
    protected static $connection = null;
    
    public static function connect()
    {
        try{
                 //echo "try connexion\n";
                self::$connection = new PDO("mysql:host=" . self::$dbHost . ";charset=UTF8;dbname=" . self::$dbName, self::$dbUser,self::$dbUserpassword);
               
    
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




?>
