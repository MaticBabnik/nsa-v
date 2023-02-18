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
            <input name="word" type="text" pattern="[a-zčžšA-ZČŽŠ]{10,20}" placeholder="beseda" required>
            <span><input type="radio" name="t" value="a" required> Soglasniki</span>
            <span><input type="radio" name="t" value="b" required> Oboje</span>
            <button>Go</button>
        </fieldset>
    </form>
    <?php
    require_once "./lib.php";
    const SAMOGLASNIKI = ['a', 'e', 'i', 'o', 'u'];
    if (allset(['word', 't'])) {
        $word = matchOrDie($_GET['word'], '/^[a-zčžšA-ZČŽŠ]{10,20}$/');
        $t = matchOrDie($_GET['t'], '/^(a|b)$/');
        $chars = str_split(strtolower($word));

        $soglasniki = [];
        $samoglasniki = [];
        foreach ($chars as $c) {
            if (in_array($c, SAMOGLASNIKI)) $samoglasniki[] = $c;
            else $soglasniki[] = $c;
        }

        if ($t == 'a')
            echo (count($chars) == count($soglasniki)) ? "'$word' je veljavna" : "'$word' ni veljavna";
        else
            echo (count($samoglasniki) >= count($soglasniki)) ? "'$word' je veljavna" : "'$word' ni veljavna";
    }
    ?>
    </table>


</body>

</html>