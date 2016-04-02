<?php
include("../includes/db_config.php");
date_default_timezone_set('Asia/Kolkata');

try{
    $current_time = strtotime(date("Y-m-d H:i:s"));
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user_name);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * from emcess where event_time > '$current_time'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $emcess = $stmt->fetchAll()[0];
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
 }


?>
