<?php
$to = "shivshankar.somu@gmail.com";
$response_array = array();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$response_array['success'] = true;
	if(validator($_POST)){
        $name        = $_POST['uName'];
        $mobile      = $_POST['uMNumber'];
        $from        = $_POST['uEmail'];
        $subject     = $_POST['uSubject'];
        $message     = $_POST['uMessage'];
        $response_array['success']     = true;
    } else
    $response_array['success'] = false;
}
 if($response_array['success']){
     $headers  = 'MIME-Version: 1.0' . "\r\n";
     $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
     $headers = "From: ".$from."\r\n";
     $headers .= "Reply-To: ".$from."\r\n";
     $headers .= "Return-Path: ".$from."\r\n";
     $headers .= "CC: osmcult123@gmail.com\r\n";
     $headers .= "BCC: shivshankar_somu@yahoo.co.in\r\n";
     //mail($to, $subject, $message, $headers);
};


header("Content-type: application/json");
echo json_encode($response_array);

function validator($obj){
	foreach ($obj as $key => $value) {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
		if(!isset($value) || strlen($value) == 0)
			return false;
	}

	return true;
};
?>
