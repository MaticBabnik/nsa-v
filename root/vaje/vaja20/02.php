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
    require_once './lib.php';
    $db = new mysqli('mysql', 'root', 'root', 'geometrija', 3306);
    ?>
    <form>
        <label for="id">ID</label>
        <input type="number" min="1" name="id" id="id" required>
        <br>
        <label for="id">Ime barve</label>
        <input type="text" name="ime" id="ime" minlength="3" maxlength="20" pattern="[a-zčžš]+" required>
        <br>
        <button>Dodaj</button>
        <input type="reset">
    </form>
    <?php
    require_once "./lib.php";

    if (allset(['id', 'ime'])) {
        $id = intOrDie($_GET['id'], 1);
        $ime = matchOrDie($_GET['ime'], '/^[a-zčžš]{3,20}$/');

        $q = $db->prepare('INSERT INTO barve VALUE (?,?)');
        $q->bind_param('is', $id, $ime);
        if ($r = $q->execute()) {
            echo "Dodane vrstice: ". $q->affected_rows;
        } else {
            echo "Podvojen ID ali napaka baze";
        }
    }
    ?>
</body>

</html>