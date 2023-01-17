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
            border: 1px solid silver;
            padding: .5rem;
            text-align: center;
        }
    </style>
</head>

<body>
    <pre>
<?php
include_once "./gorivo.php";
$d['2231'] = ['ime' => 'Matic', 'natocenoGorivo' => [30]];
$d['2231']['natocenoGorivo'][] = 41;

function tocil_n_krat($n)
{
    global $d;
    foreach ($d as $id => $kupec) {
        if (count($kupec['natocenoGorivo']) >= $n) {
            $ime = $kupec['ime'];
            $gorivo = join(' ', $kupec['natocenoGorivo']);
            echo "Sifra=$id Ime=$ime Natoceno gorivo= $gorivo\n";
        }
    }
}

function n_sum($arr)
{
    $n = 0;
    foreach ($arr as $e) {
        $n += $e;
    }
    return $n;
}

tocil_n_krat(3);

function gascmp($a, $b)
{
    $ga = n_sum($a['natocenoGorivo']);
    $gb = n_sum($b['natocenoGorivo']);
    if ($ga != $gb) return $ga - $gb;
    return strcmp($a['ime'], $b['ime']);
}

function sort_gas()
{
    global $d;
    uasort($d, 'gascmp');
}
echo "\n\n";

sort_gas();
tocil_n_krat(0); //izpis vseh

$d['9999'] = ['ime' => 'Zdenka', 'natocenoGorivo' => []];
?>
    </pre>
    <?php
    function pr_minmax()
    {
        global $d;
        echo "<table><tr><th>Ime</th><th>Min</th><th>Max</th></tr>";

        foreach ($d as $kupec) {
            $ime = $kupec['ime'];
            $min = count($kupec['natocenoGorivo']) == 0 ? 'N/A' : min($kupec['natocenoGorivo']);
            $max = count($kupec['natocenoGorivo']) == 0 ? 'N/A' : max($kupec['natocenoGorivo']);

            echo "<tr><td>$ime</td><td>$min</td><td>$max</td></tr>";
        }
        echo   "</table>";
    }

    pr_minmax();
    ?>

    <pre>
<?php
$kategorije = [];

function gtb($n)
{
    return (ceil($n / 10) + 1) * 10;
}

function v_kategorije()
{
    global $kategorije;
    global $d;

    for ($i = 10; $i <= 80; $i += 10) {
        $kategorije[$i] = [];
    }

    foreach ($d as $id => $kupec) {
        echo "$id \n";
        foreach ($kupec['natocenoGorivo'] as $gas) {
            $kategorije[gtb($gas)][$id] = 1;
        }
    }

    foreach ($kategorije as $key => $val) {
        $kategorije[$key] = array_keys($val);
    }
}

function scmp($a, $b)
{
    return count($b) - count($a);
}


v_kategorije();

uasort($kategorije,'scmp');
print_r($kategorije);
?>
    </pre>
</body>

</html>