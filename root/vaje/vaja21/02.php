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
            border: 1px solid grey;
            padding: 10px;
        }
    </style>
</head>

<body>
    <form>
        <h1>Dodaj</h1>
        X: <input type="number" name="x" min="-200" max="200"><br>
        Y: <input type="number" name="y" min="-200" max="200"><br>
        Barva: <input type="color" name="b"><br>
        <button>Dodaj</button>
    </form>

    <form>
        <h1>Izpis</h1>
        Barva: <input type="color" name="fb"><br>
        <button>Find</button>
    </form>

    <?php
    require_once "./lib.php";

    $db = new mysqli('mysql', 'root', 'root', 'geometrija1');

    if (allset(['b', 'x', 'y'])) {
        $x = intOrDie($_GET['x'], -200, 200);
        $y = intOrDie($_GET['y'], -200, 200);
        $b = strtoupper(substr(colorOrDie($_GET['b']), 1, 6));

        $q = $db->prepare("INSERT INTO tocke2d VALUE (?,?,?)");
        $q->bind_param('iis', $x, $y, $b);
        if ($q->execute()) {
            echo "Tocka dodana";
        } else {
            echo "Tocka ni dodana";
        }
    } else if (allset(['fb'])) {
        $color = strtoupper(substr(colorOrDie($_GET['fb']), 1, 6));
        $q = $db->prepare("SELECT x,y FROM tocke2d WHERE barva = ?");
        $q->bind_param("s", $color);
        $q->execute();
        $r = $q->get_result();
        $ps = $r->fetch_all();
        echo "<table>";

        foreach ($ps as $p) {
            $x = $p[0];
            $y = $p[1];
            echo "<tr><td>$x</td><td>$y</td></tr>";
        }

        echo "</table>";
    }
    ?>
</body>

</html>