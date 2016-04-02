<?php include("partials/header.php"); ?>
<?php include("partials/nav_bar.php"); ?>
<div style="margin-top:100px"></div>
<?php
$mobile = $_SERVER['QUERY_STRING'];
include("../db/includes/db_config.php");
$jobs_array = array();
try{
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $user_name);
   	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * from jobs inner join users on jobs.userid = users.mobile where mobile = '$mobile'");
    $stmt->execute();
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    if($stmt->rowCount() != 0){
        $index = 0;
        foreach($stmt->fetchAll() as $index => $job) {
			$each_job = array();
			$each_job['jobid'] = $job['jobid'];
			$each_job['jobname'] = $job['jobname'];
			$each_job['is_approved'] = $job['is_approved'];
			array_push($jobs_array,$each_job);
			if($index == 0){
				$name = $job['name'];
				$mobile = $job['mobile'];
				$email = $job['email'];
				$dob = $job['dob'];
				$gender = $job['gender'];
				$selfie_image = $job['selfie_image'];
				$passport_image = $job['passport_image'];
				$location = $job['location'];
				$english =  $job['english'];
				$hindi =  $job['hindi'];
				$kannada =  $job['kannada'];
				$tamil =  $job['tamil'];
				$vehicle =  $job['vehicle'];
				$referral_code =  $job['referred_code_used'];
				$malayam =  $job['malayam'];
				$index++;
			}
        }
	}
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
 }

 print_r($jobs_array);
?>
<?php include("partials/footer.php"); ?>
