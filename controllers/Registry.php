<?php

use function SimplyNotes\db_sqlite\query;
use function SimplyNotes\db_sqlite\query_select;

class Registry{

    function  __construct($user){
        $this->user = $user;
    }

    public function ifExists(){
        $users = query_select("SELECT * FROM user");
        foreach ($users as $user) {
            $array_name[] = $user['name'];
        }
        if(!in_array($user->name, $array_name)) {
            query("INSERT INTO user(name, password, time_stamp) VALUES(?, ?, ?)",
                [1 => $login, $password, $time_stamp]);
            return false;
        }
        return true;
    }

}

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

public function ifExists($login){
    $users = query_select("SELECT * FROM user");
    foreach ($users as $user) {
        $array_name[] = $user['name'];
    }
    if(!in_array($login, $array_name)) {
        query("INSERT INTO user(name, password, time_stamp) VALUES(?, ?, ?)",
            [1 => $login, $password, $time_stamp]);
        return false;
    }
    return true;
}


$password = password_hash($password, PASSWORD_DEFAULT) ?? '';
$time_stamp = time() ?? '';
$newUser = new User($login, $password);

if (valid_input($login, $password)) {
    if (!ifExists($login)) {
        query("INSERT INTO user(name, password, time_stamp) VALUES(?, ?, ?)",
            [1 => $login, $password, $time_stamp]);
        $user = query_select("SELECT * FROM user WHERE name = ?", [1 => $login])[0];
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $login;
        header('Location: /index.php?path=homepage');
    }
    return render('register', ['users' => $array_name, 'login' => $login]);
} else {
    return render($_REQUEST['path']);
}
