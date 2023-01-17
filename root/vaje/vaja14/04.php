<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP stuff</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 10px;
        }

        td,th {
            border: 2px solid gray;
            padding: .2rem;
        }
        td:nth-child(2) {
            text-align: right;
        }
    </style>
    <link rel="stylesheet" href="/assets/unsuck.css">
</head>

<body>

    <form method="get">
        <fieldset>
            <select name="znamka[]" id="znamka" multiple>
                <?php
                require_once "./vozila.php";
                foreach ($prostornina as $k => $v) {
                    echo "<option value=\"$k\">$k</k>";
                }
                ?>
            </select>
            <input type="submit">
        </fieldset>
        <?php

        if (isset($_GET['znamka'])) {
            $a = $_GET['znamka'];

            foreach ($a as $z) {
                echo "<table><tr><th colspan=2>$z</th></tr>";
                if (!key_exists($z, $prostornina)) continue;
                foreach ($prostornina[$z] as $model => $vol) {
                    echo "<tr><td>$model</td><td>$vol</td></tr>";
                }
                echo "</table>";
            }
        }
        ?>
    </form>
</body>

</html>