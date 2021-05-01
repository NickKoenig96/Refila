<?php
    abstract class Db {
        private static $conn;

        public static function getConnection(){
        if(self::$conn != null){
                // connection found, return connection
                return self::$conn;
            } else{
                self::$conn = new PDO('mysql:host=127.0.0.1;dbname=refila', 'root', 'root');
                return self::$conn;
            }
            
        }
    }