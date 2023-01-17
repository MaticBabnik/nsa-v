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
            margin: 1rem;
        }

        td {
            border: 1px solid silver;
            padding: .5rem;
        }

        table.t2 {
            margin: .25rem;
        }
        .t2 td:first-child {
            color:red;
        }
    </style>
</head>

<body>
    <?php
    include_once "./fifa.php";

    function razvrsti_ekipe(&$skupine)
    {
        foreach (array_keys($skupine) as $key) {
            arsort($skupine[$key]);
        }
    }

    function izpis($skupine)
    {
        echo "<table>";
        foreach ($skupine as $ime => $skupina) {
            echo "<tr><td>$ime</td><td><table class=\"t2\"><tr>";

            foreach ($skupina as $ekipa => $tocke) {
                echo "<td>$ekipa $tocke</td>";
            }

            echo "</tr></table></td></tr>";
        }
        echo "</table>";
    }

    function razvrsti_skupine(&$skupine)
    {
        ksort($skupine);
    }

    razvrsti_ekipe($t);
    izpis($t);
    razvrsti_skupine($t);
    echo "<pre>";
    print_r($t);
    echo "</pre>";
    ?>
</body>

</html>