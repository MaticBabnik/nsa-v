<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP stuff</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 10px;
        }
        td {
            border: 1px solid gray;
        }
    </style>
    <link rel="stylesheet" href="/assets/unsuck.css">
</head>

<body>
    <form method="get">
        <fieldset>
            <input type="number" name="x" id="x" min="1" step="1" max="200" required placeholder="X">
            <br>
            <input type="submit" value="sodi" name="op">
            <input type="submit" value="lihi" name="op">
            <input type="submit" value="vsi" name="op">
        </fieldset>
    </form>
    <table>
        <tr>
            <?php

            if (isset($_GET['x']) && isset($_GET['op'])) {
                $x = intval($_GET['x']);
                $op = ($_GET['op']);

                if ($x < 1 || $x > 200) {
                    echo "Vpisi stevilo iz intervala [1,200]";
                } else {
                    for ($i = 1; $i <= $x; $i++) {
                        if ($op == 'lihi' && $i % 2 == 0) continue;
                        if ($op == 'sodi' && $i % 2 == 1) continue; 

                        if ($x % $i == 0) {
                            echo "<td>$i</td>";
                        } 
                    }
                }
            } ?>
        </tr>

    </table>


</body>

</html>