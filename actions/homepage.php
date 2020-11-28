<?php

namespace SimplyNotes;

use function SimplyNotes\db_sqlite\query_select;

$user_id = $_SESSION['user_id'];
$login = $_SESSION['user_name'];
$messages = [];

/*if (session_status() != SESSION_ACTIVE) {
    header('Location: /index.php?path=login');
}*/
/*$result = query_select('SELECT name FROM users');
$users = array();
foreach ($result as $user) {
    $users[] = $user['name'];
}*/

$user = query_select("SELECT name FROM user WHERE id = ?", [1 => $login]);

$notes = query_select("SELECT * FROM notes WHERE id_user = ?", [1 => $user_id]);
$array_note =[];
foreach ($notes as $note) {
    $array_name[] = $note;
}

//$notes_content = return render('notes', ['notes' => $notes]);

return render('homepage', ['notes' => $notes]);