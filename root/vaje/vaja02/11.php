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
    
    $stara_cena_kave = 100;
    $tecaj = 239.64; // zadnji uradni tečaj za tolarje
    // vpišite formulo, ki bo izračunala staro ceno kave v EUR

    $Kava_EUR = $stara_cena_kave / $tecaj;

    echo "Stara cena kave v EUR " . number_format($Kava_EUR,2);
    ?>
</body>

</html>