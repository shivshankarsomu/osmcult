<?php
include("includes/db_config.php");
session_start();
$response_array['pincode'] = array();
$mobile = $_SESSION["login_userid"];
$referral_code_array = array();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$response_array['success'] = true;
	if(validator($_POST)){
		$string = substr(preg_replace('/\s+/', '', $_POST['uName']),0,7);
		for($i = 1; $i <=3;$i++){
			$rand_code = $string . rand(100,999);
			array_push($referral_code_array,$rand_code);
		}
        $name                   	   = $_POST['uName'];
        $email                  	   = $_POST['uEmail'];
        $password               	   = md5($_POST['uPassword']);
        $dob                    	   = $_POST['uDOB'];
        $gender                 	   = $_POST['uGender'];
        $location               	   = $_POST['uLocation'];
        if($_POST['uPromoters'] == 'true' )
            $promoters = 1;
        else
            $promoters = 0;
        if($_POST['uHostesses'] == 'true' )
            $hostesses = 1;
        else
            $hostesses = 0;
        if($_POST['uEmCees'] == 'true' )
            $emcess = 1;
        else
            $emcess = 0;
        if($_POST['uPamphlet'] == 'true' )
            $pamphlet = 1;
        else
            $pamphlet = 0;
        if($_POST['uModels'] == 'true' )
            $model = 1;
        else
            $model = 0;
        if($_POST['uOtherprof'] == 'true' )
            $othersprof = 1;
        else
            $othersprof = 0;
        if($_POST['uOTherprofile'] != 'undefined' )
            $other_profile = $_POST['uOTherprofile'];
        else
            $other_profile = "";
        if($_POST['uEnglish'] == 'true' )
            $english = 1;
        else
            $english = 0;
        if($_POST['uHindi'] == 'true' )
            $hindi = 1;
        else
            $hindi = 0;
        if($_POST['uKannada'] == 'true' )
            $kannada = 1;
        else
            $kannada = 0;
        if($_POST['uTamil'] == 'true' )
            $tamil = 1;
        else
            $tamil = 0;
        if($_POST['uMalayalam'] == 'true' )
            $malayam = 1;
        else
            $malayam = 0;
        if($_POST['uVehicle'] == 'true' )
            $vehicle = 1;
        else
            $vehicle = 0;
        if($_POST['uLaptop'] == 'true' )
            $laptop = 1;
        else
            $laptop = 0;
		$response_array['success']     = true;
	} else
	$response_array['success'] = false;
}
try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user_name);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($response_array['success']){
        $stmt = $conn->prepare("SELECT STR_TO_DATE('$dob','%d/%m/%Y')");
        $stmt->execute();
        $date_of_birth =$stmt->fetchAll()[0][0];
        if($response_array['success']){
	        $response_array['success'] = false;
	        $stmt = $conn->prepare("UPDATE users set name = '$name', email = '$email',password = '$password',dob = '$date_of_birth',gender = '$gender',location = '$location' ,promoters = '$promoters',hostesses ='$hostesses',emcess = '$emcess',pamphlet = '$pamphlet',models = '$model',othersprof = '$othersprof',others = '$other_profile' ,english = '$english', hindi = '$hindi',kannada = '$kannada',tamil = '$tamil',malayam = '$malayam',vehicle = '$vehicle',laptop = '$laptop' where mobile = '$mobile' ");
            $stmt->execute();
            $response_array['success'] = true;
        } else{
            $response_array['success'] = false;
        }
    }else{
        $response_array['success'] = false;
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
