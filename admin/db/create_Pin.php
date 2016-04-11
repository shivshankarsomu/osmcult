<?php
include("../../db/includes/db_config.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$response_array['success'] = true;
    if(validator($_POST)){
        $P_code  = $_POST['Pincode'];
        $loca   = $_POST['Location'];
        $response_array['success']     = true;

    }
}

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user_name);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
<h1>ddddddddddddddddddddddddddddddddddddddddddddddddd</h1>
