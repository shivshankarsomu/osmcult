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
    $stmt = $conn->prepare("SELECT * from jobs inner join users on jobs.userid = users.mobile inner join allowable_pincodes on users.location = allowable_pincodes.pincode where mobile = '$mobile'");
    $stmt->execute();
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    if($stmt->rowCount() != 0){
        $index = 0;
        foreach($stmt->fetchAll() as $index => $job) {
			$each_job = array();
			$each_job['jobid'] = $job['jobid'];
			$each_job['jobname'] = $job['jobname'];
			$each_job['jobtime'] = fetch_job_time($conn,$job['jobid']);
			if($job['is_approved']  == 0)
				$each_job['status'] ="Pending";
			else if($job['is_approved']  == 1)
				$each_job['status'] ="Approved";
			else
				$each_job['status'] ="Rejected";
			array_push($jobs_array,$each_job);
			if($index == 0){
				$place = $job['place'];
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
if ($english == 1) {
	$l1 = "english";
}else {
$l1 ="";
}
if ($kannada == 1) {
	$l2 = "kannada";
}else {
$l2 ="";
}
if ($hindi == 1) {
	$l3 =  "hindi";
}else {
$l3 ="";
}
if ($tamil == 1) {
	$l4 = "tamil";
}else {
$l4 ="";
}
if ($malayam == 1) {
	$l5 = "malayam";
}else {
$l5 ="";
}
if ($vehicle == 1) {
	$veh = "yes";
}else {
$veh ="No";
}
 echo " <div class='row pad-left105'>";
 echo "<div class='col-md-3'><img src='../images/".$selfie_image."'_selfie.jpg'></div>";
 echo "<div class='col-md-5'><img class='img-responsive' width='500' height = '500' src='../images/".$passport_image."'_selfie.jpg'></div>";
 echo " <div class='col-md-4'>";
 echo "<h2 style='margin-top:0'>Profile Det ails</h2>";
 echo "<table>
 	<tr>
 	<td class='text-bold'>Name :</td>
	<td>$name </td>
	</tr>
	<tr>
<td class='text-bold'>Referal Code  :</td>
<td>$referral_code</td>
	</tr>
	<tr>
 	<td class='text-bold'>Mobile :</td>
	<td>$mobile</td>
	</tr>
	<tr>
	<td class='text-bold'>E-mail :</td>
	<td>$email </td>
	</tr>
	<tr>
	<td class='text-bold'>DOB :</td>
	<td>$dob</td>
	</tr>
	<tr>
	<td class='text-bold'>Gender :</td>
	<td>$gender</td>
	</tr>
	<tr>
	<td class='text-bold'>Pincode :</td>
	<td>$location</td>
	</tr>
	<tr>
	<td class='text-bold'>Location :</td>
	<td>$place</td>
	</tr>
	<tr>
	<td class='text-bold'>Language :</td>
	<td> $l1 $l2  $l3  $l4  $l5 </td>
	</tr>
	<tr>
	<td class='text-bold'>Vehicle  :</td>
	<td>$veh</td>
	</tr>
 </th>
 </table>" ;
 echo "</div>";
  echo "</div>";
?>
<div class="row">
<table class="jobs_table" style="margin:110px 0  0 110px;">
	<tr>
		<th class="text-bold col-lg-2 col-xs-12">Job ID</th>
		<th class="text-bold  col-lg-3 col-xs-12">Job Name</th>
		<th class="text-bold  col-lg-4 col-xs-12">Job Date</th>
		<th class="text-bold  col-lg-2 col-xs-12">Status</th>

   <tr>
<?php

foreach ($jobs_array as $key => $job) {
echo "<tr>";
echo "<td>" .$job['jobid']."</a></td>";
echo "<td>" .$job['jobname']."</td>";
echo "<td>".gmdate("F j, Y, g:i a",$job['jobtime'])."</td>";
echo "<td>" .$job['status']."</td>";
echo "</tr>";
}?>
</table>
</div>
<?php
function fetch_job_time($conn,$job_id){
	$job_type = substr($job_id,0,4);
	switch ($job_type) {
		case 'prom':
			  $stmt = $conn->prepare("SELECT * from promoters where event_id = '$job_id'");
			break;
		case 'emce':
			 $stmt = $conn->prepare("SELECT * from emcess where event_id = '$job_id'");
			break;
		case 'host':
			 $stmt = $conn->prepare("SELECT * from hostesses where event_id = '$job_id'");
			break;
		case 'mode':
			 $stmt = $conn->prepare("SELECT * from models where event_id = '$job_id'");
			break;
		case 'pamp':
			 $stmt = $conn->prepare("SELECT * from pamphlets where event_id = '$job_id'");
			break;
		case 'othr':
			 $stmt = $conn->prepare("SELECT * from other_profiles where event_id = '$job_id'");
			break;
	}
	$stmt->execute();
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	if($stmt->rowCount() != 0){
		return $stmt->fetchAll()[0]['event_time'];

	}

}


?>
<?php include("partials/footer.php"); ?>
