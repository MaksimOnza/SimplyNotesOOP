<?php
use function SimplyNotes\db_sqlite\query_select;
use function SimplyNotes\equals_log_pass;
use function SimplyNotes\valid_input;

$login = $_REQUEST['login'] ?? '';
$password = $_REQUEST['password'] ?? '';


if (valid_input($login, $password) and equals_log_pass($login, $password)) {
    $user = query_select("SELECT * FROM user WHERE name = ?", [1 => $login])[0];
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $login;
    header('Location: /index.php?path=homepage');
}else
    return render('login', []);