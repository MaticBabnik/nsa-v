<?php
function napolniT(&$src)
{
    global $t;
    foreach ($src as $cardata) {
        $t[$cardata[0]] = [
            "zaloga" => $cardata[1],
            "prodano" => $cardata[2]
        ];
    }
}

function nakup($oseba, $znamka)
{
    global $t;
    global $lastnik;

    if (!key_exists($znamka, $t)) return false;
    if ($t[$znamka]["zaloga"] < 1) return false;

    $t[$znamka]["zaloga"]--;
    $t[$znamka]["prodano"]++;

    if (!key_exists($oseba, $lastnik))
        $lastnik[$oseba] = [];
    $lastnik[$oseba][] = $znamka;

    return true;
}


function randomItem(&$items)
{
    $mx = sizeof($items) - 1;
    return $items[rand(0, $mx)];
}

function prodaja($oseba, $znamka)
{
    global $t;
    global $lastnik;

    if (!key_exists($oseba, $lastnik)) return false; //ni osebe
    if (!in_array($znamka, $lastnik[$oseba])) return false; //ni avta

    $t[$znamka]["zaloga"]++;

    $index = array_search($znamka, $lastnik[$oseba]); // ne more biti false
    unset($lastnik[$oseba][$index]);

    $lastnik[$oseba] = array_values($lastnik[$oseba]); //normaliziramo
    return true;
}

function izpisLastnikov($znamka)
{
    global $lastnik;
    $lz = [];


    foreach ($lastnik as $l => $avti) {
        if (in_array($znamka, $avti))
            $lz[] = $l;
    }
    return $lz;
}

function prodajaVseh($oseba)
{
    global $t;
    global $lastnik;

    if (!key_exists($oseba, $lastnik)) return false; //ni osebe

    foreach ($lastnik[$oseba] as $znamka) {
        $t[$znamka]["zaloga"]++;
    }
    unset($lastnik[$oseba]);

    return true;
}

function ljudjeZAvti()
{
    global $lastnik;
    $out = [];

    foreach ($lastnik as $ime => $avti) {
        if (sizeof($avti) != 0) $out[] = $ime;
    }
    return $out;
}

function znamkeZLastniki()
{
    global $lastnik;
    $out = [];

    foreach ($lastnik as $avti) {
        foreach ($avti as $znamka) {
            if (array_search($znamka, $out) === false) $out[] = $znamka;
        }
    }
    return $out;
}

function prestejAvte(&$arr, &$znamke)
{
    $st = [];
    foreach ($znamke as $zn) {
        $st[$zn] = 0;
    }

    foreach ($arr as $zn) {
        $st[$zn]++;
    }

    return $st;
}

function prikazKolicin()
{
    global $lastnik;
    $lastniki = ljudjeZAvti();
    $znamke = znamkeZLastniki();

    // header
    echo "<tr>";
    echo "<th></th>";
    foreach ($znamke as $zn) {
        echo "<th>$zn</th>";
    }
    echo "</tr>\n";

    foreach ($lastniki as $l) {
        echo "<tr>";
        echo "<td>$l</td>";
        $avti = prestejAvte($lastnik[$l], $znamke);
        foreach ($znamke as $zn) {
            $cnt = $avti[$zn];
            echo "<td>$cnt</td>";
        }
        echo "</tr>";
    }
}
