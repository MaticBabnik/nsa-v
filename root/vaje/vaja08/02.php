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

$tocke = array(
    "red" => array(array(10, 40), array(30, 50), array(20, 80)),
    "green" => array(array(10, -40), array(30, -10)),
    "blue" => array(array(-20, 70)),
    "silver" => array(array(-10, -20), array(-30, -10))
);

ap($tocke);
print_r($tocke);
?>
    </pre>
</body>

</html>