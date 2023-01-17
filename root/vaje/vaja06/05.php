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
            border: 1px solid gray;
            padding: .25rem;
        }
    </style>
</head>

<body>
    <table>
        <?php
        $tab = array(
            "Januar" => array(),
            "Februar" => array(),
            "Marec" => array(),
            "April" => array(),
            "Maj" => array(),
            "Junij" => array()
        );
        foreach ($tab as $k => $v) {
            for ($i = 0; $i < 6; $i++)
                $tab[$k][] = rand(10, 20);
        }

        function pr_t($t)
        {
            foreach ($t as $k => $v) {
                echo "<tr><td>$k</td>";
                foreach ($v as $a) {
                    echo "<td>$a</td>";
                }
                echo "</tr>\n";
            }
        }

        pr_t($tab);

        function rmMinForeach(&$t)
        {
            foreach ($t as $tk => $tv) {
                $mv = min($t[$tk]);
                foreach ($t[$tk] as $nk => $nv) {
                    if ($nv == $mv) unset($t[$tk][$nk]);
                }
            }
        }
        ?>
    </table>
    <h2>Odstranimo minimume</h2>
    <table>
        <?php
        rmMinForeach($tab);
        pr_t($tab);
        ?>
    </table>
    <?php
    function sum(&$arr)
    {
        $s = 0;
        foreach ($arr as $e) {
            $s += $e;
        }
        return $s;
    }
    $sums = [];
    foreach ($tab as $tk => $tv) {
        $sums[$tk] = sum($tv);
    }
    $avg = sum($sums) / sizeof($sums);
    echo "avg = $avg";

    $tab2 = [];

    foreach ($sums as $sk => $sv) {
        if ($sv < $avg) {
            $tab2[$sk] = $tab[$sk];
        }
    }

    foreach ($tab2 as $t2k => $t2v) {
        unset($tab[$t2k]);
    }
    ?>
    <h2>Premaknemo podpovprecne v tab2</h2>
    <h3>tab</h3>
    <table>
        <?php
        pr_t($tab);
        ?>
    </table>
    <h3>tab2</h3>
    <table>
        <?php
        pr_t($tab2);
        ?>
    </table>
</body>

</html>