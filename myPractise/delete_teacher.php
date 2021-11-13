<?php

header('Content_Type: application/json');
header('Access_Control_Allow_Origin: *');
header('Access-Contro-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Contro-Allow-Methods, Authorization, X-Requested-width');

$data = json_decode(file_get_contents("php://input"), true);
$teacher_id = isset($_GET['tid']) ? $_GET['tid'] : die();

include "config.php";

$sql = "DELETE FROM teachers WHERE id = {$teacher_id}";

if (mysqli_query($conn,$sql)) {
    echo json_encode(array("message"=>"Record Deleted", "status"=>"true"));
} 
else {
    echo json_encode(array("message"=>"Record not Deleted", "status"=>"false"));
}

?>