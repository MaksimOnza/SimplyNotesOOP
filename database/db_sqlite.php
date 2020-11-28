<?php
namespace SimplyNotes\db_sqlite;

function open_db()
{
    return new \SQLite3('database/notes_db.db');
}

function query($query, $bind_values=[]){
    $db = open_db();
    $statemant = $db->prepare($query);
    foreach($bind_values as $key=>$value){
        $statemant->bindValue($key, $value, SQLITE3_TEXT);
    }
    $stmt = $statemant->execute();
    $statemant->close();
    //return $stmt;
}

function query_select($query, $bind_values = [])
{
    $db = open_db();
    $statemant = $db->prepare($query);
    foreach ($bind_values as $key => $value) {
        $statemant->bindValue($key, $value, SQLITE3_TEXT);
    }
    $stmt = $statemant->execute();
    $results = [];
    while ($row = $stmt->fetchArray(1)) {
        $results[] = $row;
    }
    $statemant->close();
    return $results;
}

function create_user()
{
    execute('CREATE TABLE IF NOT EXISTS user (
            id INTEGER PRIMARY KEY,
            name TEXT NOT NULL,
            password TEXT NOT NULL,
            time_stamp INTEGER NOT NUll
            );');
}
function create_list_notes()
{
    execute('CREATE TABLE IF NOT EXISTS notes (
            id integer PRIMARY KEY,
            note TEXT NOT NULL,
            id_user INTEGER NOT NULL,
            time INTEGER NOT NUll
            );');
}