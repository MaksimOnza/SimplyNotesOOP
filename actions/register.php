<?php

namespace SimplyNotes;

use function SimplyNotes\db_sqlite\query;
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

$bool = valid_input($login, $password);
$password = password_hash($password, PASSWORD_DEFAULT) ?? '';
$time_stamp = time() ?? '';
$users = query_select("SELECT * FROM user");
if ($bool) {
    $array_name =[];
    foreach ($users as $user) {
        $array_name[] = $user['name'];
    }
    if(!in_array($login, $array_name)) {
        query("INSERT INTO user(name, password, time_stamp) VALUES(?, ?, ?)",
            [1 => $login, $password, $time_stamp]);
        $user = query_select("SELECT * FROM user WHERE name = ?", [1 => $login])[0];
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $login;
        header('Location: /index.php?path=homepage');
        //return render('homepage', ['users'=>$array_name, 'login'=>$login]);
    }
    return render('register', ['users'=>$array_name, 'login'=>$login]);
} else {
    return render($_REQUEST['path']);
}
