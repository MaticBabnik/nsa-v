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

        .t-7-2a td {
            border: 1px solid gray;
            background-color: silver;
            color:white;
            text-align: center;
        }
        .t-7-2b td {
            border: 2px dashed blue;
            text-align: center;
            background-color: lightblue;
            color: blue;
            font-weight: bold;
        }

        body {
            min-height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;

            align-items: center;
            justify-content: center;
        }

        .line {
            height: 2px;
            width: 80%;
            background-color: red;
            margin: 10px;
        }

    </style>
</head>

<body>
    <?php

    function rt($n, $min, $max)
    {
        $out = [];
        for ($i = 0; $i < $n; $i++)
            $out[] = rand($min, $max);
        return $out;
    }

    function a2d(&$arr)
    {
        foreach ($arr as $row) {
            echo "<tr>";
            foreach ($row as $val) {
                $c = htmlspecialchars("$val");
                echo "<td>$c</td>";
            }
            echo "</tr>";
        }
    }

    function sum(&$arr)
    {
        $s = 0;
        foreach ($arr as $e) {
            $s += $e;
        }
        return $s;
    }

    function ssm(&$arr, $s)
    {
        $out = [];
        foreach ($arr as $el) $out[] = $s - $el;
        return $out;
    }

    $t1 = rt(20, 1, 10);
    $t2 = ssm($t1, sum($t1));


    ?>
    <p>Prvi izpis</p>

    <table class="t-7-2a">
        <?php
        $nt1 = [$t1, $t2];
        a2d($nt1);
        ?>
    </table>

    <div class="line"></div>
    <p>Drugi izpis</p>
    <table class="t-7-2b">
        <?php
        $nt2 = [array_reverse($t1), array_reverse($t2)];
        a2d($nt2);
        ?>
    </table>
</body>

</html>