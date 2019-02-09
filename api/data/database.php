<?php

/**
 * Class Database
 *
 * Provide database connection and related functionality
 *
 * Essential runnable scripts:
 * install.php  - To create a fresh database, corresponding sql file is in initDB
 * insert.php   - To insert garbage data in sql format, sql corresponding sql file is in insert.sql
 * sql_cleaner  - To clean unnecessary comments generated from xampp phpmyadmin sql exports
 *
 * To install whole datbase schema, first create database, then run
 */
class Database
{
    private static $dbName = 'api_db' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'root';
    private static $dbUserPassword = '';

    private static $cont  = null;

    public function __construct() {
        die('Init function is not allowed');
    }

    public static function connect()
    {
        // One connection through whole application
        if ( null == self::$cont )
        {
            try
            {
                self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
            }
            catch(PDOException $e)
            {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }

    public static function disconnect()
    {
        self::$cont = null;
    }

    public static function createDatabase($sqlSource)
    {
        try{
            $connection = new PDO("mysql:host=".self::$dbHost,
                self::$dbUsername,
                self::$dbUserPassword);
            $sql = file_get_contents($sqlSource);
            $connection->exec($sql);

            $msg_databaseInitSuccess = "Databse Initialized Successfully. 
            TODO: Change dbName to your desired database
            dbName can be found in database.php";
            echo $msg_databaseInitSuccess;
        }
        catch (PDOException $error){
            echo $sql."<br>".$error->getMessage();
        }
    }

}
?>