<?php

namespace SimplyNotes;

use function SimplyNotes\db_sqlite\query;

$id = $_SESSION['user_id'];
$time_stamp = $_POST['time_stamp'];
$note = $_POST['note'];
if($note){
    query("INSERT INTO notes(note, id_user, time) VALUES(?, ?, ?)",
        [
            1 => $note, $id, $time_stamp
        ]);
//return render('notes');
}
