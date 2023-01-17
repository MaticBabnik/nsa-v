<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP stuff</title>
    <link rel="stylesheet" href="/assets/unsuck.css">
    <style>
        table {
            border-collapse: collapse;
        }

        td {
            border: solid 1px #AAA;
        }
    </style>
</head>

<body>
    <?php

    $d = array(
        "1431" => array("ime" => "Rok", "natocenoGorivo" => array(55, 54, 36, 45, 41)),
        "1488" => array("ime" => "Vid", "natocenoGorivo" => array(70, 72)),
        "1492" => array("ime" => "Luka", "natocenoGorivo" => array(38, 42, 46, 37, 40, 40))
    );

    $d["2231"] = ["ime" => "Matic", "natocenoGorivo" => [30]];

    $d["2231"]["natocenoGorivo"][] = 41;

    foreach ($d as $id => $k) {
        if (sizeof($k["natocenoGorivo"]) >= 3)
            printf("sifra=%s ime=%s gorivo=%s<br>", $id, $k["ime"], join(" ", $k["natocenoGorivo"]));
    }
    ?>

</body>

</html>