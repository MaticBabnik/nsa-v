<?php

function findFiles($vaja)
{
    return glob("./vaje/vaja" . $vaja . "/*.php");
}

function reportFile($path)
{
    echo "<h2> $path </h2>";
    $f = fopen($path, "r");
    $code = fread($f, filesize($path));
    fclose($f);

    echo "<pre>" . htmlspecialchars($code) . "</pre>";
}

if (!isset($_GET["vaja"])) {
    echo ("'vaja' param is missing");
    die();
}

$dir = $_GET["vaja"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
</head>

<body>

    <h1>
        Vaja <?php echo $dir; ?>
    </h1>
    <b>Matic Babnik R4A</b>
    <?php
    echo date("d. m. Y");

    foreach (findFiles($dir) as $file) {
        reportFile($file);
    }
    ?>
</body>

</html>