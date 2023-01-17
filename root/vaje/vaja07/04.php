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

        table td {
            border: 1px solid lightgray;
            width: 30px;
            height: 30px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    $vrtec = array(
        "14" => array("ime" => "Luka", "igraca" => array("žoga", "lopar", "kocke")),
        "23" => array("ime" => "Jana", "igraca" => array("Barbika", "medvedek", "barvice")),
        "31" => array("ime" => "Peter", "igraca" => array("kolo", "žoga")),
        "44" => array("ime" => "Vesna", "igraca" => array("kocke", "barvice", "žoga", "palčke"))
    );

    $vrtec["13"] = array("ime" => "Matic", "igraca" => array("kolo", "AK-47"));

    function pc($v)
    {
        echo "<p>";

        foreach ($v as $child) {
            $ime = $child['ime'];
            echo "<b> $ime: </b>";
            foreach ($child['igraca'] as $i) {
                echo "$i ";
            }
            echo "<br>";
        }

        echo "</p>";
    }
    pc($vrtec);

    function pchildhastoy($v, $toy)
    {
        echo "<p>";

        foreach ($v as $child) {
            if (in_array($toy, $child['igraca'])) {
                $ime = $child['ime'];
                echo "$ime ";
            }
        }
        echo "</p>";
    }

    function pchildnotoy($v, $toy)
    {
        echo "<p>";

        foreach ($v as $child) {
            if (!in_array($toy, $child['igraca'])) {
                $ime = $child['ime'];
                echo "$ime ";
            }
        }
        echo "</p>";
    }

    echo "<h2>Ima AK47</h2>";

    pchildhastoy($vrtec, "AK-47");
    echo "<h2>nima AK47</h2>";
    pchildnotoy($vrtec, "AK-47");

    ?>

</body>

</html>