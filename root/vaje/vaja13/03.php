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
    <?php
    const sode = ['0', '2', '4', '6', '8'];
    function dsl($v, $t)
    {
        $nstr = "";
        $r = str_split($v);
        foreach ($r as $c) {
            if (in_array($c, sode) != ($t == 'sode')) {
                $nstr .= $c;
            }
        }
        return $nstr;
    }
    ?>
    <form method="get">
        <fieldset>
            <input type="number" name="x" id="x" min="1" step="1" required placeholder="Stevilo" <?php
                                                                                                    if (isset($_GET['x']) && isset($_GET['tip']))
                                                                                                        echo 'value="';
                                                                                                    echo dsl($_GET['x'], $_GET['tip']);
                                                                                                    echo '"';
                                                                                                    ?>><br>
            <span><input type="radio" name="tip" id="lihe" value="lihe" required> Lihe</span>
            <span><input type="radio" name="tip" id="sode" value="sode" required> Sode</span>
            <br>
            <input type="submit" value="Brisi stevke">
        </fieldset>
    </form>
</body>

</html>