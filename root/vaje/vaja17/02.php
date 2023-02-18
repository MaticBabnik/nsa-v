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
        table {
            border-collapse: collapse;
        }
        td {
            border: 1px solid white;
        }
    </style>
</head>

<body>
    <form method="get">
        <fieldset>
            <input type="number" required name="min" step="1" min="0" placeholder="od">
            <input type="number" required name="max" step="1" min="1" placeholder="do">
            <input type="number" required name="n" step="1" min="1" placeholder="n">
            <input type="number" required name="d" step="1" min="1" placeholder="deli">
            <button>Go</button>
        </fieldset>
    </form>
        <?php
        require_once "./lib.php";

        if (allset(['min', 'max', 'n', 'd'])) {
            $min = intOrDie($_GET['min'], 1);
            $max = intOrDie($_GET['max'], 1);
            $n = intOrDie($_GET['n'], 0);
            $d = intOrDie($_GET['d'], 0);

            $a = [];
            $b = [];

            for ($i = 0; $i < $n; $i++) {
                $nn = rand($min, $max);
                if ($nn % $d == 0)
                    $a[] = $nn;
                else
                    $b[] = $nn;
            }
            echo "Veckratniki $d";
            pr_t($a);
            echo "ostali";
            pr_t($b);
        }
        ?>
    </table>


</body>

</html>