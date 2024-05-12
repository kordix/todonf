<?php
if($_SERVER['REQUEST_METHOD'] != 'POST') return;


require_once('db.php');

$dane = json_decode(file_get_contents('php://input'));

$login = "'".$dane->login."'";
$password = md5($dane->password);


echo $password;
$query = "INSERT INTO users (login,password) VALUES ($login,'$password')";
echo $query;
$sth = $dbh->prepare($query);
if ($sth->execute() == false) {
    echo 'error';
}
?>