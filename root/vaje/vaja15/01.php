<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP stuff</title>
    <link rel="stylesheet" href="/assets/unsuck.css">
    <style>
        html,body {
            background-color: <?php
                                $color = '#000000';
                                if (isset($_GET['color'])  && isset($_GET['op'])) {
                                    if (preg_match('/^#[0-9A-F]{6}$/i', $_GET['color']))
                                        $color = $_GET['color'];
                                    switch ($_GET['op']) {
                                        case 'color':
                                            echo $color;
                                            break;
                                        case 'white':
                                            echo "white";
                                            break;
                                    }
                                }
                                ?> !important;
        }
    </style>
</head>

<body>
    <form method="get">
        <fieldset>
            <input type="color" name="color" id="color" required value="<?php echo $color; ?>">
            <br>
            <input type="submit" name="op" value="color">
            <input type="submit" name="op" value="white">
        </fieldset>
    </form>



</body>

</html>