<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP stuff</title>
    <link rel="stylesheet" href="/assets/unsuck.css">
</head>

<body>
    <table class="tfc">
        <tr>
            <th>x</th>
            <th>sgn(x)</th>
        </tr>
        <?php

        function sgn($x)
        {
            if ($x >= 0) return 1;
            else return -1;
        }

        for ($i = -10; $i <= 10; $i++) {
            echo "<tr>";
            echo "<td>", $i, "</td>";
            echo "<td>", sgn($i), "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <style>
        .tfc {
            border-collapse: collapse;
        }

        .tfc td {
            text-align: right;
        }

        .tfc th {
            border-bottom: 1px solid #fff;
        }

        .tfc th:first-child,
        .tfc td:first-child {
            border-right: 1px solid #fff;
            padding: 3px;
        }
    </style>
</body>

</html>