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
        }

        td {
            border: solid 1px #AAA;
        }
    </style>
</head>

<body>
    <table>
        <?php
        $t = [];
        $puc = [];
        $plc = [];
        $po = [];
        echo "<tr><td>";
        for ($i = 0; $i < 40; $i++) {
            $c = rand(0, 255);
            $t[] = $c;
            echo "$c ";
        }
        echo "</tr></td>";

        foreach ($t as $index => $char) {
            if ($char <= ord('A') && $char <= ord('Z'))
                $puc[] = $index;
            else if ($char <= ord('a') && $char <= ord('z'))
                $plc[] = $index;
            else
                $po[] = $index;
        }

        function pc($cn, $arr)
        {
            echo "<tr><td>";

            printf("\nmesta %s: %s", $cn, join(" ", $arr));

            echo "</tr></td>";
        }

        pc("Veliki ASCII", $puc);
        pc("Mali ASCII", $plc);
        pc("Ostali ASCII", $po);


        ?>
    </table>
</body>

</html>