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
    <form method="get">
        <fieldset>
            <input type="number" name="x" id="x" min="1" step="1" required placeholder="X">
            <br>
            <input type="number" name="y" id="y" min="0" step="1" required placeholder="Y">
            <br>
            <input type="submit" value="Produkt" name="op">
            <input type="submit" value="Potenca" name="op">
            <input type="reset" value="Ponastavi">
        </fieldset>
    </form>
    <?php

    function cmul($x, $y)
    {
        $r = 0;
        for ($i = 0; $i < $y; $i++) {
            $r += $x;
        }
        return $r;
    }

    function cpow($x, $y)
    {
        $r = $x;
        if ($y == 0) $r = 1;
        for ($i = 1; $i < $y; $i++) {
            $r = cmul($r, $x);
        }
        return $r;
    }

    if (isset($_GET['x']) && isset($_GET['y']) && isset($_GET['op'])) {
        $x = intval($_GET['x']);
        $y = intval($_GET['y']);
        $op = ($_GET['op']);
        switch ($op) {
            case "Produkt":
                echo cmul($x, $y);
                break;
            case "Potenca":
                echo cpow($x, $y);
                break;
        }
        /*
        Testni podatki:
        
            x  y   op       r
            10 10  Produkt  100
            1  1   Produkt  1
            0  0   Potenca  1
            10 3   Potenca  1000
        */
    } ?>

</body>

</html>