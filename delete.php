<?php

header('Content-Type: application/json'); //3 party who access this api to teel them that it return data in json format
header('Access-Control-Allow-Origin: *'); //*means all website access this api
header('Access-Contro-Allow-Methods: DELETE');// use api POST method
header('Access-Control-Allow-Hedaers: Access-Control-Allow-Hedaers, Content-Type, 
        Access-Contro-Allow-Methods, Authorization, X-Requested-width');
        //header for security purpose that hackers not added any more headers instead of mention ed headers
        //authorization means like *
        // xrequst means thta to enter data it need value it check that value come through ajax

$data = json_decode(file_get_contents("php://input"), true); 
// it return data in json format
//php:input use what we get data in any fromat it read that data

$student_id = $data['sid'];

include "conn.php";

$sql = "DELETE FROM  students WHERE id = {$student_id}";

if (mysqli_query($conn,$sql)) {
    echo json_encode(array('message'=>'Record Deleted', 'status'=>'true')); // to convert in accociated array for json format  
}
else {
    echo json_encode(array('message'=>'Record not Deleted', 'status'=>'false')); // to convert in accociated array for json format
}

?>