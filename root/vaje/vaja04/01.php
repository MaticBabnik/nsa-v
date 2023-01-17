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
    <pre>

        <?php
        $crka = rand(ord("G"), ord("N"));
        printf("Crka = %s\n", chr($crka));
        echo ("pred:");
        for ($c = $crka - 5; $c < $crka; $c++) {
            echo "  " . chr($c);
        }
        echo ("\npo:  ");
        for ($c = $crka + 1; $c < $crka + 6; $c++) {
            echo "  " . chr($c);
        }
        ?>
    </pre>
</body>

</html>