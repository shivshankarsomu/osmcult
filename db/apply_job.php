<?php
include("includes/db_config.php");
session_start();
$userid = $_SESSION["login_userid"];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$response_array['success'] = true;
	if(validator($_POST)){
        $jobid      = $_POST['jobid'];
		$jobname    = $_POST['jobname'];
        $response_array['success']     = true;
    } else
    $response_array['success'] = false;
}

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user_name);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($response_array['success']){
        $stmt = $conn->prepare("SELECT * from jobs where userid = '$userid' and jobid = '$jobid'");
        $stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if($stmt->rowCount() != 0){
            $response_array['success'] = false;
        }
    }
    if($response_array['success']){
        $sql = "INSERT INTO jobs (userid,jobid,jobname,is_approved) VALUES ('$userid','$jobid','$jobname',0)";
        $conn->exec($sql);
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
