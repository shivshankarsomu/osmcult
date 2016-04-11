<?php include("partials/header.php"); ?>
<?php include("partials/nav_bar.php"); ?>
<?php
$jobid = $_SERVER['QUERY_STRING'];
include("../db/includes/db_config.php");
$jobs_profiles = array();
try{
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $user_name);
   	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * from jobs inner join users on jobs.userid = users.mobile where jobid = '$jobid'");
    $stmt->execute();
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    if($stmt->rowCount() != 0){
        foreach($stmt->fetchAll() as $key=>$value) {
            $profile = array();
            $jobname = $value['jobname'];
            $profile['name'] = $value['name'];
            $profile['mobile'] = $value['mobile'];
            $profile['email'] = $value['email'];
            $profile['gender'] = $value['gender'];
					  $profile['location'] = $value['location'];
            $profile['status'] = $value['is_approved'];
						$profile['rating'] = $value['rating'];
            array_push($jobs_profiles,$profile);
        }
	}
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
 }
 ?>
 <table class="jobs_table" style="margin:110px 0  0 110px;">
     <tr>
         <th class="text-bold">Name</th>
         <th class="text-bold">Mobile</th>
         <th class="text-bold">Location</th>
         <th class="text-bold">Gender</th>
				 <th class="text-bold">Ratings</th>
         <th class="text-bold">Status</th>

    <tr>

<?php
foreach ($jobs_profiles as $key => $value) {
 echo "<tr>";
 $url ="<a href='profile_detail.php?". $value['mobile'] ."'>";
 echo "<td>" .$url.$value['name']."</a></td>";
 echo "<td>" .$value['mobile']."</td>";
 echo "<td>".$value['location']."</td>";
 echo "<td>" .$value['gender']."</td>";
 echo "<td>".$value['rating'].  "</td>";
 echo "<td>" .$value['status']."</td>";
 echo "</tr>";
}?>
</table>
<?php include("partials/footer.php"); ?>
