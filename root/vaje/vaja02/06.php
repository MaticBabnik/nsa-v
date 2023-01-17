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
    $a = "1";
    $b = 1;
    $c = 1.0;
    $d = true;

    echo 'is_bool($a) = ' . is_bool($a) . "<br/ >";
    echo 'is_double($a) = ' . is_double($a) . "<br/ >";
    echo 'is_float($a) = ' . is_float($a) . "<br/ >";
    echo 'is_int($a) = ' . is_int($a) . "<br/ >";
    echo 'is_long($a) = ' . is_long($a) . "<br/ >";
    echo 'is_null($a) = ' . is_null($a) . "<br/ >";
    echo 'is_numeric($a) = ' . is_numeric($a) . "<br/ >";
    echo 'is_string($a) = ' . is_string($a) . "<br/ >";

    echo "<hr>";

    echo 'is_bool($b) = ' . is_bool($b) . "<br/ >";
    echo 'is_double($b) = ' . is_double($b) . "<br/ >";
    echo 'is_float($b) = ' . is_float($b) . "<br/ >";
    echo 'is_int($b) = ' . is_int($b) . "<br/ >";
    echo 'is_long($b) = ' . is_long($b) . "<br/ >";
    echo 'is_null($b) = ' . is_null($b) . "<br/ >";
    echo 'is_numeric($b) = ' . is_numeric($b) . "<br/ >";
    echo 'is_string($b) = ' . is_string($b) . "<br/ >";
    echo "<hr>";

    echo 'is_bool($c) = ' . is_bool($c) . "<br/ >";
    echo 'is_double($c) = ' . is_double($c) . "<br/ >";
    echo 'is_float($c) = ' . is_float($c) . "<br/ >";
    echo 'is_int($c) = ' . is_int($c) . "<br/ >";
    echo 'is_long($c) = ' . is_long($c) . "<br/ >";
    echo 'is_null($c) = ' . is_null($c) . "<br/ >";
    echo 'is_numeric($c) = ' . is_numeric($c) . "<br/ >";
    echo 'is_string($c) = ' . is_string($c) . "<br/ >";
    echo "<hr>";

    echo 'is_bool($d) = ' . is_bool($d) . "<br/ >";
    echo 'is_double($d) = ' . is_double($d) . "<br/ >";
    echo 'is_float($d) = ' . is_float($d) . "<br/ >";
    echo 'is_int($d) = ' . is_int($d) . "<br/ >";
    echo 'is_long($d) = ' . is_long($d) . "<br/ >";
    echo 'is_null($d) = ' . is_null($d) . "<br/ >";
    echo 'is_numeric($d) = ' . is_numeric($d) . "<br/ >";
    echo 'is_string($d) = ' . is_string($d) . "<br/ >";
    echo "<hr>";

    echo "a... ";
    echo var_dump($a) . "<br />";
    echo "b... ";
    echo var_dump($b) . "<br />";
    echo "c... ";
    echo var_dump($c) . "<br />";
    echo "d... ";
    echo var_dump($d) . "<br />";
    ?>
</body>

</html>