<?php
abstract class DBConn
{
    protected static function getConnection() : PDO
    {
         $host = "127.0.0.1";
         $user = "root";
         $pass = "";
         $dbname = "User";

        return new PDO("mysql:host=$host;$dbname", $user, $pass);
    }
}