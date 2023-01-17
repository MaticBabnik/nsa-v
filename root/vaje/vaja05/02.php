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
            width: 100%;
        }

        td {
            border: 1px solid white;
            color:black;
            background-color: lightgoldenrodyellow;
            padding: .25rem;
        }

        td:first-of-type {
            color: green;
            background-color: greenyellow;
        }

        td:last-of-type {
            color: blue;
            background-color: cyan;

        }
    </style>
</head>

<body>
    <table>
        <tr>
            <?php
            $t = [];

            $d1 = rand(0, 20);
            $d2 = rand(0, 20);
            while ($d2 == $d1) {
                $d2 = rand(0, 20);
            }

            $start = min($d1, $d2);
            $end = max($d1, $d2);

            printf("<td>%d</td>", $start);

            for ($i = $start + 1; $i < $end; $i++) {
                echo "<td>*</td>";
            }
            printf("<td>%d</td>", $end);
            ?>
        </tr>
    </table>
</body>

</html>