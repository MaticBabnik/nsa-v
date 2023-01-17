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

    echo "a... ";
    echo var_dump($a) . "<br />";
    echo "b... ";
    echo var_dump($b) . "<br />";
    echo "c... ";
    echo var_dump($c) . "<br />";
    echo "d... ";
    echo var_dump($d) . "<br />";

    echo ($a + $b) . "<br/>";
    echo ($a + $c) . "<br/>";
    echo ($a + $d) . "<br/>";
    echo ($b + $a) . "<br/>";
    echo ($b + $c) . "<br/>";
    echo ($b + $d) . "<br/>";
    echo ($c + $b) . "<br/>";
    echo ($c + $a) . "<br/>";
    echo ($c + $d) . "<br/>";
    echo ($d + $b) . "<br/>";
    echo ($d + $c) . "<br/>";
    echo ($d + $a) . "<br/>";
    ?>
</body>

</html>