<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP stuff</title>
    <link rel="stylesheet" href="/assets/unsuck.css">
    <style>
        .liho {
            font-size: 10px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .sodo {
            font-size: 12px;
            font-family: 'Courier New', Courier, monospace;
        }
    </style>
</head>

<body>
    <p>

        <?php
        $t = array();
        while (true) {
            $v = rand(1, 100);
            $t[] = $v;
            if ($v == ord("T")) break;
        }
        $sum = 0;
        $n = 0;
        foreach ($t as $n) {
            if ($n % 2 == 0) {
                printf("<span class=\"sodo\"> %d </span>", $n);
                $sum += $n;
                $n++;
            } else {
                printf("<span class=\"liho\"> %d </span>", $n);
            }
        }
        echo "<br>";
        printf("Povprecje sodih= %d", $sum / $n);
        ?>
    </p>

</body>

</html>