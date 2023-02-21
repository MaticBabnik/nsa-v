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
        <label for="q">Isci priimek: </label>
        <input type="text" name="q" id="q" required>
        <button>Isci!</button>
    </form>
    <?php
    require_once './lib.php';
    if (allset(['q'])) {
        $q = $_GET['q'];

        $db = new mysqli('mysql', 'root', 'root', 'bazaOseb', 3306);
        $lq = $db->prepare('select o.id, o.ime, o.priimek, o.rojstvo, o.spol, o.email, o.opis, o.KID, k.imeKraja from oseba o natural join kraj k where priimek = ? order by o.ime,o.priimek');
        $lq->bind_param('s', $q);
        if (!$lq->execute()) die('DB error');

        $r = $lq->get_result();
        $c = null;

        echo '<table class="btab">';
        echo "<tr><th colspan=9>$q</th></tr>";
        while ($c = $r->fetch_row()) {
            echo "<tr>";
            foreach ($c as $f) {
                echo "<td>$f</td>";
            }
            echo "</tr>";
        }
        echo '</table>';

        $lq->free_result();
    }
    ?>
</body>

</html>