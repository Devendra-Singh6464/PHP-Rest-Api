<?php

header('content-Type: application/json');
header('Access-Controle-Allow-Origin : *');

    include "config_db.php";

    $sql = "SELECT * FROM students";
    $result = mysqli_query($conn, $sql) or die ("sql query failed");

    if(mysqli_num_rows($result) > 0){
        $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
        echo json_encode($output);
    }
    else{

        echo json_encode(array('message' => 'No Record found','Status' => false));
    }
?>