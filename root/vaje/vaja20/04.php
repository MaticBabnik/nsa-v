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
    </style>
</head>

<body>
    <form>
        <label for="b">Barva:</label>
        <select name="b" id="b" required>
            <?php
            require_once './lib.php';
            $db = new mysqli('mysql', 'root', 'root', 'geometrija', 3306);

            $barve =  $db->query('SELECT barvaID,barva FROM barve ORDER BY barva ASC');

            while ($barva = $barve->fetch_assoc()) {
                $id = $barva['barvaID'];
                $ime = $barva['barva'];
                echo "<option value=\"$id\">$ime</option>";
            }
            $barve->free_result();
            ?>
        </select>
        <button>Seznam</button>
    </form>

    <?php
    if (allset(['b'])) {
        $b = intOrDie($_GET['b'], 1);

        $q = $db->prepare("SELECT x,y FROM tocke2d WHERE barvaID = ?");
        $q->bind_param('i', $b);
        $r = $q->execute();
        $q->bind_result($x, $y);
        if ($r) {
            echo "<table>";
            while ($q->fetch()) {
                echo "<tr><td>$x</td><td>$y</td></tr>";
            }
            echo "</table>";
        } else {
            echo "Napaka DB...";
        }
    }
    ?>
</body>

</html>