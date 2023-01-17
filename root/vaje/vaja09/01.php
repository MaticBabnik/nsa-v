<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/unsuck.css">
    <style>
        table {
            border-collapse: collapse;
        }
        #kolicine * {
            color: black;
            text-align: center;
        }

        #kolicine th {
            background-color: white;
            font-weight: bold;
        }

        #kolicine tr {
            background-color: greenyellow;
        }
        #kolicine tr:nth-child(even) {
            background-color: lightsalmon;
        }

        #kolicine td,
        #kolicine th {
            border: 1px solid black;
            color: black;
            padding: .2rem 1rem;
        }
    </style>
</head>

<body>
    <pre>
<?php
require_once "funkcije.php";
$vozila = array(
    array("Volvo", 22, 18),
    array("BMW", 15, 13),
    array("Saab", 5, 2),
    array("Jaguar", 17, 15),
    array("Fiat", 32, 27)
);
$oseba = array("Janez", "Vesna", "Vid", "Rok", "Maja", "Lara", "Ana", "Alenka", "Luka");


$t = [];
$lastnik = [];
napolniT($vozila);

$znamke = array_keys($t);

print_r($t);

for ($i = 0; $i < 5; $i++) {
    $os = randomItem($oseba);
    $zn = randomItem($znamke);

    $ret = nakup($os, $zn);

    echo "\n -- Nakup | oseba: $os, znamka: $zn | " . ($ret ? "je izveden" : "ni izveden") . " ---------\n";
    print_r($t);
    print_r($lastnik);
}

for ($i = 0; $i < 5; $i++) {
    $os = randomItem($oseba);
    $zn = randomItem($znamke);

    $ret = prodaja($os, $zn);

    echo "\n -- Prodaja | oseba: $os, znamka: $zn | " . ($ret ? "je izvedena" : "ni izvedena") . " ---------\n";
    print_r($t);
    print_r($lastnik);
}

echo "\n Lastniki Jaguar:\n";

echo join(", \n", izpisLastnikov("Jaguar"));

echo "\n\n";

$mozne_osebe = array_keys($lastnik);
$prodaj_vse = [randomItem($mozne_osebe), "Pikapolonica"];

foreach ($prodaj_vse as $os) {
    $ret = prodajaVseh($os, $zn);

    echo "\n -- Prodaja vseh | oseba: $os | " . ($ret ? "Prodano vse" : "Ni osebe") . " ---------\n";
    print_r($t);
    print_r($lastnik);
}
?>
    </pre>
    <table id="kolicine">
        <?php
        prikazKolicin();
        ?>
    </table>
</body>

</html>