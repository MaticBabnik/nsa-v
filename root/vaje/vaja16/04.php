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
            <label for="s1"><input type="checkbox" name="sumdok" id="s1">Vsota dok.</label>
            <label for="s2"><input type="checkbox" name="avgzap" id="s2">Povp. zaposleni</label>
            <label for="s3"><input type="checkbox" name="avgsal" id="s3">Povp. saldo</label>
            <input type="submit" value="Izpis">
        </fieldset>
    </form>
    <pre>
<?php
function sumdok($banke)
{
    echo "Dokapitalizacija:\n";
    foreach ($banke as $bn => $bd) {
        echo "\tBanka '$bn':";
        $dok = 0;
        foreach ($bd as $ld) {
            $dok += $ld['dokapitalizacija'];
        }
        echo "\t$dok\n";
    }
    echo "\n";
}

function avgzap($banke)
{
    echo "Povprecno st. zaposlenih:\n";
    foreach ($banke as $bn => $bd) {
        echo "\tBanka '$bn':";
        $z = 0;
        $n = 0;
        foreach ($bd as $ld) {
            $z += $ld['zaposleni'];
            $n++;
        }
        $z /= $n;
        echo "\t$z\n";
    }
    echo "\n";
}

function avgsal($banke)
{
    echo "Povprecni saldo:\n";
    foreach ($banke as $bn => $bd) {
        echo "\tBanka '$bn':";
        $z = 0;
        $n = 0;
        foreach ($bd as $ld) {
            $z += $ld['saldo'];
            $n++;
        }
        $z /= $n;
        echo "\t$z\n";
    }
    echo "\n";
}

if (count($_GET) > 0) {
    if (isset($_GET['sumdok'])) sumdok($t);
    if (isset($_GET['avgzap'])) avgzap($t);
    if (isset($_GET['avgsal'])) avgsal($t);
} else {
    echo "Izberi vsaj 1 opcijo";
}
?>
    </pre>

</body>

</html>