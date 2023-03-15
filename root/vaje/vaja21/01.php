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
    <?php
    $db = new mysqli('mysql', 'root', 'root', 'geometrija');
    $pg = '<option disabled selected>Izberi tocko</option>';

    $q = $db->query("SELECT x,y FROM tocke2d");
    $r = $q->fetch_all();

    foreach ($r as $t) {
        $x = $t[0];
        $y = $t[1];
        $pg .= "<option value=\"$x,$y\">($x,$y)</option>";
    }
    ?>
    <form>
        T1:
        <select name="p1" required>
            <?php
            echo $pg;
            ?>
        </select>
        <br>
        T2:
        <select name="p2" required>
            <?php
            echo $pg;
            ?>
        </select>
        <br>
        <button>Razdalja</button>
    </form>


    <?php
    require_once "./lib.php";

    if (allset(['p1', 'p2'])) {
        $p1 = pointOrDie($_GET['p1']);
        $p2 = pointOrDie($_GET['p2']);

        $dx = $p2['x'] - $p1['x'];
        $dy = $p2['y'] - $p1['y'];

        $d = sqrt(pow($dx, 2) + pow($dy, 2));
        echo "Razdalja je $d";
    }
    ?>
</body>

</html>