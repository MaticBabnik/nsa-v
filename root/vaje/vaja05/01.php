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
        }

        td {
            border: 1px solid white;
            color: red;
            padding: .25rem;
        }

        .l-a,
        .l-e,
        .l-i,
        .l-o,
        .l-u {
            color: cyan;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <?php
            $t = [];
            for ($i = 0; $i < 10; $i++) {
                $t[] = chr(rand(ord('a'), ord('z')));
            }

            foreach ($t as $el) {
                printf("<td class=\"l-%s\">%s</td>", $el, $el);
            }
            ?>
        </tr>
    </table>
</body>

</html>