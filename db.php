<?php
class Database {
    private $db;

    function __construct() {
        $this->db = new SQLite3('my_database.db');
        $this->db->exec("CREATE TABLE IF NOT EXISTS people (id INTEGER PRIMARY KEY, imie TEXT, nazwisko TEXT);");
    }

    function getDb() {
        return $this->db;
    }
}
?>
