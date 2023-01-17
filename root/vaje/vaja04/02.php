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
    <table border="1px">
        <tbody>

            <?php
            $cnt = 1;
            for ($y = 0; $y < 5; $y++) {
                echo "<tr>";

                for ($x = 0; $x < 5; $x++) {
                    printf("<td>%d</td>", $cnt);
                    $cnt++;
                }
                echo "</tr>";
            }

            ?>
        </tbody>
    </table>
</body>

</html>