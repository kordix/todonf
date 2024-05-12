<?php
//if($_SERVER['REQUEST_METHOD'] != 'POST') return;

require_once('db.php');

//replace
$dane = json_decode(file_get_contents('php://input'));

print_r($dane);

$id = $dane->id;

$kwerenda='';

foreach($dane->dane as $key => $value)
{
  $kwerenda .= $key;
  $kwerenda .= '=';
  $value = addslashes($value);
  $kwerenda .= "'".$value."'";
  $kwerenda .= ',';
}

$kwerenda = substr($kwerenda, 0, -1);
$query = "UPDATE todos SET $kwerenda WHERE id=$id";
echo $query;

$sth = $dbh->prepare($query);

//replace
if($sth->execute() ==false ){
      echo 'nie udało się';
    }
?>



