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
                <input type="radio" required name="program" value="gim" id="gim">
                Gimnazija
            </span>
            <span>
                <input type="radio" required name="program" value="ss" id="ss">
                Strokovna Sola
            </span>
            <br>
            <input type="submit" value="Vnos">
            <input type="reset" value="Ponastavi">
        </fieldset>
    </form>
    <?php 
    
    function ccap($str) {
        $up = ucfirst($str);
        if ($str != $up) {
            echo " <span style=\"color:red\">($up)</span>";
        }
    }
    
    if (isset($_GET['ime']) && isset($_GET['priimek']) && isset($_GET['program'])) {
        $i = $_GET['ime'];
        $p = $_GET['priimek'];
        $pg = $_GET['program'];
        echo "Ime: $i";
        ccap($i);
        echo "<br>\n";
        echo "Priimek: $p";
        ccap($p);
        echo "<br>\n";
        echo "Program: $pg";
        echo "<br>\n";
    } ?>

</body>

</html>