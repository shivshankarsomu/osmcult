<?php
include("../includes/db_config.php");
date_default_timezone_set('Asia/Kolkata');
 $response_array['promoters']  = array();
 $response_array['emcess']  = array();
 $response_array['hostesses']  = array();
 $response_array['models']  = array();
 $response_array['other_profiles']  = array();
 $response_array['pamphlets']  = array();
try{
    $current_time = strtotime(date("Y-m-d H:i:s"));
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user_name);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * from emcess where event_time > '$current_time'");
    $stmt->execute();
    if($stmt->rowCount() != 0){
       $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
       foreach ($stmt->fetchAll() as $key => $job) {
           array_push($response_array['emcess'],$job);
       }
    }
    $stmt = $conn->prepare("SELECT * from hostesses where event_time > '$current_time'");
    $stmt->execute();
    if($stmt->rowCount() != 0){
       $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
       foreach ($stmt->fetchAll() as $key => $job) {
           array_push($response_array['hostesses'],$job);
       }
    }
    $stmt = $conn->prepare("SELECT * from models where event_time > '$current_time'");
    $stmt->execute();
    if($stmt->rowCount() != 0){
       $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
       foreach ($stmt->fetchAll() as $key => $job) {
           array_push($response_array['models'],$job);
       }
    }
    $stmt = $conn->prepare("SELECT * from other_profiles where event_time > '$current_time'");
    $stmt->execute();
    if($stmt->rowCount() != 0){
       $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
       foreach ($stmt->fetchAll() as $key => $job) {
           array_push($response_array['other_profiles'],$job);
       }
    }
    $stmt = $conn->prepare("SELECT * from pamphlets where event_time > '$current_time'");
    $stmt->execute();
    if($stmt->rowCount() != 0){
       $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
       foreach ($stmt->fetchAll() as $key => $job) {
           array_push($response_array['pamphlets'],$job);
       }
    }
    $stmt = $conn->prepare("SELECT * from promoters where event_time > '$current_time'");
    $stmt->execute();
    if($stmt->rowCount() != 0){
       $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
       foreach ($stmt->fetchAll() as $key => $job) {
           array_push($response_array['promoters'],$job);
       }
    }
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
 }
 header("Content-type: application/json");
 echo json_encode($response_array);
?>
