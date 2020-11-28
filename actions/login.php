<?php

namespace SimplyNotes;

use function SimplyNotes\db_sqlite\query_select;

$login = $_REQUEST['login'] ?? '';
$password = $_REQUEST['password'] ?? '';


function match_input($input, $min, $max)
{
    if (!preg_match('/^([A-Za-z\d\-]|_(?!_)){' . $min . ',' . $max . '}$/', $input))
        return false;
    return true;
}

function valid_input($login, $password)
{
    if (empty($login) or empty($password)) {
        return false;
    }
    if (!match_input($password, 4, 50) or !match_input($login, 3, 10)) {
        return false;
    }
    return true;
}

function equals_log_pass($login, $password){
    $user = query_select("SELECT name, password FROM user WHERE name = ?", [1 => $login])[0];
    if($login == $user['name'] and password_verify($password, $user['password']))
        return true;
    return false;
}

if (valid_input($login, $password) and equals_log_pass($login, $password)) {
    $user = query_select("SELECT * FROM user WHERE name = ?", [1 => $login])[0];
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $login;
    header('Location: /index.php?path=homepage');
}else
    return render('login', []);