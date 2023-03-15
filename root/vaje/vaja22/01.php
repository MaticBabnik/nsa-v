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
    <form>
        Stavba ID: <input type="number" name="id" min="0"> <br>
        Naslov: <input type="text" name="naslov" minlength="2" maxlength="30" pattern="[A-ZŽŠČ][a-zA-Z0-9čžšČŠŽ\s]+"> <br>
        Kraj: <input type="text" name="kraj" minlength="2" maxlength="30" pattern="[A-ZŽŠČ][a-zA-ZčžšČŠŽ\s]+"> <br>
        <button>Dodaj</button>
    </form>

    <?php
    require_once "./lib.php";

    if (allset(['id', 'naslov', 'kraj'])) {
        $db = new mysqli('mysql', 'root', 'root', 'geodetskauprava');

        $id = intOrDie($_GET['id'], 0);
        $naslov = matchOrDie($_GET['naslov'], "/^[A-ZŽŠČ][a-zA-Z0-9čžšČŠŽ\s]{0,29}$/");
        $kraj = matchOrDie($_GET['kraj'], "/^[A-ZŽŠČ][a-zA-ZčžšČŠŽ\s]{0,29}+$/");

        $ins = $db->prepare("insert into stavba(StavbaID,Naslov,Kraj) values (?,?,?)");
        $ins->bind_param("iss", $id, $naslov, $kraj);
        $r = $ins->execute();
        if ($r) {
            echo "Zapis dodan";
        }else {
            echo "Zapis NI dodan";
        }
    }
    ?>
</body>

</html>