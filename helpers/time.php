<?php
include("../includes/db_config.php");
date_default_timezone_set("UTC");
try{
    echo date("Y-m-d H:i:s");  
    echo "timestamp" .strtotime('2009-02-15 15:16:17');
    $time = new DateTime('@'.strtotime('2009-02-15 15:16:17'));
     echo $time->format('F j, Y, g:i a');
    // $dt->setTimeZone(new DateTimeZone('Asia/Kolkata'));
    // echo $dt->format('F j, Y, g:i a');

}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
 }


?>
