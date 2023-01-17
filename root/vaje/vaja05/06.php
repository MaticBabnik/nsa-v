<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP stuff</title>
    <link rel="stylesheet" href="/assets/unsuck.css">
    <style>
        table {
            border-collapse: collapse;
            margin-bottom: 1rem;
        }

        td {
            border: 1px solid white;
            padding: .25rem;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <td>
                <?php
                $t23 = [];
                $cnt = 0;
                $i = 1;
                $n = 0;
                while (1) {
                    $n = rand(1, 1000);
                    if ($n % 23 == 0) {
                        $cnt++;
                        $t23[] = $n;
                        if ($cnt == 10)
                            break;
                    }
                    $i++;
                }
                echo "V $i. poskusu dobljeno stevilo $n<br>";

                foreach ($t23 as $el) {
                    echo "$el ";
                }
                ?>
            </td>
        </tr>
    </table>
</body>

</html>