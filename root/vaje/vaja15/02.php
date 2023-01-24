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
    <form method="get">
        <fieldset>
            <legend>Vnos podatkov</legend>
            <input type="text" name="ime" id="ime" placeholder="ime" required>
            <br>
            <input type="text" name="priimek" id="priimek" placeholder="priimek" required>
            <br>
            <span>
                <input type="radio" required name="program" value="Gimnazija" id="gim">
                Gimnazija
            </span>
            <span>
                <input type="radio" required name="program" value="Srednja Strokova Sola" id="sss">
                Srednja Strokovna Sola
            </span>
            <span>
                <input type="radio" required name="program" value="Drugo" id="dr">
                Drugo
            </span>
            <br>
            Tuji jeziki:<br>
            <select name="jeziki[]" id="jeziki" multiple required>
                <option value="anglescina">anglescina</option>
                <option value="francoscina">francoscina</option>
                <option value="nemscina">nemscina</option>
                <option value="spanscina">spanscina</option>
                <option value="drugo">drugo</option>
            </select>
            <br>
            Sporti:<br>
            <select name="sporti[]" id="sporti" multiple>
                <option value="atletika">atletika</option>
                <option value="smucanje">smucanje</option>
                <option value="plavanje">plavanje</option>
                <option value="drugo">drugo</option>
            </select>
            <br>
            Priljubljena glasba:<br>
            <select name="glasba[]" id="glasba" multiple>
                <option value="klasika">klasika</option>
                <option value="jazz">jazz</option>
                <option value="pop">pop</option>
                <option value="rok">rok</option>
            </select>
            <br>
            <input type="submit" value="Vnos">
            <input type="reset" value="Ponastavi">
        </fieldset>
    </form>
    <?php

    function php_sucks(&$tvoja_mami)
    {
        $i = 0;
        foreach ($tvoja_mami as $smet) {
            $i++;
        }
        return $i;
    }

    if (
        isset($_GET['ime']) &&
        isset($_GET['priimek']) &&
        isset($_GET['program']) &&
        isset($_GET['jeziki'])
    ) {
        $ime = $_GET['ime'];
        $pri = $_GET['priimek'];
        $pro = $_GET['program'];
        $jez = $_GET['jeziki'];
        $n_jez = php_sucks($jez);

        $sporti = [];
        if (isset($_GET['sporti'])) $sporti = $_GET['sporti'];
        $n_sporti = php_sucks($sporti);

        $glasba = [];
        if (isset($_GET['glasba'])) $glasba = $_GET['glasba'];

        echo "<b>Ime in priimek:</b> $ime $pri";
        echo "<br>";

        echo "<b>Program:</b> $pro";
        echo "<br>";

        echo "<b>Tuji jeziki($n_jez):</b>";
        foreach ($jez as $i) {
            echo " $i";
        }
        echo "<br>";
        echo "<b>Sporti ($n_sporti):</b>";
        foreach ($sporti as $i) {
            echo " $i";
        }
        echo "<br>";
        echo "<b>Glasba:</b>";
        foreach ($glasba as $i) {
            echo " $i";
        }
        echo "<br>";
    }
    ?>

</body>

</html>