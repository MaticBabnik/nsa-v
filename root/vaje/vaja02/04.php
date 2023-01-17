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
    <h1>Druga vaja – tretja naloga</h1>
    <p>
        Danes je <span style="color:pink">
            <?php echo date("d. m. Y") ?>
        </span><br>
        Ura je <span style="color:teal">
            <?php echo date("H:i:s") ?>
        </span><br>
        <span style="color:aliceblue">
            Kmalu bo <?php $h = date("H") + 0;
                        if ($h <= 10) echo "malica";
                        elseif ($h <= 15) echo "kosilo";
                        else echo "vecerja"; ?>
        </span>
    </p>

</body>

</html>