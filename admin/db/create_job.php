<?php
include("../../db/includes/db_config.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$response_array['success'] = true;
    if(validator($_POST)){
        $jobtype  = $_POST['JobType'];
        $ename    = $_POST['EName'];
        $edesc    = $_POST['EDesc'];
        $esms     = $_POST['ESMS'];
        $eattire  = $_POST['EAttire'];
        $epeople  = $_POST['EPeople'];
        $efemale  = $_POST['EFemale'];
        $emale    = $_POST['EMale'];
        $response_array['success']     = true;

    }
}

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user_name);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($response_array['success']){
        switch ($jobtype) {
            case 'Promoter':
                    $stmt = $conn->prepare("SELECT * FROM promoters order by id desc limit 1;");
                    $stmt->execute();
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    if($stmt->rowCount() != 0){
                        $event_id = get_event_id($stmt->fetchAll()[0]['event_id']);
                    } else {
                        $event_id = "prom001";
                    }
                     $sql = "INSERT INTO promoters (event_id, event_name,event_desc,sms_text,attire,no_of_persons_required,no_of_male_required,no_of_female_required,is_over)
                     VALUES ('$event_id','$ename','$edesc', '$esms','$eattire','$epeople','$emale','$efemale',0)";
                        break;
            case 'Emcesss':
                    $stmt = $conn->prepare("SELECT * FROM emcess order by id desc limit 1;");
                    $stmt->execute();
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    if($stmt->rowCount() != 0){
                        $event_id = get_event_id($stmt->fetchAll()[0]['event_id']);
                    } else {
                        $event_id = "emce001";
                    }
                     $sql = "INSERT INTO emcess (event_id, event_name,event_desc,sms_text,attire,no_of_persons_required,no_of_male_required,no_of_female_required,is_over)
                     VALUES ('$event_id','$ename','$edesc', '$esms','$eattire','$epeople','$emale','$efemale',0)";
                    break;

            case 'Hostesses':
                    $stmt = $conn->prepare("SELECT * FROM hostesses order by id desc limit 1;");
                    $stmt->execute();
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    if($stmt->rowCount() != 0){
                        $event_id = get_event_id($stmt->fetchAll()[0]['event_id']);
                    } else {
                        $event_id = "host001";
                    }
                     $sql = "INSERT INTO hostesses (event_id, event_name,event_desc,sms_text,attire,no_of_persons_required,no_of_male_required,no_of_female_required,is_over)
                     VALUES ('$event_id','$ename','$edesc', '$esms','$eattire','$epeople','$emale','$efemale',0)";
                    break;
            case 'Models':
                    $stmt = $conn->prepare("SELECT * FROM models order by id desc limit 1;");
                    $stmt->execute();
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    if($stmt->rowCount() != 0){
                        $event_id = get_event_id($stmt->fetchAll()[0]['event_id']);
                    } else {
                        $event_id = "mode001";
                    }
                     $sql = "INSERT INTO models (event_id, event_name,event_desc,sms_text,attire,no_of_persons_required,no_of_male_required,no_of_female_required,is_over)
                     VALUES ('$event_id','$ename','$edesc', '$esms','$eattire','$epeople','$emale','$efemale',0)";
                    break;
            case 'Pamphlets':
                    $stmt = $conn->prepare("SELECT * FROM pamphlets order by id desc limit 1;");
                    $stmt->execute();
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    if($stmt->rowCount() != 0){
                        $event_id = get_event_id($stmt->fetchAll()[0]['event_id']);
                    } else {
                        $event_id = "pamp001";
                    }
                     $sql = "INSERT INTO pamphlets (event_id, event_name,event_desc,sms_text,attire,no_of_persons_required,no_of_male_required,no_of_female_required,is_over)
                     VALUES ('$event_id','$ename','$edesc', '$esms','$eattire','$epeople','$emale','$efemale',0)";
                    break;
            case 'others':
                    $stmt = $conn->prepare("SELECT * FROM other_profiles order by id desc limit 1;");
                    $stmt->execute();
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    if($stmt->rowCount() != 0){
                        $event_id = get_event_id($stmt->fetchAll()[0]['event_id']);
                    } else {
                        $event_id = "othr001";
                    }
                     $sql = "INSERT INTO other_profiles (event_id, event_name,event_desc,sms_text,attire,no_of_persons_required,no_of_male_required,no_of_female_required,is_over)
                     VALUES ('$event_id','$ename','$edesc', '$esms','$eattire','$epeople','$emale','$efemale',0)";
                    break;
        }
        $conn->exec($sql);
        $response_array['success'] = true;
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
 function get_event_id($value){
     $event_id ="";
     $event_type = substr($value, 0, 4);
      $event_no = intval(substr($value,4, 100)) + 1;
      $no_of_digits =  ceil(log10($event_no));
      if($no_of_digits >= 3){
          $event_id = $event_type . $event_no;
      }
      elseif ($no_of_digits == 2 ) {
         $event_id = $event_type . "0" .$event_no;
     } else {
          $event_id = $event_type . "00" .$event_no;
     }

     return $event_id;
 };
 header("Content-type: application/json");
 echo json_encode($response_array);
?>
