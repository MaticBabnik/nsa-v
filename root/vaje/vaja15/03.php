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
    $units = [
        'c' => [
            'text' => '&deg;C',
            'tobase' => function ($x) {
                return $x;
            },
            'frombase' => function ($x) {
                return $x;
            }
        ],
        'k' => [
            'text' => 'K',
            'tobase' => function ($x) {
                return $x + 273.15;
            },
            'frombase' => function ($x) {
                return $x - 273.15;
            }
        ],
        'f' => [
            'text' => '&deg;F',
            'tobase' => function ($x) {
                return ($x - 32) / (9 / 5);
            },
            'frombase' => function ($x) {
                return $x * (9 / 5) + 32;
            }
        ],
    ];
    $valid = array_keys($units);

    function printOpts($s)
    {
        global $units;
        foreach ($units as $k => $v) {
            $t = $v['text'];
            $sel = $s == $k ? ' selected' : '';
            echo "<option value=\"$k\"$sel>$t</option>";
        }
    }

    $from = 'c';
    $to = 'f';

    if (isset($_GET['from']))
        if (in_array($_GET['from'], $units))
            $from = $_GET['from'];

    if (isset($_GET['to']))
        if (in_array($_GET['to'], $units))
            $to = $_GET['to'];

    ?>
    <form method="get">
        <fieldset>
            <legend>Vhodni podatki</legend>

            <input type="number" name="n" id="n" required step="0.1" value="<?php if (isset($_GET['n'])) echo $_GET['n']; ?>">
            <select name="from" id="from">
                <?php printOpts($from); ?>
            </select>
            <span>-&gt;</span>
            <select name="to" id="to">
                <?php printOpts($to); ?>
            </select>
            <br>
            <input type="submit" name="pretvori">
        </fieldset>
    </form>
    <fieldset>
        <legend>Rezultat</legend>
        <input type="text" name="rezultat" id="rezultat" disabled <?php
                                                                    if (isset($_GET['n'])) {
                                                                        $n = floatval($_GET['n']);
                                                                        $base = $units[$from]['tobase']($n);
                                                                        $r = $units[$to]['frombase']($n);

                                                                        printf('value="%.2f"', $r);
                                                                    }
                                                                    ?>>

    </fieldset>

</body>

</html>