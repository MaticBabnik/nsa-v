<style>
    table {
        border-collapse: collapse;
    }

    th,
    td {
        padding: 5px;
        border: 1px solid black;
    }

    button:not(:last-of-type) {
        margin-right: 5px;
    }
</style>

<?php
$ms = new mysqli('mysql', 'root', 'root', 'test', 3306);
$mode = '';
$eid = null;
$eun = null;
$eml = null;

if (isset($_GET['delete'])) {
    $mode = 'd';
    $dq = $ms->prepare('DELETE FROM users WHERE id = ?');
    $dq->bind_param('i', intval($_GET['delete']));
    if (!$dq->execute()) die('Failed to delete');
    else ('Deleted user');
    $dq->free_result();
} else if (isset($_GET['edit'])) {

    $sel = $ms->prepare('select id,username,email from users where id = ?');
    $sel->bind_param('i', intval($_GET['edit']));
    $sel->bind_result($eid, $eun, $eml);
    if (!$sel->execute() || !$sel->fetch()) die('User doesnt exist');
    $sel->free_result();

    $mode = 'e';
} else if (isset($_GET['write'])) {
    $id = null;
    $username = null;
    $email = null;
    if (isset($_GET['id']) && is_numeric($_GET['id'])) $id = intval($_GET['id']);
    if (!isset($_GET['username']) || !is_string($_GET['username'])) die('Missing username');
    else $username = $_GET['username'];
    if (isset($_GET['email']) && is_string($_GET['email'])) $email = $_GET['email'];
    $mode = 'w';
    if (is_null($id)) {
        if (is_null($email)) {
            $ins = $ms->prepare('insert into users (username) value ( ? )');
            $ins->bind_param('s', $username);
        } else {
            $ins = $ms->prepare('insert into users (username,email) value ( ? ,? )');
            $ins->bind_param('ss', $username, $email);
        }
        if ($ins->execute()) {
            echo "Added $username <br>";
        }
    } else {
        if (is_null($email)) {
            $ins = $ms->prepare('update users set username = ?, email = null where id= ?');
            $ins->bind_param('si', $username, $id);
        } else {
            $ins = $ms->prepare('update users set username = ? , email = ? where id = ?');
            $ins->bind_param('ssi', $username, $email, $id);
        }
        if ($ins->execute()) {
            echo "Updated $id ($username) <br>";
        }
    }
}
?>


<form method="get">
    <input type="number" name="id" hidden placeholder="Add user" <?php
                                                                    if (is_int($eid)) echo "value=\"$eid\"";
                                                                    ?>>
    Username: <input type="text" name="username" maxlength="32" required pattern="[a-z0-9\_\-]{3,32}" <?php
                                                                                                        if (is_string($eun)) echo "value=\"$eun\"";
                                                                                                        ?>>
    <br>
    Email: <input type="email" name="email" <?php
                                            if (is_string($eml)) echo "value=\"$eml\"";
                                            ?>>
    <br>
    <button type="submit" name="write" value="1">Add/Update</button>
</form>

<form method="get">
    <?php
    $q = $ms->query('SELECT id,username,email FROM users');
    if (!$q) {
        die($ms->error);
    }
    $r = [];
    echo "<table border=1>";
    echo "<tr><th>username</th><th>mail</th><th>actions</th></tr>";
    while ($r = $q->fetch_assoc()) {
        $u = $r['username'];
        $m = '< no email>';
        $id = $r['id'];
        if ($r['email']) $m = $r['email'];
        echo "<tr>"
            . "<td>$u</td>"
            . "<td>$m</td>"
            . "<td><button type=\"submit\" name=\"edit\" value=\"$id\">edit</button>"
            . "<button type=\"submit\" name=\"delete\" value=\"$id\">delete</button>"
            . "</td></tr>";
    }
    $q->free_result();
    echo "</table>";
    ?>
</form>




<?php
$ms->close();
?>