<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-control-Allow-Method : POST');
    header('Access-control-Allow-Headers: Access-control-Allow-Headers ,Content-Type ,Access-control-Allow-Method, Authorization, X-Requested-With');

    $data = json_decode(file_get_contents("php://input"),true);

    $name = $data['sname'];
    $age = $data['sage'];
    $city = $data['scity'];

    include "config_db.php";

    $sql = "INSERT INTO students(Student_name ,Age ,City) VALUES('{$name}',{$age},'{$city}')";

    if (mysqli_query($conn,$sql)){
        echo json_encode(array('message' => 'Student Record inserted Successfully','Status' => true));
    }
    else{
        echo json_encode(array('message' => 'Student Record not inserted Successfully','Status' => false));
    }

?>