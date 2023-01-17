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
        $data = array("ime" => "Luka", "vzdevek" => "Lukec", "starost" => 16, "spol" => "M");
        $data["datumPrijave"] = date("d.m.Y");

        $keys = [];
        $vals = [];
        $counts = [];

        foreach ($data as $k => $v) {
            $keys[] = $k;
            $vals[] = $v;
            $t = gettype($v);

            if (array_key_exists($t, $counts)) {
                $counts[$t]++;
            } else {
                $counts[$t] = 1;
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

        pr($keys);
        pr($vals);

        ?>
    </table>
    <pre>
Statistika:
<?php
print_r($counts);
?>
    </pre>
</body>

</html>