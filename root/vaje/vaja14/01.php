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
    <form method="get">
        <fieldset>
            <input type="text" name="x" id="x" required placeholder="X">
            <br>
            <input type="text" name="y" id="y" required placeholder="Y">
            <br>
            <input type="submit" value="plus" name="op">
            <input type="submit" value="krat" name="op">
        </fieldset>
    </form>
    <?php

    if (isset($_GET['x']) && isset($_GET['y']) && isset($_GET['op'])) {
        $x = intval($_GET['x']);
        $y = intval($_GET['y']);
        $op = ($_GET['op']);

        if (!preg_match('/^-?\d+$/', $_GET['x'])  || !preg_match('/^-?\d+$/', $_GET['y'])) {
            echo "x in y nista celi stevili";
        } else

            switch ($op) {
                case "plus":
                    $r = $x+$y;
                    echo "$x $op $y ==> $r";
                    break;
                case "krat":
                    $r = $x*$y;
                    echo "$x $op $y ==> $r";
                    break;
            }
    } ?>

</body>

</html>