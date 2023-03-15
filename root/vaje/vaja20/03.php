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
        <br>
        X: <input type="number" name="x" min="1" max="200"> <br>
        Y: <input type="number" name="y" min="1" max="200"> <br>
        <button>Dodaj</button>
    </form>

    <?php
    if (allset(['b', 'x', 'y'])) {
        $b = intOrDie($_GET['b'], 1);
        $x = intOrDie($_GET['x'], 1, 200);
        $y = intOrDie($_GET['y'], 1, 200);

        $q = $db->prepare("INSERT INTO tocke2d VALUE (?,?,?)");
        $q->bind_param('iii', $x, $y, $b);
        if ($q->execute()) {
            echo "Tocka dodana";
        } else {
            echo "Tocka ni dodana";
        }
    }
    ?>
</body>

</html>