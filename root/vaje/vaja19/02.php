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
    $db = new mysqli('mysql', 'root', 'root', 'bazaOseb', 3306);
    ?>
    <form>
        <label for="id">ID</label>
        <input type="number" min="1" name="id" id="id" required>
        <br>
        <label for="ime">Ime</label>
        <!-- ^([A-ZČŽŠ][a-zčžš]{2,9})(\s[A-ZČŽŠ][a-zčžš]{2,9})?$ -->
        <input type="text" name="ime" id="ime" minlength="3" maxlength="10" pattern="([A-ZČŽŠ][a-zčžš]{2,9})(\s[A-ZČŽŠ][a-zčžš]{2,9})?" required>
        <br>
        <label for="priimek">Priimek</label>
        <input type="text" name="priimek" id="priimek" minlength="3" maxlength="20" pattern="([A-ZČŽŠ][a-zčžš]{2,19})(\s[A-ZČŽŠ][a-zčžš]{2,19})?" required>
        <br>
        <label for="datum">Datum rojstva</label>
        <input type="date" name="datum" id="datum" min="1920-01-01" max="<?php echo date("Y-m-d"); ?>" required>
        <br>
        <label for="kraj">Kraj</label>
        <select name="kraj" id="kraj" required>
            <?php
            $kraji = $db->query('SELECT KID,imeKraja FROM kraj ORDER BY imeKraja ASC');
            $kraj = null;

            while ($kraj = $kraji->fetch_assoc()) {
                $id = $kraj['KID'];
                $ime = $kraj['imeKraja'];
                echo "<option value=\"$id\">$ime</option>";
            }
            $kraji->free_result();
            ?>
        </select>
        <br>
        <span>Spol </span>
        <input type="radio" name="spol" id="spolm" value="M" required>
        <label for="spolm">Moski</label>
        <input type="radio" name="spol" id="spolz" value="Z" required>
        <label for="spolz">Ne moski</label>
        <br>
        <label for="mail">Email</label>
        <input type="email" name="mail" id="mail" required>
        <br>
        <label for="opis">Opis</label>
        <textarea name="opis" id="opis" cols="40" rows="3" maxlength="150"></textarea>
        <br>
        <button>Dodaj</button>
    </form>
    <?php
    require_once "./lib.php";

    if (allset(['id', 'ime', 'priimek', 'datum', 'kraj', 'spol', 'mail'])) {
        $id = intOrDie($_GET['id'], 1);
        $ime = matchOrDie($_GET['ime'], '/^([A-ZČŽŠ][a-zčžš]{2,9})(\s[A-ZČŽŠ][a-zčžš]{2,9})?$/');
        if (strlen($ime) > 10) die('Ime predolgo');
        $priimek = matchOrDie($_GET['priimek'], '/^([A-ZČŽŠ][a-zčžš]{2,19})(\s[A-ZČŽŠ][a-zčžš]{2,19})?$/');
        if (strlen($priimek) > 20) die('Priimek predolg');
        $datum = dateStringOrDie($_GET['datum']);
        $kraj = intOrDie($_GET['kraj'], 1000, 9999);
        $spol = matchOrDie($_GET['spol'], '/^(M|Z)$/');
        $mail = matchOrDie($_GET['mail'], '/^\w+([-+.\']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/');
        $opis = null;
        if (isset($_GET['opis']) && $_GET['opis'] != '') {
            $opis = strlenOrDie($_GET['opis'], 1, 150);
        }

        $q = null;
        if (is_null($opis)) {
            $q = $db->prepare('INSERT INTO oseba (id,ime,priimek,rojstvo,KID,spol,email) VALUE (?,?,?,?,?,?,?)');
            $q->bind_param('isssiss', $id, $ime, $priimek, $datum, $kraj, $spol, $mail);
        } else {
            $q = $db->prepare('INSERT INTO oseba VALUE (?,?,?,?,?,?,?,?)');
            $q->bind_param('isssisss', $id, $ime, $priimek, $datum, $kraj, $spol, $mail, $opis);
        }

        if ($q->execute()) {
            echo "Vnos uspesen";
        } else {
            echo "Vnos ni bil uspesen. Preveri, da ID ni podvojen in da je kraj pravilen.";
        }
    }
    ?>
</body>

</html>