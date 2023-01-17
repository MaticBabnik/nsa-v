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
function rnd($n, $a, $b, &$del3, &$ostala)
{
    for ($i = 0; $i < $n; $i++) {
        $s = rand($a, $b);
        if ($s % 3 == 0) $del3[] = $s;
        else $ostala[] = $s;
    }
}
$del3 = [];
$ostala = [];

rnd(rand(30, 50), rand(100, 150), rand(250, 300), $del3, $ostala);

echo "velikost del3: ".count($del3)."\n";
echo "velikost ostala: ".count($ostala)."\n";


echo "max del3: ".max($del3)."\n";
echo "max ostala: ".max($ostala)."\n";

?>
    </pre>
</body>

</html>