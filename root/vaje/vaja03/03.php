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
    <h1>3.3</h1>
    <?php

    $year = rand(1500,2100);
    $r3 = !(($year % 4 != 0) || ($year % 100 == 0 && $year % 400 != 0));
    ?>
    <span style="color: <?php echo $r3 ? "blue" : "red"; ?>">Leto <?php echo $r3 ? "$year je" : "$year ni"; ?> prestopno leto</span>
</body>

</html>