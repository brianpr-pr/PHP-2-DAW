<?php
include "./databaseMYSQLI.php";
$search = $_POST['search'];
if(isset($search)){
    $query = "SELECT * FROM task WHERE name lIKE '$search%'";
    $result = mysqli_query($connection,$query);
    if(!$result){
        die("Query Error") . mysqli_error($connection);
    }
    $json = array();
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            'name' => $row['name'],
            'description' => $row['description'],
            'id' => $row['id']
        );
    }
    $jsonString = json_encode($json);
    echo $jsonString;
} else{
    echo "It aint";
}