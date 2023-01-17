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
    <h1>Maticove NSA vaje</h1>
    <ul>
        <?php
        $vaje = glob("vaje/vaja*");
        foreach ($vaje as $vaja) {
            $vajan = explode("/vaja", $vaja)[1];
            echo "<li><h2>Vaja ", $vajan, "<a href=\"genreport.php?vaja=$vajan\">[Report]</a></h2> <ul>";
            $files = glob($vaja . "/[0-9][0-9].php");
            $vn = 1;
            foreach ($files as $file) {
                echo "<li><a href=\"", $file, "\"> Vaja ", $vn, "</a></li>";
                $vn++;
            }
            echo "</ul></li>";
        }
        ?>
    </ul>
</body>

</html>