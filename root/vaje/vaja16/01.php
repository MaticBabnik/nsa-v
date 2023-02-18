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
    </style>
</head>

<body>
    <?php
    include_once "./banke.php";
    ?>
    <form method="get">
        <fieldset>
            <select name="banka" id="banka" required>
                <option value="" disabled selected>Banka</option>
                <?php
                foreach ($t as $b => $i) {
                    echo "<option value=\"$b\">$b</option>";
                }
                ?>
            </select>
            <input type="number" required placeholder="Leto" name="leto" id="leto" min="2010" max="2023">
            <input type="number" required placeholder="Saldo" name="saldo" id="saldo" min="0">
            <input type="number" required placeholder="Dokapitalizacija" name="dok" id="dok" min="0">
            <input type="number" required placeholder="Zaposleni" name="zap" id="zap" min="1">
            <input type="submit" value="Dodaj">
        </fieldset>
    </form>
    <pre>
<?php
    if (allset(['banka', 'leto', 'saldo', 'dok', 'zap'])) {
        if (isset($t[$_GET['banka']][$_GET['leto']])) {
            echo "Spreminjanje obstojecih podatkov ni mozno";
        } else {
            $t[$_GET['banka']][$_GET['leto']] = [
                'saldo' => intval($_GET['saldo']),
                'dokapitalizacija' => intval($_GET['dok']),
                'zaposleni' => intval($_GET['zap'])
            ];
            print_r($t);
        }
    }

    ?>
</pre>

</body>

</html>