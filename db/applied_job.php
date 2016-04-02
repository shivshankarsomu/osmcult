<?php
include("includes/db_config.php");
session_start();
$response_array['jobs'] = array();
$userid = $_SESSION["login_userid"];
try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user_name);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * from jobs where userid = '$userid'");
        $stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if($stmt->rowCount() != 0){
            $response_array['success'] = true;
            foreach($stmt->fetchAll() as $key=>$value) {
                    $job_array = array();
                    $job_array['jobid'] = $value['jobid'];
                    $job_array['jobname'] = $value['jobname'];
                    $job_array['status'] = $value['is_approved'];
                    array_push($response_array['jobs'],$job_array);

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
