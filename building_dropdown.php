<?php

include('includes/db_con.php');

    $query = '';
    $query = "SELECT id, name FROM building";

    $statement = $connection->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $data = array();
    $filtered_rows = $statement->rowCount();
    $emparray = array();
    foreach ($result as $row) {
        
        $emparray[] = $row;
    }
    echo json_encode($emparray);


?>