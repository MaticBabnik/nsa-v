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

    $byte = rt(8, 0, 1);

    function bitArrayToU8($ba)
    {
        $n = 0;
        foreach ($ba as $b) {
            $n = ($n << 1) | $b;
        }
        return $n;
    }

    function bitArrayToI8($ba)
    {
        $n = bitArrayToU8($ba); //dobimo bite

        if ($n <= 0x7F) return $n; // ce MSB ni 1 je stevilo pozitivno
        
        $n = ~($n-1); //dvojiski komplement

        return ($n & 0xFF) * -1; //pocistimo odvecne bite in mnozimo z -1 ker smo leni
    }
    ?>
    <table>
        <?php 
        $t1 = [['base 2', 'u8' ],[join('',$byte), bitArrayToU8($byte)]];
        a2d($t1);
        ?>
    </table>
    <br>
    <table>
        <?php 
        $t2 = [['base 2', 'i8' ],[join('',$byte), bitArrayToI8($byte)]];
        a2d($t2);
        ?>
    </table>

</body>

</html>