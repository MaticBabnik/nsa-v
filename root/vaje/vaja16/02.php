<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP stuff</title>
    <link rel="stylesheet" href="/assets/unsuck.css">
    <style>
        fieldset {
            width: 400px;

            display: flex;
            flex-direction: column;
        }

        table {
            border-collapse: collapse;
        }

        td,
        th {
            border: 1px gray solid;
            padding: 5px;
        }
    </style>
</head>

<body>
    <?php
    include_once "./banke.php";
    ?>
    <form method="get">
        <fieldset>
            <select name="leto[]" id="leto" multiple required>
                <?php
                foreach ($t['nlb'] as $l => $i) {
                    echo "<option value=\"$l\">$l</option>";
                }
                ?>
            </select>
            <input type="submit" value="Izpis">
        </fieldset>
    </form>
    <?php

    if (isset($_GET['leto'])) {
        $l = $_GET['leto'];
    }

    foreach ($l as $lt) {
        echo "<h1>$lt</h1>";
        echo '<table>';
        foreach ($t as $banka => $bi) {
            echo "<tr><th colspan=\"3\">$banka</th></tr>";
            $a = $bi[$lt]['saldo'];
            $b = $bi[$lt]['zaposleni'];
            $c = $bi[$lt]['dokapitalizacija'];
            echo "<tr><td>$a</td><td>$b</td><td>$c</td></tr>";
        }
        echo '</table>';
    }

    ?>

</body>

</html>