<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP stuff</title>
    <link rel="stylesheet" href="/assets/unsuck.css">
    <style>
        fieldset {
            width: 400px;
            display: flex;
            flex-direction: column;
        }
    </style>
</head>

<body>
    <form method="get">
        <fieldset>
            <input name="word" type="text" pattern="[a-z]{5,20}" required placeholder="beseda">
            <button>Go</button>
        </fieldset>
    </form>
    <?php
    require_once "./lib.php";

    if (allset(['word'])) {
        $word = matchOrDie($_GET['word'], '/^[a-z]{5,20}$/');
        $w = str_split($word);
        sort($w);
        $nw = join('',$w);
        echo "prva: $nw <br>";
        rsort($w);
        $nw = join('',$w);
        echo "zadnja: $nw";
    }
    ?>
    </table>


</body>

</html>