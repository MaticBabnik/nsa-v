<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP stuff</title>
    <link rel="stylesheet" href="/assets/unsuck.css">
    <style>
        table {
            border-collapse: collapse;
            margin: 1rem;
        }

        td,
        th {
            border: 1px solid lightgray;
            padding: .2rem;
        }
    </style>
</head>

<body>
    <?php
    require_once "_.php";
    require_once "data_amerika.php";
    
    const izpis1_naslov = ['Ime Kraja', 'Kratica', 'Prebivalci'];
    function izpis1($drzava)
    {
        asort($drzava);

        echo "<table>";
        printRow(izpis1_naslov, 'th');

        foreach ($drzava as $ime => $data) {
            $a = $data['drzava'];
            $b = $data['prebivalci'];
            echo "<tr><td>$ime</td><td>$a</td><td>$b</td></tr>";
        }

        echo "</table>";
    }

    function makeShitUp($zd)
    {
        $nk = rand(2, 10);
        $prebivalci = $zd['prebivalci'];
        $ppk =  floor($prebivalci / $nk);
        $kraji = [];
        $i = 1;
        for (; $i <= $nk; $i++) {
            $pk = rand(1, $ppk);
            $kraji["kraj$i"] = $pk;
            $prebivalci -= $pk;
        }
        if ($prebivalci > 0) {
            $kraji["kraj$i"] = $prebivalci;
        }
        arsort($kraji);

        return $kraji;
    }

    function ustvariTabeloDrzav($drzava)
    {
        $out = [];

        foreach ($drzava as $v) {
            $out[$v['drzava']] = makeShitUp($v);
        }

        ksort($out);
        return $out;
    }

    function izpis2($drzava)
    {
        echo "<table>";
        foreach ($drzava as $ime => $data) {
            echo "<tr><td colspan=\"2\">$ime</td></tr>";

            foreach ($data as $kraj => $prebivalci) {
                echo "<tr><td>$kraj</td><td>$prebivalci</td></tr>";
            }
        }

        echo "</table>";
    }

    //isce po zvezni drzavi
    function isci(&$arr, $z)
    {
        $out = [];
        foreach ($arr as $ime => $data) {
            if (str_starts_with($ime, $z)) {
                $out[$ime] = $data;
            }
        }
        return $out;
    }

    //isce kraje po celi drzavi (amerika)
    function isciPovsod(&$arr, $z)
    {
        $out = [];
        foreach ($arr as $dk => $dr) {
            $rezultati = isci($dr, $z);
            foreach ($rezultati as $k => $v) {
                $out["$dk-$k"] = $v;
            }
        }
        return $out;
    }


    izpis1($amerika);

    $td = ustvariTabeloDrzav($amerika);

    izpis2($td);

    $sr2 = isciPovsod($td, 'D');
    $sr3 = isciPovsod($td, 'N');

    echo "<pre>";

    print_r($sr2);
    echo "\n\n";
    print_r($sr3);

    echo "</pre>";

    ?>
</body>

</html>