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
include_once "./data.php";

function n_sum($arr)
{
    $n = 0;
    foreach ($arr as $e) {
        $n += $e;
    }
    return $n;
}

function cmp0($a, $b)
{
    return $a[0] - $b[0];
}

function cmp1($a, $b)
{
    return n_sum($a) - n_sum($b);
}

function cmp2($a, $b)
{
    rsort($a);
    rsort($b);
    if ($a[0] - $b[0] != 0) return $a[0] - $b[0];
    if ($a[1] - $b[1] != 0) return $a[1] - $b[1];
    if ($a[2] - $b[2] != 0) return $a[2] - $b[2];
    if ($a[3] - $b[3] != 0) return $a[3] - $b[3];
}

function r1(&$neki)
{
    return uasort($neki, 'cmp0');
}

function r2(&$neki, $n)
{
    $tmp = [];

    foreach ($neki as $k => $v) {
        $tmp[$k] = $v[$n];
    }

    asort($tmp);
    foreach ($neki as $k => $v) {
        $tmp[$k] = $neki[$k];
    }
    $neki = $tmp;
}

function r3(&$neki)
{
    uasort($neki, 'cmp1');
}
function r4(&$neki)
{
    uasort($neki, 'cmp2');
}
function rmshrt(&$neki)
{
    foreach ($neki as $ime => $meti) {
        foreach ($meti as $i => $l) {
            if ($l < 11) {
                unset($neki[$ime][$i]);
            }
        }
        if (count($neki[$ime]) == 0) {
            unset($neki[$ime]);
        } else {
            $neki[$ime]  = array_values($neki[$ime]);  
        }
    }
}

r1($rezultati);
print_r($rezultati);
r2($rezultati,1);
print_r($rezultati);
r3($rezultati);
print_r($rezultati);
r4($rezultati);
print_r($rezultati);
rmshrt($rezultati);
print_r($rezultati);
?>
    </pre>
</body>

</html>