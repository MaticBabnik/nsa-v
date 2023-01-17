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
    $x = "00111011";
    $xint = bindec($x);
    echo "x = $x <br>";
    echo "x v base10 = ".$xint."<br>";
    printf("x v base8 = %o <br>",$xint); 
    printf("x v base16 = %x <br>",$xint); 
    ?>
</body>

</html>