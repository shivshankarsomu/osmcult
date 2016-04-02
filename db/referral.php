<?php
include("includes/db_config.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$response_array['success'] = true;
    $response_array['msg'] = "";
	if(validator($_POST)){
		$received_code            	   = $_POST['uCode'];
		$response_array['success']     = true;
	} else
	$response_array['success'] = false;
}
try{

	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $user_name);
   	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($response_array['success']){
        $response_array['success'] = false;
        $stmt = $conn->prepare("SELECT * from referral_code where code = '$received_code'");
        $stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if($stmt->rowCount() != 0){
            foreach($stmt->fetchAll() as $key=>$value) {
                if($value['is_used'] == 0){
                    $response_array['success'] = true;
                }else{
                    $response_array['msg'] ="Used";
                }

            }
    	}else {
            $response_array['msg'] ="Invalid";
    	    $response_array['success'] = false;
    	}
		include("pincode_fetch.php");
	}
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
 }

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
