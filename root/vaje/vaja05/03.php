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
    <pre>
            <?php
            $t = [];
            $pa = [];
            $pb = [];
            $pc = [];

            for ($i = 0; $i < 30; $i++) {
                $c = chr(rand(ord('A'), ord('Z')));
                $t[] = $c;
                printf("%s ", $c);
            }

            foreach ($t as $index => $char) {
                switch ($char) {
                    case 'A':
                        $pa[] = $index;
                        break;
                    case 'B':
                        $pb[] = $index;
                        break;
                    case 'C':
                        $pc[] = $index;
                }
            }

            function pc($cn, $arr)
            {
                printf("\nmesta %s: %s", $cn, join(" ", $arr));
            }

            pc("A", $pa);
            pc("B", $pb);
            pc("C", $pc);


            ?>
    </pre>
</body>

</html>