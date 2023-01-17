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
            <input type="text" id="text" maxlength="40" required id="text" name="text">
            <select name="izpis" id="izpis">
                <option value="rgb">barvni</option>
                <option value="cb">crno-bel</option>
            </select>
            <input type="submit">
        </fieldset>
    </form>
    <p>
        <?php
        const barve = ['red', 'lime', 'cyan'];

        function colors($txt)
        {
            $chrs = str_split($txt);
            $out = '';
            $i = 0;
            foreach ($chrs as $c) {
                if ($c == ' ' || $c == "\t" || $c == "\n" || $c == "\r") {
                    $out .= $c;
                } else {
                    $b = barve[$i];
                    $out .= "<span style=\"color: $b\">$c</span>";
                    $i++;
                    $i %= 3;
                }
            }
            return $out;
        }

        if (isset($_GET['text']) && isset($_GET['izpis'])) {
            switch ($_GET['izpis']) {
                case 'cb':
                    echo $_GET['text'];
                    break;
                case 'rgb':
                    echo colors($_GET['text']);
                    break;
            }
        }
        ?>
    </p>

</body>

</html>