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
            margin: 1rem;
        }

        td,
        th {
            border: 1px solid lightgray;
            padding: .2rem;
        }

        .bg {
            background-color: darkblue;
        }
    </style>
</head>

<body>
    <?php
    require_once "_.php";

    $t1 = napolni();

    echo "<pre>";
    print_r($t1);
    echo "</pre>";

    razvrstiNarascujoce($t1);
    echo "<table>";
    printRowMarkLoHi($t1, 'bg');
    echo "</table>";

    $t2 = narediT2($t1);

    $l = getLow($t1);
    $lc = $t2[$l];
    $h = getHigh($t1);
    $hc = $t2[$h];

    echo "<p>Najmanjsa crka '$l' se pojavi $lc-krat<br> Najvecja crka '$h' se pojavi $hc-krat</p>";

    asort($t2);

    echo "<pre>";
    print_r($t2);
    echo "</pre>";

    ?>
</body>

</html>