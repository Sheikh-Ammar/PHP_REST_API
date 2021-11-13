<?php

header('Content-Type: application/json'); //3 party who access this api to teel them that it return data in json format
header('Access-Control-Allow-Origin: *'); //*means all website access this api
header('Access-Contro-Allow-Methods: GET');// use api POST method
header('Access-Control-Allow-Hedaers: Access-Control-Allow-Hedaers, Content-Type, 
        Access-Contro-Allow-Methods, Authorization, X-Requested-width');
        //header for security purpose that hackers not added any more headers instead of mention ed headers
        //authorization means like *
        // xrequst means thta to enter data it need value it check that value come through ajax

$data = json_decode(file_get_contents("php://input"), true); 
// it return data in json format
//php:input use what we get data in any fromat it read that data

$student_id = $data['sid']; 
// FOR POST METHOD IN POSTMAN GOTO BODY AND THAN RAW AND WRITE ID INJSON 
//$student_id = isset($_GET['sid']) ? $_GET['sid'] : die();
//FOR GET METHOD PASS ID ON URL LIKE ?sid=2

include "conn.php";

$sql = "SELECT * FROM  students WHERE id = {$student_id}";
$result = mysqli_query($conn,$sql) or die("Fetch Single Query Failed");

if (mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC); // to convert in accociated array for json format
    echo json_encode($output);
}
else {
    echo json_encode(array('message'=>'No Record found', 'status'=>'false')); // to convert in accociated array for json format
}

?>