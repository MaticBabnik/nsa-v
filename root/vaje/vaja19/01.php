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
        <label for="kid">Postna st.</label>
        <input type="number" min="1000" max="9999" name="kid" id="kid" required>
        <br>
        <label for="kime">Ime kraja</label>
        <input type="text" name="kime" id="kime" minlength="3" maxlength="20" required>
        <br>
        <button>Dodaj</button>
    </form>
    <?php
    require_once "./lib.php";

    if (allset(['kid', 'kime'])) {
        $kid = intOrDie($_GET['kid'], 1000, 9999);
        $kime = matchOrDie($_GET['kime'], '/^[\wčšžČŠŽ\s_\-]{3,20}$/i');
        $db = new mysqli('mysql', 'root', 'root', 'bazaOseb', 3306);

        $q = $db->prepare('INSERT INTO kraj VALUE (?,?)');
        $q->bind_param('is', $kid, $kime);
        if ($q->execute()) echo "Dodajanje uspelo"; else echo "Dodajanje ni uspelo";
        $db->close();
    }
    ?>
</body>

</html>