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

    public static function deletebyID(int $id) : void
    {
        try {
            $tblname = static::class;
            $conn = self::getConnection();
            $statement_delete = "DELETE FROM $tblname WHERE id = :id";
            $statement_delete = $conn->prepare($statement_delete);
            $statement_delete->bindParam(":id", $id, PDO::PARAM_INT);
            $statement_delete->execute();
            echo 'DELETE OK';
        }
        catch (PDOException $e) {
            echo '<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8d7da;
            color: #721c24;
            text-align: center;
            padding: 50px;
        }
        .error-container {
            background-color: #f5c6cb;
            padding: 20px;
            border-radius: 5px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1>Ein Fehler ist aufgetreten!</h1>' . $e->getMessage() . ';

       
    </div>
</body>
</html>';
        }
    }
}