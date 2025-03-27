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

    public static function findbyID(int $id) : static
    {
        $tblname = static::class;
        $conn = self::getConnection();
        $statement_read = "SELECT * FROM $tblname WHERE id = :id";
        $statement_read = $conn->prepare($statement_read);
        $statement_read->bindParam(":id", $id);
        $statement_read->execute();

        return $statement_read->fetchObject($tblname);
    }
}