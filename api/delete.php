<?php
include_once '../db.php';

$database = new Database();
$db = $database->getDb();

$data = json_decode(file_get_contents("php://input"));

$imie = $db->escapeString($data->imie);
$nazwisko = $db->escapeString($data->nazwisko);

$db->exec("DELETE FROM people WHERE imie='$imie' AND nazwisko='$nazwisko'");

echo json_encode(array('message' => 'Record Deleted'));
?>
