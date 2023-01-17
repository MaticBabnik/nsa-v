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
            margin-bottom: 1rem;
        }

        td {
            border: 1px solid white;
            padding: .25rem;
        }
    </style>
</head>

<body>
    <pre>
<?php
$tab = array("bela", "modra", "bela", "rdeča", "zelena", "bela", "rdeča", "zelena", "bela");
$tab2 = [];

foreach ($tab as $v) {
    if (array_key_exists($v, $tab2)) {
        $tab2[$v][] = 1;
    } else {
        $tab2[$v] = [1];
    }
}
print_r($tab2);
function sum(&$arr)
{
    $s = 0;
    foreach ($arr as $e) {
        $s += $e;
    }
    return $s;
}

$tab3 = [];
foreach ($tab2 as $t2k => $t2v) {
    $tab3[$t2k] = sum($t2v);
}

print_r($tab3);

function pr_t($t)
{
    foreach ($t as $k => $v) {
        echo "<tr><td>$k</td><td>$v</td></tr>\n";
    }
}
function pr($row)
{
    echo "<tr>";

    foreach ($row as $v) {
        echo "<td>$v</td>";
    }

    echo "</tr>";
}

?>
    </pre>
    <table>
        <?php
        $t2 = [];
        foreach ($tab2 as $t2k => $t2v) {
            $t2[$t2k] = join(",", $t2v);
        }
        pr_t($t2);

        ?>
    </table>

    <table>
        <?php
        pr(array_keys($t2));
        pr(array_values($t2));

        ?>
    </table>

    <table>
        <?php
        pr_t($tab3);

        ?>
    </table>

    <table>
        <?php
        pr(array_keys($tab3));
        pr(array_values($tab3));

        ?>
    </table>

</body>

</html>