<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/unsuck.css">
    <style>
    </style>
</head>

<body>
    <?php
    function af($n)
    {
        $out = [];
        for ($i = 0; $i < $n; $i++) {
            $a = [];

            for ($j = 0; $j < $n; $j++) {
                if ($i == $j) $a[] = '*';
                elseif ($j > $i) $a[] = '0';
                else  $a[] = "$n";
            }
            $out[] = $a;
        }
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

    $n = rand(2, 8);
    $r = af($n);


    echo "Tabela $n x $n";
    ?>

    <table class="t-7-1">
        <?php a2d($r); ?>
    </table>

</body>

</html>