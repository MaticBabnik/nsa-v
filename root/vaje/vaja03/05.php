<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP stuff</title>
    <link rel="stylesheet" href="/assets/unsuck.css">
    <style>
        #v3-5:not(.problem) {
            font-size: 10px;
            color: greenyellow;
        }

        #v3-5:not(.problem) span {
            font-size: 12px;
            color: lightblue;
        }

        #v3-5.problem {
            font-size: 12px;
            color: red;
            font-weight: bold;
        }

        #v3-5 span {
            font-size: 16px;
        }
    </style>
</head>

<body>
    <h1>3.5</h1>
    <?php

    // stolen from Laravel, php <8 polyfill
    if (!function_exists('str_contains')) {
        function str_contains($haystack, $needle)
        {
            return $needle !== '' && mb_strpos($haystack, $needle) !== false;
        }
    }

    function randomLetter($from = "a", $to = "z")
    {
        return chr(rand(ord($from), ord($to)));
    }

    $l1 = randomLetter();
    $ls = "";
    for ($i = 0; $i < 3; $i++) $ls = $ls . randomLetter();

    $match = str_contains($ls, $l1);
    ?>
    <span id="v3-5" class="<?php if ($match) echo "problem"; ?>">
        <span class="big"><?php echo strtoupper($l1); ?></span><?php echo $ls; ?>
    </span>
</body>

</html>