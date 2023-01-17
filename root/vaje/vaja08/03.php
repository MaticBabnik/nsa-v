<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/unsuck.css">
    <style>
    </style>
</head>

<body>
    <pre>
<?php
require_once "./funkcije.php";

$word = gw();
$sag = samoglasniki($word, true);
$sog = samoglasniki($word, false);
$so1 = fch($sog);

echo "beseda: $word\n";
echo "samoglasniki: $sag\n";
echo "soglasniki: $sog\n";
echo "1. soglasnik: $so1\n";

?>
    </pre>
</body>

</html>