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
    <table class="btab">
        <tr>
            <th colspan=2>Kraji</th>
        </tr>
        <?php
        // 'mysql' je hostname docker containerja k runna bazo 
        $db = new mysqli('mysql', 'root', 'root', 'bazaOseb', 3306);

        $kraji =  $db->query('SELECT KID,imeKraja FROM kraj ORDER BY imeKraja ASC');
        if (!$kraji) die('DB error');
        $kraj = null;

        while ($kraj = $kraji->fetch_assoc()) {
            $id = $kraj['KID'];
            $ime = $kraj['imeKraja'];
            echo "<tr><td>$id</td><td>$ime</td></tr>";
        }
        $db->close();
        ?>
    </table>
</body>

</html>