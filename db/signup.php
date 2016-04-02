<?php
include("includes/db_config.php");
$response_array['msg'] ="";
$referral_code_array = array();
$selfie_image = "";
$passport_image = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$response_array['success'] = true;

	if(validator($_POST)){
		$string = substr(preg_replace('/\s+/', '', $_POST['uName']),0,7);
		for($i = 1; $i <=3;$i++){
			$rand_code = $string . rand(100,999);
			array_push($referral_code_array,$rand_code);
		}
        $used_code              	   = $_POST['uCode'];
        $name                   	   = $_POST['uName'];
        $mobile                 	   = $_POST['uMNumber'];
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
        if($_POST['uTerms'] == 'true' )
            $terms = 1;
        else
            $terms = 0;
		$response_array['success']     = true;

		$response_array['success'] = image_upload();
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
		$stmt = $conn->prepare("SELECT name from users where mobile = '$mobile'");
        $stmt->execute();
		if($stmt->rowCount() != 0){
			$response_array['success'] = false;
			$response_array['msg'] = "Mobile number is already registered";
		}
		$stmt = $conn->prepare("SELECT id from users");
        $stmt->execute();
		if($stmt->rowCount() != 0){
			$id = $stmt->fetchAll()[0][0];
			$id++;
		} else {
			$id = 1;
		}
		if($response_array['success']){
	        $response_array['success'] = false;
	        $sql = "INSERT INTO users (id,name, mobile, email,password,dob,gender,selfie_image,passport_image,location,promoters,hostesses,emcess,pamphlet,models,othersprof,others,english,hindi,kannada,tamil,malayam,vehicle,laptop,terms,referred_code_used)
	        VALUES ('$id','$name', '$mobile','$email','$password','$date_of_birth','$gender','$selfie_image','$passport_image','$location','$promoters','$hostesses','$emcess','$pamphlet','$model','$othersprof','$other_profile','$english','$hindi','$kannada','$tamil','$malayam', '$vehicle','$laptop','$terms','$used_code')";
	        $conn->exec($sql);
			$stmt = $conn->prepare("UPDATE referral_code SET is_used = 1,referral_user_id = '$mobile' where code = '$used_code'");
			$stmt->execute();
			$conn->beginTransaction();
			$conn->exec("INSERT INTO referral_code (code, referrer_id)
			VALUES ('$referral_code_array[0]', '$mobile')");
			$conn->exec("INSERT INTO referral_code (code, referrer_id)
			   VALUES ('$referral_code_array[1]', '$mobile')");
			$conn->exec("INSERT INTO referral_code (code, referrer_id)
			   VALUES ('$referral_code_array[2]', '$mobile')");
			$conn->commit();

	        $response_array['success'] = true;
		} else {
			$response_array['success'] = false;
		}
	}else {
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
function image_upload(){
	 	$is_valid = true;
		$uploads_dir = "../images/";
		$orig_selfie = basename($_FILES["uSelfie"]["name"]);
		$orig_pp = basename($_FILES["uPassport"]["name"]);
		if ($_FILES["uSelfie"]["size"] > 500000) {
    		$is_valid = false;
		}
		if($is_valid){
			$selfieFileType = strtolower(pathinfo($orig_selfie,PATHINFO_EXTENSION));
			if($selfieFileType != "jpg" && $selfieFileType != "png" && $selfieFileType != "jpeg" && $selfieFileType != "gif" ) {
		    	$is_valid = false;
			}
		}

		if($is_valid){
			if ($_FILES["uPassport"]["size"] > 500000) {
	    		$is_valid = false;
			}
		}
		if($is_valid){
			$ppFileType = strtolower(pathinfo($orig_pp,PATHINFO_EXTENSION));
			if($ppFileType != "jpg" && $ppFileType != "png" && $ppFileType != "jpeg" && $ppFileType != "gif" ) {
		    	$is_valid = false;
			}
		}
		if($is_valid){
			$selfie_img = $_POST['uMNumber'].'_selfie.'. pathinfo($orig_selfie,PATHINFO_EXTENSION);
			$selfie_tmp_name = $_FILES["uSelfie"]["tmp_name"];
			move_uploaded_file($selfie_tmp_name, "$uploads_dir/$selfie_img");
			$pp_img = $_POST['uMNumber'].'_passport.'. pathinfo($orig_pp,PATHINFO_EXTENSION);
			$pp_tmp_name = $_FILES["uPassport"]["tmp_name"];
			move_uploaded_file($pp_tmp_name, "$uploads_dir/$pp_img");
			 $GLOBALS['selfie_image'] = $selfie_img ;
			 $GLOBALS['passport_image'] = $pp_img ;

		}

		return $is_valid;

}
?>
