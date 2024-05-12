<?php
if($_SERVER['REQUEST_METHOD'] != 'POST') return;

require_once 'db.php';


$dane = json_decode(file_get_contents('php://input'));


class dummy {

}

$where = '';

if(isset($dane->id)){
    @$where = "WHERE ID = $dane->id";
}

//REPLACE
try{
$sth = $dbh->prepare("SELECT * FROM todos $where order by id desc");
}catch(Exception $e){
    echo $e->getMessage();
    return http_response_code(500);
}finally{
    $sth->execute();
    $rows = $sth->fetchAll(PDO::FETCH_CLASS, "dummy");
    echo json_encode($rows);

}



 ?>


