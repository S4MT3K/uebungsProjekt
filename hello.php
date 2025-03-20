<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Uebungs Projekt</title>
</head>
<body style="background-color: dimgrey">

Erstellt eine Funktion, die maik und steffi löschen.

zusatz: erstellt ein array (gerne auch fix) die steffi und maik beinhalten, und löschte diese aus diesem array.
benutzt bitte unset($maik) zum löschen der variable oder unset($maik['key']) zum löschen des key-value pairs

NOTE: wir wollen eigentlich nur im kopf den zusammenhang des löschen verstehen, welcher später in unserer mariadb
abläuft.

<?php
//DEFINITIONSABSCHNITT
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