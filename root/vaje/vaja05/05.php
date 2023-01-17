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
            margin-bottom: 1rem;
        }

        td {
            border: 1px solid white;
            color: cyan;
            padding: .25rem;
        }

        .smaller {
            color: red;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <?php
            define("N_ELEMENTS", 10);

            $t = [];
            $sum = 0;
            for ($i = 0; $i < N_ELEMENTS; $i++) {
                $n = rand(100, 400);
                $sum += $n;
                $t[] = $n;
            }

            $avg = $sum / N_ELEMENTS;

            foreach ($t as $el) {
                printf("<td class=\"%s\">%s</td>", $el < $avg ? "smaller" : "ok", $el);
            }
            ?>
        </tr>
    </table>

    <table>
        <tr>
            <?php
            foreach ($t as $i=>$el) {
                if ($el < $avg) unset($t[$i]);
            }

            $t = array_values($t);

            foreach ($t as $el) {
                printf("<td class=\"%s\">%s</td>", $el < $avg ? "smaller" : "ok", $el);
            }
            ?>
        </tr>
    </table>
</body>

</html>