<?php

header('Content_Type: application/json');
header('Access_Control_Allow_Origin: *');
header('Access-Contro-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Contro-Allow-Methods, Authorization, X-Requested-width');

$data = json_decode(file_get_contents("php://input"), true);
$teacher_id = $data['tid'];
$teacher_name = $data['tname'];
$teacher_age = $data['tage'];
$teacher_city = $data['tcity'];

include "config.php";

$sql = "UPDATE teachers SET fullname='{$teacher_name}',age={$teacher_age}, city='{$teacher_city}' WHERE id = {$teacher_id}";

if (mysqli_query($conn,$sql)) {
    echo json_encode(array("message"=>"Record updated", "status"=>"true"));
} 
else {
    echo json_encode(array("message"=>"Record not updated", "status"=>"false"));
}

?>