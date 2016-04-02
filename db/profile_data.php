<?php
include("includes/db_config.php");
session_start();
$response_array['pincode'] = array();
$mobile = $_SESSION["login_userid"];
try{
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $user_name);
   	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $conn->prepare("SELECT pincode from allowable_pincodes");
	$stmt->execute();
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	if($stmt->rowCount() != 0){
		foreach($stmt->fetchAll() as $key=>$value) {
			array_push($response_array['pincode'],$value['pincode']);
		}
	}
    $stmt = $conn->prepare("SELECT * from users where mobile = '$mobile'");
    $stmt->execute();
    if($stmt->rowCount() != 0){
        $response_array['success'] = true;
		foreach ($stmt->fetchAll() as $key => $value) {
			$response_array['name'] =  $value['name'];
			$response_array['email'] =  $value['email'];
			$response_array['password'] =  $value['password'];
			$response_array['dob'] =  $value['dob'];
			$response_array['gender'] =  $value['gender'];
			$response_array['location'] =  $value['location'];
			$response_array['selfie_image'] =  $value['selfie_image'];
			$response_array['passport_image'] =  $value['passport_image'];
			$response_array['promoters'] =  false;
			if( $value['promoters'] == 1){
				$response_array['promoters'] =  true;
			}
			$response_array['hostesses'] =  false;
			if( $value['hostesses'] == 1){
				$response_array['hostesses'] =  true;
			}
			$response_array['emcess'] =  false;
			if( $value['emcess'] == 1){
				$response_array['emcess'] =  true;
			}
			$response_array['pamphlet'] =  false;
			if( $value['pamphlet'] == 1){
				$response_array['pamphlet'] =  true;
			}
			$response_array['models'] =  false;
			if( $value['models'] == 1){
				$response_array['models'] =  true;
			}
			$response_array['models'] =  false;
			if( $value['models'] == 1){
				$response_array['models'] =  true;
			}
			$response_array['models'] =  false;
			if( $value['models'] == 1){
				$response_array['models'] =  true;
			}
			$response_array['othersprof'] =  false;
			if( $value['othersprof'] == 1){
				$response_array['othersprof'] =  true;
			}
			$response_array['english'] =  false;
			if( $value['english'] == 1){
				$response_array['english'] =  true;
			}
			$response_array['hindi'] =  false;
			if( $value['hindi'] == 1){
				$response_array['hindi'] =  true;
			}
			$response_array['kannada'] =  false;
			if( $value['kannada'] == 1){
				$response_array['kannada'] =  true;
			}
			$response_array['tamil'] =  false;
			if( $value['tamil'] == 1){
				$response_array['tamil'] =  true;
			}
			$response_array['malayam'] =  false;
			if( $value['malayam'] == 1){
				$response_array['malayam'] =  true;
			}
			$response_array['others'] =  $value['others'];
		}
    } else {
        $response_array['success'] = false;
    }
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
 }

header("Content-type: application/json");
echo json_encode($response_array);
?>
