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
    <pre>
<?php
function razbij($n)
{
    $ao = array();
    $a = str_split($n);
    foreach ($a as $digit) {
        $ao[] = intval($digit);
    }
    return $ao;
}

$n = rand(10000, 99999);
$r = razbij($n);
sort($r);

$mindig = $r[0];
$mindigc = 1;
for ($i = 1; $i < 5; $i++) {
    if ($r[$i] == $mindig) $mindigc++;
    else break;
}

$maxdig = $r[4];
$maxdigc = 1;
for ($i = 3; $i >= 0; $i--) {
    if ($r[$i] == $maxdig) $maxdigc++;
    else break;
}
printf("Stevilo: %d\n\n", $n);
printf("najmanjsa stevka je %d, ponovi se %d krat\nnajvecja stevka je %d, ponovi se %d krat\n", $mindig, $mindigc, $maxdig, $maxdigc);


?>
    </pre>

</body>

</html>