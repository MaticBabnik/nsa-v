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
    $ime = 'Matic';
    $priimek = 'Babnik';
    echo "Is set ime? ".isset($ime) . "<br/ >";
    unset($ime);
    echo "Is set ime? ".isset($ime) . "<br/ >";
    echo "Is set priimek? ".isset($priimek) . "<br/ >";
    unset($priimek);
    echo "Is set priimek? ".isset($priimek) . "<br/ >";
    ?>

    <h2 style="
            color: red;
            font-size: 20px;">
        <?php echo "Moje ime = $ime"; ?>
    </h2>
    <h2 style="
        color: blue;
        font-size: 30px;">
        <?php echo "Moje priimek = $priimek"; ?>
    </h2>

    <?php
    echo var_dump($ime);
    echo var_dump($priimek);
    ?>
</body>

</html>