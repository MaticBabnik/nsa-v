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
        Stavba:
        <select name="kr" required>
            <?php
            $db = new mysqli('mysql', 'root', 'root', 'geodetskauprava');
            $r = $db->query("SELECT UNIQUE  Kraj FROM stavba");
            $kr = $r->fetch_all();
            foreach ($kr as $k) {
                echo "<option value=\"$k[0]\">$k[0]</option>";
            }
            $r->free_result();
            ?>
        </select>
        <br>
        min prebivalcev: <input type="number" required name="mpr" min=0> <br>
        <button>Najdi</button>
    </form>


    <?php
    require_once "./lib.php";

    if (allset(['kr', 'mpr'])) {
        $kr = strlenOrDie($_GET['kr'], 2, 30);
        $mpr = intOrDie($_GET['mpr'], 0);
        $ins = $db->prepare("SELECT Naslov, SteviloPrebivalcev FROM stavba WHERE Kraj = ? AND SteviloPrebivalcev > ?");
        $ins->bind_param("si", $kr, $mpr);
        $r = $ins->execute();
        if (!$r) {
            die("Napaka");
        }

        echo "<table>";
        $r = $ins->get_result();
        foreach ($r->fetch_all() as $st) {
            echo "<tr><td>$st[0]</td><td>$st[1]</td></tr>";
        }
        echo "</table>";
    }
    ?>
</body>

</html>