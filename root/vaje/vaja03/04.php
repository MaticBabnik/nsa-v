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
    <h1>3.4</h1>
    <?php

    $v = rand(1, 7);
    printf("<span style=\"font-size: %dpx\">%d </span>", 10, $v);

    for ($i = 2; $i < 6; $i++) {
        printf("<span style=\"font-size: %dpx\">< %d </span>", 8 + 2 * $i, $i * $v);
    }

    ?>
</body>

</html>