<?php
if($_SERVER['REQUEST_METHOD'] != 'POST') return;

require_once 'db.php';

// $dbh = null;

$dane = json_decode(file_get_contents('php://input'));

$tabela = $dane->tabela;
$id = $dane->id;

//REPLACE
$query_run = $dbh->prepare("SELECT * FROM $tabela where id = $id");
$query_run->execute();

class dummy {}

$rows = $query_run->fetchAll(PDO::FETCH_CLASS, "dummy");


$results=[];

// foreach ($rows as $row) {
//     foreach (get_object_vars($row) as $key => $value) {
//     $row->$key = (mb_detect_encoding($value, mb_detect_order(), true) === 'UTF-8') 
//             ? $value : iconv('windows-1250', 'utf-8', $value);
//     }
//     $results[] = $row;
// }


echo json_encode($rows[0]);
