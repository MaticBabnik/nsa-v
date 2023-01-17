<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/unsuck.css">
</head>

<body>
    <?php
    function getn($n = 1)
    {
        return pow(2, $n + 1) - 1;
    }

    for ($i = 1; $i<= 10; $i++) {
        $size = 8 + (2*$i);
        $r = getn($i);
        echo "<span style=\"font-size:".$size."px\"> $r </span><br>";
    }
    ?>
</body>

</html>