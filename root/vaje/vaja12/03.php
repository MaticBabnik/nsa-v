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
const samostalniki = ['A', 'E', 'I', 'O', 'U'];

function beseda($n)
{
    $out = [];

    for ($i = 0; $i < $n; $i++) {
        $out[] = chr(rand(ord('A'), ord('Z')));
    }
    return $out;
}

function prva($b)
{
    sort($b);
    return join('', $b);
}

function zadnja($b)
{
    rsort($b);
    return join('', $b);
}

function soglasniki($b)
{
    $out = [];
    foreach ($b as $c) {
        if (!in_array($c, samostalniki)) {
            $out[] = $c;
        }
    }
    return join('', $out);
}

$beseda = beseda(10);
echo "Beseda: " . join('', $beseda) . "\n";
echo "Prva po abecedi: " . prva($beseda) . "\n";
echo "Zadnja po abecedi: " . zadnja($beseda) . "\n";
echo "Brez samoglasnikov: " . soglasniki($beseda) . "\n";
?>
    </pre>
</body>

</html>