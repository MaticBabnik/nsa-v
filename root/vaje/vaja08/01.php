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

$tab = array("bela", "modra", "bela", "rdeča", "zelena", "bela", "rdeča", "zelena", "bela");
print_r(ccol1($tab));
?>
    </pre>
    <pre>
<?php
print_r(ccol2($tab));
?>
    </pre>
    <pre>
<?php
print_r(ccol3($tab));
?>
    </pre>
</body>

</html>