<!doctype html>
<html lang="de">
<head>
    <style>
        body {
            background-color: #878787;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="background-color: dimgrey">
<?php
spl_autoload_register(function ($class) {
    include '10_classes/' . $class . '.php';
});

$date = new DateTime();
$dt = $date->format('17-04-2024');

//$newUser = User::createUser("Bob", "Ronaldo", false , "gelb", 155, "schwarz", "yxY287", $dt);


//echo $newUser->getVorname();
    echo "<br>";
    //var_dump($newUser);
//echo $newUser->getNachname();
    echo "<br>";

    //echo $newUser->getNachname();
User::deletebyID(50);





?>
</body>
</html>