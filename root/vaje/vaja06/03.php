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
    <table>
        <?php
        $samoglasniki = ['A', 'E', 'I', 'O', 'U'];
        $soglasniki = [];
        $colors = [
            "880000",
            "008800",
            "000088",
            "008888"
        ];

        for ($i = ord('A'); $i < ord('Z'); $i++) {
            if (!in_array(chr($i), $samoglasniki))
                $soglasniki[] = chr($i);
        }


        function genWord()
        {
            global $samoglasniki;
            global $soglasniki;

            $len = rand(5, 12);
            $w = "";
            for ($i = 0; $i < $len; $i++) {
                if ($i % 2 == 0)
                    $w = $w . $soglasniki[array_rand($soglasniki)];
                else
                    $w = $w . $samoglasniki[array_rand($samoglasniki)];
            }
            return $w;
        }

        function randColorStyle()
        {
            global $colors;
            return sprintf("style=\"background-color: #%s\"", $colors[rand(0, 3)]);
        }

        for ($i = 0; $i < 20; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 5; $j++) {
                printf("<td %s >%s</td>", randColorStyle(), genWord());
            }
            echo "</tr>";
        }

        ?>
    </table>
</body>

</html>