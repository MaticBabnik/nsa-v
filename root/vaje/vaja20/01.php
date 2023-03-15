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
            margin: 10px;
        }

        td {
            border: 1px solid silver;
            padding: 10px;
        }
        .hl {
            background-color: green;
        }
    </style>
</head>

<body>
    <form>
        <h2>Prikazi:</h2>
        <select name="st[]" multiple required>
            <option value="ime">Ime</option>
            <option value="priimek">Priimek</option>
            <option value="imeKraja">Kraj</option>
            <option value="rojstvo">Rojstvo</option>
        </select>
        <h2>Sortiraj po:</h2>
        <select name="srt[]" multiple>
            <option value="priimek">Priimek</option>
            <option value="imeKraja">Kraj</option>
            <option value="rojstvo">Rojstvo</option>
        </select>
        <br>
        <button>Isci</button>
    </form>
    <?php
    require_once "./lib.php";

    if (allset(['st'])) {
        $db = new mysqli('mysql', 'root', 'root', 'bazaOseb', 3306);
        $fields = chooseOrDie($_GET['st'], ['ime', 'priimek', 'imeKraja', 'rojstvo']);
        $fs = '';

        $qs = "SELECT * FROM oseba NATURAL JOIN kraj ";

        if (isset($_GET['srt'])) {
            $order = chooseOrDie($_GET['srt'], ['priimek', 'imeKraja', 'rojstvo']);
            $qs .= 'ORDER BY ' . join(', ', $order);
            $fs = $order[0];
        }

        $r = $db->query($qs);
        if ($r) {
            echo "<table>";
            while ($rw = $r->fetch_assoc()) {
                echo "<tr>";
                foreach ($rw as $k => $v) {
                    $extra = $fs == $k ? 'class="hl"' : '';
                    if (in_array($k, $fields))
                        echo "<td $extra>$v</td>";
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