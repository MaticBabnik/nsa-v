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
            border-spacing: 0;
        }
        .y1 td:not(:empty) {
            border-bottom: 1px solid white;
            border-right: 1px solid white;
        }
        
        .y0 td:not(:empty) {
            border-bottom: 1px solid white;
            border-left: 1px solid white;
        }
    </style>
</head>

<body>
    <?php
    $x = rand(3, 9);
    $y = rand(0, 1);

    if ($y) {
    ?>
        <table class="y1">
            <tbody>
                <?php
                for ($n = $x; $n >= 1; $n--) {
                    echo "<tr>";
                    for ($o = 1; $o <= $x; $o++) {
                        if ($n == $o) {
                            echo "<td>$n</td>";
                        } else echo "<td></td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    <?php
    } else {
    ?>
        <table class="y0">
            <tbody>
                <?php
                for ($n = 1; $n <= $x; $n++) {
                    echo "<tr>";
                    for ($o = 1; $o <= $x; $o++) {
                        if ($n == $o) {
                            echo "<td>$n</td>";
                        } else echo "<td></td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

    <?php
    }
    ?>
</body>

</html>