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
            border: 2px solid white;
            margin: 1rem;
        }

        td {
            border: 1px solid white;
            padding: .25rem;
        }

    </style>
</head>

<body>
    <table>
        <?php
        /*
            Dana je tabela $tab=array(13,22,40,55,2,19,18,29,35,44);
    a) Napišite program, ki iz tabele izbriše dva naključna elementa (na naključnih mestih) in nato izpiše novo vsebino tabele $tab v obliki tabele  HTML.
    b) V tabelo dodajte naslednje elemente: na ključu "prvi" naj bo vrednost 1, na ključu "drugi" naj bo vrednost 2. Izpišite vsebino tabele v obliki 2D tabele HTML tako, da se v prvem stolpcu izpiše vrednost ključa, v drugem vrednost elementa tabele $tab. Ključe izpišite v krepki pisavi.
    c) Izračunajte in izpišite vsoto elementov tabele $tab.
            */
        $tab = array(13, 22, 40, 55, 2, 19, 18, 29, 35, 44);

        for ($i = 0; $i < 2; $i++) {
            $i = rand(0, sizeof($tab));
            unset($tab[$i]);
            $tab = array_values($tab);
        }

        function pr_t($t)
        {
            foreach ($t as $k => $v) {
                echo "<tr><td>$k</td><td>$v</td></tr>\n";
            }
        }
        pr_t($tab);
        ?>
    </table>
    <table>
        <?php
        $tab["prvi"] = 1;
        $tab["drugi"] = 2;
        pr_t($tab);
        ?>
    </table>

    <p>
        <?php
        $sum = 0;
        foreach ($tab as $v) {
            $sum += $v;
        }
        echo "Vsota je $sum";
        ?>
    </p>
</body>

</html>