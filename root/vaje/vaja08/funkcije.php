<?php

function ccol1(&$b)
{
    $c = [];
    foreach ($b as $col) {
        if (array_key_exists($col, $c))
            $c[$col][] = 1;
        else
            $c[$col] = [1];
    }
    return $c;
}
function ccol2(&$b)
{
    $c = [];
    foreach ($b as $ind => $col) {
        if (array_key_exists($col, $c))
            $c[$col][] = $ind;
        else
            $c[$col] = [$ind];
    }
    return $c;
}
function ccol3(&$b)
{
    $c = [];
    foreach ($b as $col) {
        if (array_key_exists($col, $c))
            $c[$col]++;
        else
            $c[$col] = 1;
    }
    return $c;
}

const SMP = [
    0 => [0 => 'silver', 1 => 'green'],
    1 => [0 => 'green', 1 => 'red']
];

function ap(&$arr)
{
    for ($i = 0; $i < 5; $i++) {
        $np = [rand(-9, 9), rand(-9, 9)];
        $arr[SMP[$np[0] >= 0][$np[1] >= 0]][] = $np;
    }
}

function glet($big = false)
{
    if ($big)
        return chr(rand(ord('A'), ord('Z')));
    else
        return chr(rand(ord('a'), ord('z')));
}

function gw($len = 10)
{
    $w = "";
    for ($i = 0; $i < $len; $i++) {
        $w .= glet();
    }
    return $w;
}

const SAMOGLASNIKI = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];

function samoglasniki($w, $tf = true)
{
    $nw = "";
    $w = str_split($w);

    foreach ($w as $char) {
        if (in_array($char, SAMOGLASNIKI) == $tf) {
            $nw .= $char;
        }
    }
    return $nw;
}

function fch($word)
{
    if (strlen($word) == 0) return 'NA';

    $w = str_split($word);
    sort($w);
    return $w[0];
}

function napolni(&$arr, $n = 6)
{
    foreach ($arr as $key => $val) {
        for ($i = 0; $i < $n; $i++)
            $arr[$key][] = rand(10, 20);
    }
}

function spremeni(&$arr) {
    //todo
}