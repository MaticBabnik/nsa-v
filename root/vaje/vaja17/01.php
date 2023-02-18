<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP stuff</title>
    <link rel="stylesheet" href="/assets/unsuck.css">
    <style>
        fieldset {
            width: 400px;
            display: flex;
            flex-direction: column;
        }
        td  {
            width: 10px;
            height: 10px;
        }
    </style>
</head>

<body>
    <form method="get">
        <fieldset>
            <input required type="text" name="w" pattern="[01]?\d" placeholder="Width">
            <input required type="text" name="h" pattern="[01]?\d" placeholder="Height">
            <span>
                Osnovna barva
                <input required type="color" name="b">
            </span>
            <span>
                Barva diagonale
                <input required type="color" name="d">
            </span>
            <button>Go</button>
        </fieldset>
    </form>
    <table>
        <?php
        require_once "./lib.php";

        if (allset(['w', 'h', 'b', 'd'])) {
            $w = intOrDie($_GET['w'], 1, 10);
            $h = intOrDie($_GET['h'], 1, 10);
            $b = colorOrDie($_GET['b']);
            $d = colorOrDie($_GET['d']);

            for ($i = 0; $i < $h; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $w; $j++)
                    echo $i == $j ? "<td style=\"background-color: $d\"></td>" : "<td style=\"background-color: $b\"></td>";
                echo "</tr>";
            }
        }

        ?>
    </table>


</body>

</html>