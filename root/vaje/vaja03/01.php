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
    <h1>3.1a</h1>
    <pre><?php
            define("PI", 3.14);

            function obsegInPloscina($r, $pi)
            {
                return sprintf("\tobseg: %.6f\n\tploscina %.6f\n", 2 * $pi * $r, $pi * $pi * $r);
            }

            $r = rand(10, 100);
            echo "Moj pi:\n" . obsegInPloscina($r, PI);
            echo "Php pi:\n" . obsegInPloscina($r, pi());
            ?></pre>
    <h1>3.1b</h1>
    <pre><?php

            $r = rand(-10, 100);
            echo "polmer: $r\n";
            if ($r < 0) {
                echo "Takega kroga ni\n";
            } else if ($r == 0) {
                echo "Tocka\n";
            } else {
                echo obsegInPloscina($r, pi());
            }
            ?></pre>
</body>

</html>