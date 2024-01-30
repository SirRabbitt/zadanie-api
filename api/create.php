<?php
include_once '../db.php';

$database = new Database();
$db = $database->getDb();

$data = json_decode(file_get_contents("php://input"));

$imie = $db->escapeString($data->imie);
$nazwisko = $db->escapeString($data->nazwisko);

$result = $db->querySingle("SELECT COUNT(*) as count FROM people WHERE imie='$imie' AND nazwisko='$nazwisko'");
if($result == 0) {
    $db->exec("INSERT INTO people (imie, nazwisko) VALUES ('$imie', '$nazwisko')");
    echo json_encode(array('message' => 'Record Created'));
} else {
    echo json_encode(array('message' => 'Record Already Exists'));
}
?>
