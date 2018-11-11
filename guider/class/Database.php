<?php

class Database
{
    private static $dbHost = "db760088365.hosting-data.io";
    private static $dbName = "db760088365";
    private static $dbUser = "dbo760088365";
    private static $dbUserpassword = "V67a96a99!";
    
    private static $connection = null;
    
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

//Database::connect();


?>
