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
    <h1>3.2</h1>
    <?php
    $text = array("Odlicno", "Povprecno", "Podpovprecno", "Katastrofalno");
    $color = array("Green", "Blue", "Blue", "Red");


    $age = rand(0, 20);
    $score = rand(0, 20);
    $i = 0;
    if ($age >= 10) {
        if ($score >= 10) $i = 1;
        else $i = 3;
    } else {
        if ($score >= 10) $i = 0;
        else $i = 2;
    }
    ?>
    <div>Starost: <?php echo $age; ?></div>
    <div>Rezultat: <?php echo $score; ?></div>
    <span style="color: <?php echo $color[$i] ?>"><?php echo $text[$i] ?></span>
</body>

</html>