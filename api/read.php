<?php
include_once '../db.php';

$database = new Database();
$db = $database->getDb();

$result = $db->query('SELECT * FROM people');
$people = [];
while ($row = $result->fetchArray()) {
    array_push($people, ['imie' => $row['imie'], 'nazwisko' => $row['nazwisko']]);
}

echo json_encode($people);
?>
