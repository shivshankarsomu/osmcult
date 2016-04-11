<?php
include("../../db/includes/db_config.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$response_array['success'] = true;
    if(validator($_POST)){
        $pincode 	 = $_POST['uPincode'];
		$location  	 = $_POST['uLocation'];
        $response_array['success']     = true;
    }
}

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user_name);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($response_array['success']){
		$stmt = $conn->prepare("SELECT * FROM allowable_pincodes where pincode = '$pincode';");
		$stmt->execute();
		if($stmt->rowCount() == 0){
			$sql = "INSERT INTO allowable_pincodes (pincode, place)
			VALUES ('$pincode','$location')";
			$conn->exec($sql);
		} else {
			$response_array['msg']= "Pincode is already present";
			$response_array['success']= false;
		}
    }

}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
 }

 function validator($obj){
 	foreach ($obj as $key => $value) {
         $value = trim($value);
         $value = stripslashes($value);
         $value = htmlspecialchars($value);
 		if(!isset($value) || strlen($value) == 0){
            $response_array['success'] = false;
            return false;
        }
 	}

 	return true;
 };
 header("Content-type: application/json");
 echo json_encode($response_array);
?>
