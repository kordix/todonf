<?php
// if($_SERVER['REQUEST_METHOD'] != 'POST') return;


require_once('db.php');

$dane = json_decode(file_get_contents('php://input'));
$tabela = $dane->tabela;
$kolumny = '';
$values = '';

foreach($dane->dane as $key => $value)
{
  $value = addslashes($value);
  $kolumny .= $key;
  $kolumny .= ',';
  $values .= "'".$value."'";
  $values .= ',';

}

$kolumny = substr($kolumny, 0, -1);
$values = substr($values, 0, -1);
$query = "INSERT INTO todos ($kolumny) VALUES  ($values)";
echo $query;
$sth = $dbh->prepare($query);
if ($sth->execute() == false) {
    echo 'error';
}
?>