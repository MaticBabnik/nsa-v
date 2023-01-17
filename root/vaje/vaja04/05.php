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

$rn = rand(10, 500);
$bits = str_split(decbin($rn));
$cnt = 0;
foreach ($bits as $bit) {
    if ($bit == "0") $cnt++;
}

printf("stevilo: %d\nbinarno: %s\n", $rn, join("", $bits));

switch (1) {
    case $cnt == 0:
        echo "0 nicel";
        break;
    case $cnt <= 2:
        echo "st nicel <= 2";
        break;
    case $cnt <= 4:
        echo "st nicel <= 4";
        break;
    default:
        echo "st nicel >= 5";
        break;
}

?>
    </pre>

</body>

</html>