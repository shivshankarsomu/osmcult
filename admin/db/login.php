<?php
include("../../db/includes/db_config.php");
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$response_array['success'] = true;
	if(validator($_POST)){
        $email      = $_POST['uEmail'];
        $password    = $_POST['uPassword'];
        $response_array['success']     = true;
    } else
    $response_array['success'] = false;
}
try{
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $user_name);
   	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($response_array['success']){
        $response_array['success'] = false;
        $stmt = $conn->prepare("SELECT * from admin_users where email = '$email'");
        $stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if($stmt->rowCount() != 0){
            foreach($stmt->fetchAll() as $key=>$value) {
                if($value['password'] == md5($password)){
                    $response_array['success']  = true;
                }else{
                    $response_array['success'] = false;
                }

            }
    	}else {
    	    $response_array['success'] = false;
    	}
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
