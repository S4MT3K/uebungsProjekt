<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Uebungs Projekt</title>
</head>
<body style="background-color: dimgrey">


<?php
//DEFINITIONSABSCHNITT

//gibt uns unsere Datenverbindung der Datenbank zurück
function getVerbindung() : PDO
{
    $servername ="127.0.0.1";
    $username ="root";
    $password ="";
    $dbname = "User_2406";
    return new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
}


//$array = ["name"=>"sam", "nachname"=>"bandoly", "alter"=>26]; //altes array durch Funktion ersetzt

//CREATE
//Erstellt uns einen Datenbankeintrag
function createUser (string $vorname, string $nachname, int $age) : void //Schreibt in die DB
{
    $dbconn = getVerbindung();

    $query = "INSERT INTO user (vorname, nachname, age) VALUES (:vorname, :nachname, :age)";
    $stmt = $dbconn->prepare($query);
    $stmt->bindParam(':vorname', $vorname, PDO::PARAM_STR);
    $stmt->bindParam(':nachname', $nachname, PDO::PARAM_STR);
    $stmt->bindParam(':age', $age, PDO::PARAM_INT);

    $stmt->execute();
}
//READ
//Ersterllt ein  Array welches wir in eine variable speichern können
//und als "objekt"...
function readUser(string $vorname, string $nachname) : array {
    $dbconn = getVerbindung();

    $query ="SELECT * FROM user WHERE vorname = :vorname AND nachname = :nachname";
    $stmt = $dbconn->prepare($query);
    $stmt->bindParam(':vorname', $vorname, PDO::PARAM_STR);
    $stmt->bindParam(':nachname', $nachname, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}
//UPDATE
//Updated einen Datensatz bei übergabe des "Objektes" und neuer "parameter"
function updateUser(array &$objekt, string $newVorname, string $newNachname, int $newAlter) : void
{
    $dbconn = getVerbindung();
    $id = $objekt[0]["id"];
    $query = "UPDATE User SET vorname = :newvorname, nachname = :newnachname, age = :newage WHERE id = :id";
    $stmt = $dbconn->prepare($query);
    $stmt->bindParam('id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':newvorname', $newVorname, PDO::PARAM_STR);
    $stmt->bindParam(':newnachname', $newNachname, PDO::PARAM_STR);
    $stmt->bindParam(':newage', $newAlter, PDO::PARAM_INT);
    $stmt->execute();
}
//DELETE
//Bei übergabe des "objektes" wird der User aus der Datehnbank per ID gelöscht
function deleteUser(array &$arr): void
{
    $dbconn = getVerbindung();
    $query = "DELETE FROM user WHERE id = :id";
    $stmt = $dbconn->prepare($query);
    $stmt->bindParam(':id', $arr[0], PDO::PARAM_INT);
    $stmt->execute();
}

//Begrüßt unseren user
function print_HelloWorld (string $text) : void
{
    echo "<h2>{$text}</h2>";
}
//Ausführ Abschnitt

//Funktionen, die Uns User in die Datenbank Schreiben
//createUser("maik","müller",26);
//createUser("Steffi","meyer",41);





//$maik = makeArray("Müller", "Maik", 36);

//print_HelloWorld("Hallo Welt");

//WEBMASKE
//Funktionen die der User Benutzen kann

//$array['alter']= 36; //UPDATE fürs Array
//
//begruessung($maik);
//
//updateUser($maik, "Müller", "Maik", 36);
//updateUser($Steffi, "Meyer", "Stefanie", 40);
//
//deleteUser($maik);
?>
<pre>
<!--    --><?php
    $steffi = readUser("Stefanie", "Gwen");
    echo $steffi[0]["vorname"] . " " . $steffi[0]["nachname"] . "<br>";
    updateUser($steffi, "steffi", "meyer", 57);
    $neuesteffi = readUser("steffi", "meyer");

    echo $steffi[0]["vorname"] . " " . $steffi[0]["nachname"] . "<br>";
    echo $neuesteffi[0]["vorname"] . " " . $steffi[0]["nachname"] . "<br>";


//    echo $steffi[0]["vorname"] . " " . $steffi[0]["nachname"] . "<br>";

//    print_r($maik);
//    var_dump($maik);
//    print_r($Steffi);
//    echo $Steffi['name'];
    //deleteUser($steffi);
//    ?>
</pre>

</body>
</html>