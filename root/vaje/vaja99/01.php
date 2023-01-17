<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <pre>

        <?php
        echo __FILE__;

        echo "\n\n";

        $a1 = [1, 2, 3, 'a', '11', '7', 'b', true, false];
        sort($a1);
        $a2 = [1 => true, 2 => true, 3 => true, 'a' => true, '1' => true, true => true, false => true];
        ksort($a2);

        print_r($a1);

        echo "\n\n";
        print_r($a2);


        ?>
        </pre>
</body>

</html>