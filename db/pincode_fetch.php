<?php
$response_array['pincode'] = array();
$stmt = $conn->prepare("SELECT pincode from allowable_pincodes");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
if($stmt->rowCount() != 0){
    foreach($stmt->fetchAll() as $key=>$value) {
        array_push($response_array['pincode'],$value['pincode']);
    }
}
?>
