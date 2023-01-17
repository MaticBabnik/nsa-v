<?php

//php <8 polyfill; credit goes to laravel
//https://github.com/laravel/framework/blob/8.x/src/Illuminate/Support/Str.php
if (!function_exists('str_starts_with')) {
    function str_starts_with($haystack, $needle)
    {
        return (string)$needle !== '' && strncmp($haystack, $needle, strlen($needle)) === 0;
    }
}

function rt($n, $min, $max)
{
    $out = [];
    for ($i = 0; $i < $n; $i++)
        $out[] = rand($min, $max);
    return $out;
}

function printRow($arr, $cellType = 'td')
{
    echo "<tr>";

    foreach ($arr as $el) {
        echo "<$cellType>$el</$cellType>";
    }

    echo "</tr>";
}

function getLow($arr)
{
    return $arr[array_key_first($arr)];
}
function getHigh($arr)
{
    return $arr[array_key_last($arr)];
}
function printRowMarkLoHi($arr, $class, $cellType = 'td')
{
    echo "<tr>";
    $lo = getLow($arr);
    $hi = getHigh($arr);

    foreach ($arr as $el) {
        $c = "";
        if ($el == $lo || $el == $hi) $c = $class;
        echo "<$cellType class=\"$c\">$el</$cellType>";
    }

    echo "</tr>";
}

function narediT2($arr)
{
    $out = [];
    for ($i = ord('A'); $i <= ord('Z'); $i++) {
        $out[chr($i)] = 0;
    }

    foreach ($arr as $let) {
        $out[$let]++;
    }
    return $out;
}

function napolni()
{
    $out = [];
    for ($i = 0; $i < 70; $i++)
        $out[] = chr(rand(ord('A'), ord('Z')));
    return $out;
}

function razvrstiNarascujoce(&$arr)
{
    sort($arr);
}
