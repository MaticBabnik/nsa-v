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

function floatOrDie($p, $min = null, $max = null)
{
    if (!is_numeric($p)) die("invalid type");
    $iv = floatval($p);
    if (is_numeric($min) && $min > $iv) die("too small");
    if (is_numeric($max) && $max < $iv) die("too big");
    return $iv;
}

function strlenOrDie($p, $min, $max)
{
    if (!is_string($p)) die("Not a string");
    $iv = strlen($p);
    if ($min > $iv) die("String too small");
    if ($max < $iv) die("String too big");
    return $p;
}

function colorOrDie($c)
{
    if (preg_match('/^#[\da-f]{6}$/i', $c)) return $c;
    else die('Not a color');
}



function matchOrDie($v, $r)
{
    if (preg_match($r, $v)) return $v;
    else die("\"$v\" doesn't match \"$r\"");
}

function matchOrNull($v, $r)
{
    if (preg_match($r, $v)) return $v;
    else return null;
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

function chooseOrDie(&$v, $options)
{
    switch (gettype($v)) {
        case 'array':
            foreach ($v as $vv) {
                if (!in_array($vv, $options))
                    die("'$vv' is not a valid option");
            }
            return $v;
        default:
            if (in_array($v, $options)) return [$v];
            else die("'$v' is not a valid option");
    }
}


function pointOrDie(&$p)
{
    if (!preg_match("/^\d+,\d+$/", $p)) die("$p is not a valid point");
    $s = explode(',', $p);
    return ["x" => intval($s[0]), "y" => intval($s[1])];
}

function dateStringOrDie($d)
{
    return matchOrDie($d, '/^\d{4}-\d{1,2}-\d{1,2}$/');
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
