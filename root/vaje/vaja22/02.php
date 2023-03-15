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
        Stavba:
        <select name="id" required>
            <?php
            $db = new mysqli('mysql', 'root', 'root', 'geodetskauprava');
            $r = $db->query("SELECT StavbaID, Naslov, Kraj FROM stavba");
            $kr = $r->fetch_all();
            foreach ($kr as $k) {
                echo "<option value=\"$k[0]\">$k[0] ($k[1], $k[2])</option>";
            }
            ?>
        </select>
        <br>
        n: <input type="number" required name="zap" min=1> <br>
        Povrsina: <input type="number" required name="povrsina" min=1 step="0.01"> <br>
        Prijavljene Osebe: <input type="number" required name="osebe" min=1> <br>
        Vrednost: <input type="number" required name="vrednost" min=1000 step="0.01"> <br>
        <button>Dodaj</button>
    </form>


    <?php
    require_once "./lib.php";

    if (allset(['id', 'zap', 'osebe','povrsina','vrednost'])) {

        $id = intOrDie($_GET['id'], 0);
        $zap = intOrDie($_GET['zap'], 1);
        $osebe = intOrDie($_GET['osebe'], 1);
        $povrsina = floatOrDie($_GET['povrsina'], 1);
        $vrednost = floatOrDie($_GET['vrednost'], 1000);

        $ins = $db->prepare("insert into stanovanje values (?,?,?,?,?)");
        $ins->bind_param("iidid", $id, $zap, $povrsina, $osebe, $vrednost);
        $r = $ins->execute();
        if (!$r) {
            die("Zapis NI dodan");
        }

        $ins2 = $db->prepare("UPDATE stavba set SteviloPrebivalcev = SteviloPrebivalcev + ? WHERE StavbaID = ?");
        $ins2->bind_param("ii", $osebe, $id);
        $r = $ins2->execute();
        if ($r) {
            echo "zapis dodan";
        } else {
            die("Zapis NI dodan");
        }
    }
    ?>
</body>

</html>