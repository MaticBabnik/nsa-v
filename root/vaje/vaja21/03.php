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
        <h1>Odstrani tocker</h1>
        Kvadrant: <input type="text" name="k" pattern="(1|2|3|4)" required><br>
        <button>Remove</button>
    </form>

    <?php
    require_once "./lib.php";

    const KVADRANTI = [
        1 => 'x > 0 AND y > 0',
        2 => 'x < 0 AND y > 0',
        3 => 'x < 0 AND y < 0',
        4 => 'x > 0 AND y < 0',
    ];

    $db = new mysqli('mysql', 'root', 'root', 'geometrija1');

    if (allset(['k'])) {
        $k = intOrDie($_GET['k'], 1, 4);
        $kv = KVADRANTI[$k];

        $q = $db->prepare("DELETE FROM tocke2d WHERE $kv");

        if ($q->execute()) {
            $af = $q->affected_rows;
            echo "Zbrisu $af tock.";
        } else {
            echo "Nism zbrisu";
        }
    }
    ?>
</body>

</html>