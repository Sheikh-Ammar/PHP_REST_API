<?php

header('Content_Type: application/json');
header('Access_Control_Allow_Origin: *');
header('Access-Contro-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Contro-Allow-Methods, Authorization, X-Requested-width');

$data = json_decode(file_get_contents("php://input"), true);

$teacher_name = $data['tname'];
$teacher_age = $data['tage'];
$teacher_city = $data['tcity'];

include "config.php";

$sql = "INSERT INTO teachers(fullname, age, city) VALUES('{$teacher_name}', {$teacher_age}, '{$teacher_city}')";

if (mysqli_query($conn,$sql)) {
    echo json_encode(array("message"=>"Record inserted", "status"=>"true"));
} 
else {
    echo json_encode(array("message"=>"Record not inserted", "status"=>"false"));
}

?>