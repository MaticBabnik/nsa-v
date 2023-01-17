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
    <?php
        require_once "_.php";

        $t = rt(10,100,400);

        echo '<table style="background-color:green;">';
        printRow($t);
        echo "</table>";

        sort($t);


        echo '<table style="background-color:red;">';
        printRow($t);
        echo "</table>";
    ?>
</body>

</html>