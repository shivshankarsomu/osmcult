<?php
include("includes/db_config.php");
date_default_timezone_set('Asia/Kolkata');
session_start();
$response_array['profile_data'] = array();
$response_array['all_jobs']['promoters']  = array();
$response_array['all_jobs']['emcess']  = array();
$response_array['all_jobs']['hostesses']  = array();
$response_array['all_jobs']['models']  = array();
$response_array['all_jobs']['other_profiles']  = array();
$response_array['all_jobs']['pamphlets']  = array();
$response_array['applied_jobs'] = array();
$mobile = $_SESSION["login_userid"];
try{
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $user_name);
   	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * from users where mobile = '$mobile'");
    $stmt->execute();
    if($stmt->rowCount() != 0){
        $response_array['success'] = true;
		foreach ($stmt->fetchAll() as $key => $value) {
			$response_array['profile_data']['name'] =  $value['name'];
			$response_array['profile_data']['email'] =  $value['email'];
			$response_array['profile_data']['password'] =  $value['password'];
			$response_array['profile_data']['dob'] =  $value['dob'];
			$response_array['profile_data']['gender'] =  $value['gender'];
			$response_array['profile_data']['location'] =  $value['location'];
			$response_array['profile_data']['selfie_image'] =  $value['selfie_image'];
			$response_array['profile_data']['passport_image'] =  $value['passport_image'];
			$response_array['profile_data']['promoters'] =  false;
			if( $value['promoters'] == 1){
				$response_array['profile_data']['promoters'] =  true;
			}
			$response_array['profile_data']['hostesses'] =  false;
			if( $value['hostesses'] == 1){
				$response_array['profile_data']['hostesses'] =  true;
			}
			$response_array['profile_data']['emcess'] =  false;
			if( $value['emcess'] == 1){
				$response_array['profile_data']['emcess'] =  true;
			}
			$response_array['profile_data']['pamphlet'] =  false;
			if( $value['pamphlet'] == 1){
				$response_array['profile_data']['pamphlet'] =  true;
			}
			$response_array['profile_data']['models'] =  false;
			if( $value['models'] == 1){
				$response_array['profile_data']['models'] =  true;
			}
			$response_array['profile_data']['models'] =  false;

			$response_array['profile_data']['othersprof'] =  false;
			if( $value['othersprof'] == 1){
				$response_array['profile_data']['othersprof'] =  true;
			}
			$response_array['profile_data']['english'] =  false;
			if( $value['english'] == 1){
				$response_array['profile_data']['english'] =  true;
			}
			$response_array['profile_data']['hindi'] =  false;
			if( $value['hindi'] == 1){
				$response_array['profile_data']['hindi'] =  true;
			}
			$response_array['profile_data']['kannada'] =  false;
			if( $value['kannada'] == 1){
				$response_array['profile_data']['kannada'] =  true;
			}
			$response_array['profile_data']['tamil'] =  false;
			if( $value['tamil'] == 1){
				$response_array['profile_data']['tamil'] =  true;
			}
			$response_array['profile_data']['malayam'] =  false;
			if( $value['malayam'] == 1){
				$response_array['profile_data']['malayam'] =  true;
			}
			$response_array['profile_data']['others'] =  $value['others'];
		}
        if($response_array['success']){
            $current_time = strtotime(date("Y-m-d H:i:s"));
            $stmt = $conn->prepare("SELECT * from emcess where event_time > '$current_time'");
            $stmt->execute();
            if($stmt->rowCount() != 0){
               $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
               foreach ($stmt->fetchAll() as $key => $job) {
                   array_push($response_array['all_jobs']['emcess'],$job);
               }
            }
            $stmt = $conn->prepare("SELECT * from hostesses where event_time > '$current_time'");
            $stmt->execute();
            if($stmt->rowCount() != 0){
               $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
               foreach ($stmt->fetchAll() as $key => $job) {
                   array_push($response_array['all_jobs']['hostesses'],$job);
               }
            }
            $stmt = $conn->prepare("SELECT * from models where event_time > '$current_time'");
            $stmt->execute();
            if($stmt->rowCount() != 0){
               $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
               foreach ($stmt->fetchAll() as $key => $job) {
                   array_push($response_array['all_jobs']['models'],$job);
               }
            }
            $stmt = $conn->prepare("SELECT * from other_profiles where event_time > '$current_time'");
            $stmt->execute();
            if($stmt->rowCount() != 0){
               $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
               foreach ($stmt->fetchAll() as $key => $job) {
                   array_push($response_array['all_jobs']['other_profiles'],$job);
               }
            }
            $stmt = $conn->prepare("SELECT * from pamphlets where event_time > '$current_time'");
            $stmt->execute();
            if($stmt->rowCount() != 0){
               $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
               foreach ($stmt->fetchAll() as $key => $job) {
                   array_push($response_array['all_jobs']['pamphlets'],$job);
               }
            }
            $stmt = $conn->prepare("SELECT * from promoters where event_time > '$current_time'");
            $stmt->execute();
            if($stmt->rowCount() != 0){
               $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
               foreach ($stmt->fetchAll() as $key => $job) {
                   array_push($response_array['all_jobs']['promoters'],$job);
               }
            }
        }
        $stmt = $conn->prepare("SELECT * from jobs where userid = '$mobile'");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if($stmt->rowCount() != 0){
            $response_array['success'] = true;
            foreach($stmt->fetchAll() as $key=>$value) {
                    $job_array = array();
                    $job_array['jobid'] = $value['jobid'];
                    $job_array['jobname'] = $value['jobname'];
                    $job_array['status'] = $value['is_approved'];
                    array_push($response_array['applied_jobs'],$job_array);

            }
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
