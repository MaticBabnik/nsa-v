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
        $x=30;

        echo "<p> pika </p>";
        echo "opis: ".var_dump($x)."<br>";
        echo "<p> vejica </p>";
        echo "opis: ",var_dump($x),"<br>";
        echo "<p> vejica,pika </p>";
        echo "opis: ",var_dump($x)."<br>";
        echo "<p> pika,vejica </p>";
        echo "opis: ".var_dump($x),"<br>";
    ?>
    <hr>
    <i>Z vejico se zapise v pravilnem zaporedju</i>
</body>

</html>