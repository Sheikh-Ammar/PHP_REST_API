<?php

header('Content_Type: application/json');
header('Access_Control_Allow_Origin: *');
header('Access-Contro-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Contro-Allow-Methods, Authorization, X-Requested-width');


include "config.php";

$sql = "SELECT * FROM teachers";
$result = mysqli_query($conn,$sql) or die("Fetch all Query Failed");

if (mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
} else {
    echo json_encode(array("message"=>"No recoed found", "status"=>"false"));
}

?>