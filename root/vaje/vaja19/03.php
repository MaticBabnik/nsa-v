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
            border: 1px solid silver;
            padding: 10px;
        }
    </style>
</head>

<body>
    <form>
        <label for="k">Kraj:</label>
        <select name="k" id="k" required>
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
        <br>
        <span>Samo (ni obvezno): </span>
        <input type="radio" name="spol" id="m" value="m">
        <label for="m">Moski</label>
        <input type="radio" name="spol" id="f" value="f">
        <label for="f">Zenske</label>
        <br>
        <label for="leto">Leto rojstva:</label>
        <input type="number" name="leto" id="leto" min="1920" max="2022">
        <br>
        <button>Isci!</button>
        <input type="reset">

    </form>

    <?php
    if (allset(['k'])) {
        $krajId  = intOrDie($_GET['k']);
        $spol = null;
        $leto = 0;
        if (isset($_GET['spol']))
            $spol = matchOrNull($_GET['spol'], '/^(m|f)$/i');
        if ($spol)
            $spol = strtoupper($spol);

        if (isset($_GET['leto']) && is_numeric($_GET['leto']))
            $leto = intOrDie($_GET['leto']);

        $qstr = "SELECT * FROM oseba WHERE KID = $krajId";
        if ($spol != null)
            $qstr .= " AND spol = '$spol'";
        if ($leto != 0)
            $qstr .= " AND rojstvo <= '$leto-12-31' AND rojstvo >= '$leto-01-01'";

        $r = $db->query($qstr);
        if ($r) {
            echo "<table>";
            while ($rw = $r->fetch_assoc()) {
                echo "<tr>";
                foreach ($rw as $v) {
                    echo "<td>$v</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo $qstr;
            echo '<br>';
            echo $db->error;
        }
    }
    ?>
</body>

</html>