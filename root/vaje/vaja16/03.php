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

        td,
        th {
            border: 1px gray solid;
            padding: 5px;
        }
    </style>
</head>

<body>
    <?php
    include_once "./banke.php";
    ?>
    <form method="get">
        <fieldset>
            <div>
                <b>Banka</b>
                <input type="radio" name="b" value="a" id="ba" required>
                <label for="ba">narascujoce</label>
                <input type="radio" name="b" value="d" id="bd" required>
                <label for="bd">padajoce</label>
            </div>
            <div>
                <b>saldo</b>
                <input type="radio" name="s" value="a" id="ba" required>
                <label for="sa">narascujoce</label>
                <input type="radio" name="s" value="d" id="bd" required>
                <label for="sd">padajoce</label>
            </div>
            <input type="submit" value="Izpis">
        </fieldset>
    </form>
    <pre>
<?php
const AD2SORT = [
    'a' => 1,
    'd' => -1
];
if (allset(['s', 'b'])) {
    $bs = $_GET['b'];
    $ss = $_GET['s'];

    $bsrt = function ($a, $b) use ($bs) {
        return ($a <=> $b) * AD2SORT[$bs];
    };
    $ssrt = function ($a, $b) use ($ss) {
        return ($a['saldo'] <=> $b['saldo']) * AD2SORT[$ss];
    };

    uksort($t, $bsrt);
    foreach ($t as &$d) {
        uasort($d, $ssrt);
    }
    print_r($t);
}
?>
    </pre>

</body>

</html>