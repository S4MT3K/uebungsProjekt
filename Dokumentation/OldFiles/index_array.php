<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Uebungs Projekt</title>
</head>
<body style="background-color: dimgrey">


<?php
//DEFINITIONSABSCHNITT

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
function makeArray (string $name, string $vorname, int $alter) : array //WÄRE quasi unsere DB
{
    $erzeugtesArray = ["name"=>$name, "vorname"=>$vorname, "alter"=>$alter]; //WÄRE IN DB Insert INTO
    return $erzeugtesArray;
}
//READ
function begruessung(array $d) : void {
    //echo "Hallo " . $d["vorname"] . " " . $d["name"] . ", du bist unsterblich.";
    echo "Hallo {$d['vorname']} {$d['name']} du bist {$d['alter']} Jahre alt.";
}
//UPDATE
function updateUser(array &$objekt, string $newName, string $newVorname, int $newAlter) : void
{
    $objekt['name'] = $newName;

    $objekt['vorname'] = $newVorname;

    $objekt['alter'] = $newAlter;
}
//DELETE
function deleteUser(array &$arr): void
{
    $varName = array_search($arr, $GLOBALS);
    if($varName)
        unset($GLOBALS[$varName]);
}

function print_HelloWorld (string $text) : void
{
    echo "<h2>{$text}</h2>";
}
//Ausführ Abschnitt

//Variable $array mit Übergabeparametern füllen
$maik = makeArray("müller","maik",26); //UNSER DATENSATZ (inkl. array)
$Steffi = makeArray("meyer","Steffi",41); //UNSER DATENSATZ (inkl. array)



//$maik = makeArray("Müller", "Maik", 36);

print_HelloWorld("Hallo Welt");

//WEBMASKE
//Funktionen die der User Benutzen kann

//$array['alter']= 36; //UPDATE fürs Array
//
begruessung($maik);

updateUser($maik, "Müller", "Maik", 36);
updateUser($Steffi, "Meyer", "Stefanie", 40);

deleteUser($maik);
?>
<pre>
    <?php
    print_r($maik);
    print_r($Steffi);
    echo $Steffi['name'];
    ?>
</pre>

</body>
</html>