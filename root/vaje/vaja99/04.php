<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/unsuck.css">
</head>

<body>
    <?php
    $x = 30;
    $y = 'a';

    echo "$x $y" . '<br>';
    echo '$x $y' . '<br>';
    echo '$x + $y' . '<br>';
    echo "$x + $y" . '<br>';
    $y = 30;
    echo $x + $y . '<br>';
    $z = "30";
    echo $x + $z . '<br>';
    $t = "30g";
    echo $x + $t . '<br>';
    ?>
    <hr>
    <i>a) v &quot; lahko uporabljamo spremenljivke</i><br>
    <i>b) kot stevilke?</i>
</body>

</html>