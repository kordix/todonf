<?php
//if($_SERVER['REQUEST_METHOD'] != 'POST') return;

require_once 'db.php';

$data = json_decode(file_get_contents("php://input"));
$id = $data->id;


$sth = $dbh->prepare("update todos set archived = 'Y' WHERE id=$id");
$sth->execute();
//
// $sth->debugDumpParams();
//
//
// $dbDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//  $dbDB->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
//
//  error_reporting( E_ALL );
//  ini_set( 'display_errors', 1 );




 ?>
