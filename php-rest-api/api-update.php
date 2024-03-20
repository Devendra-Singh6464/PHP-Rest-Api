<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-control-Allow-Method : PUT');
    header('Access-control-Allow-Headers: Access-control-Allow-Headers ,Content-Type ,Access-control-Allow-Method, Authorization, X-Requested-With');

    $data = json_decode(file_get_contents("php://input"),true);

    $id = $data['sid'];
    $name = $data['sname'];
    $age = $data['sage'];
    $city = $data['scity'];

    include "config_db.php";

    $sql = "UPDATE students SET Student_name = '{$name}',Age={$age}, City='{$city}' WHERE id={$id}";

    if (mysqli_query($conn,$sql)){
        echo json_encode(array('message' => 'Student Record update Successfully','Status' => true));
    }
    else{
        echo json_encode(array('message' => 'Student Record not update Successfully','Status' => false));
    }

?>