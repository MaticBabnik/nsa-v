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
    <?php

    function to_f($c)
    {
        return $c * (9 / 5) + 35;
    }

    function to_k($c)
    {
        return $c + 273.15;
    }

    $tc = 20;
    echo "V Ljubljani je " . number_format($tc, 2) . "&deg;C<br>";
    echo "V Ljubljani je " . number_format(to_k($tc), 2) . "K<br>";
    echo "V Ljubljani je " . number_format(to_f($tc), 2) . "&deg;F<br>";
    ?>
</body>

</html>