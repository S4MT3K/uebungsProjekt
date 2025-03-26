<?php
abstract class DBConn
{
    protected static function getConnection() : PDO
    {
         $host = "127.0.0.1";
         $user = "root";
         $pass = "";
         $dbname = "user_2406";

        return new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    }
}