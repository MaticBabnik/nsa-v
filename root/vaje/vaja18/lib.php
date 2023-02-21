<?php
function allset($arr)
{
    foreach ($arr as $a) {
        if (!isset($_GET[$a])) {
            return false;
        }
    }
    return true;
}


function intOrDie($p, $min = null, $max = null)
{
    if (!is_numeric($p)) die("invalid type");
    $iv = intval($p);
    if (is_int($min) && $min > $iv) die("too small");
    if (is_int($max) && $max < $iv) die("too big");
    return $iv;
}

function colorOrDie($c)
{
    if (preg_match('/^#[\da-f]{6}$/i', $c)) return $c;
    else die('Not a color');
}

function matchOrDie($v, $r)
{
    if (preg_match($r, $v)) return $v;
    else die('No match');
}

function numArrayOrDie(&$v)
{
    switch (gettype($v)) {
        case 'string':
        case 'integer':
            if (!is_numeric($v)) die('Not a number (array)');
            return [intval($v)];
        case 'array':
            $nr = [];
            foreach ($v as $vv) {
                if (!is_numeric($vv)) die('Not a number (array)');
                $nr[] = intval($vv);
            }
            return $nr;
        default:
            die('Not a number (array)');
    }
}

function bagOrDie()
{
    return "bag";
}

function pr_t($t)
{
    echo "<table><tr>";
    foreach ($t as $v) {
        echo "<td>$v</td>\n";
    }
    echo "</tr></table>";
}
