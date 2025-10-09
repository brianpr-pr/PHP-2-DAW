<?php
include "./databasePDO.php";
$search = $_POST['search'];
$result='';
if(isset($search)){
    $stmt = $connection->prepare("SELECT name FROM task");
    $stmt->execute();

    // set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
/*
Como sacar datos y almacenar en array para convertir en json:
while($stmt->fetchAll()) {
    $result = var_dump($stmt);
}
echo $result;*/

} else{
    echo "It aint";
}