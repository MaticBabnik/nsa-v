<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP stuff</title>
    <link rel="stylesheet" href="/assets/unsuck.css">
</head>

<body>
    <form>
        <label for="k">Kraj:</label>
        <button>Isci!</button>
        <br>
        <select name="k[]" id="k" multiple required>
            <?php
            require_once './lib.php';
            $db = new mysqli('mysql', 'root', 'root', 'bazaOseb', 3306);

            $kraji =  $db->query('SELECT KID,imeKraja FROM kraj ORDER BY imeKraja ASC');
            $kraj = null;

            while ($kraj = $kraji->fetch_assoc()) {
                $id = $kraj['KID'];
                $ime = $kraj['imeKraja'];
                echo "<option value=\"$id\">$ime</option>";
            }
            $kraji->free_result();
            ?>

        </select>
    </form>

    <?php
    if (allset(['k'])) {
        $kid = numArrayOrDie($_GET['k']);
        $kl = '(' . join(',', $kid) . ')';
        $r = $db->query("select k.imeKraja, o.id, o.ime, o.priimek, o.rojstvo, o.spol, o.email, o.opis from oseba o natural join kraj k where o.KID in $kl order by k.imeKraja,o.ime,o.priimek");
        $c = null;
        $ck = '';
        echo '<table class="btab">';
        while ($c = $r->fetch_row()) {
            if ($ck != $c[0]) { // se je zacel nov kraj?
                $ck = $c[0];
                echo "<tr><th colspan=9>$ck</th></tr>";
            }

            echo "<tr>";
            array_shift($c); // kraj gre stran
            foreach ($c as $f) {
                echo "<td>$f</td>";
            }
            echo "</tr>";
        }
        echo '</table>';

        $r->free_result();
    }
    ?>
</body>

</html>