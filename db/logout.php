<?php
session_start();
$response_array =  array();
if(isset($_SESSION["login_status"])){
    session_unset();
    session_destroy();
    $response_array['success'] =  true;
}
header("Content-type: application/json");
echo json_encode($response_array);
?>
