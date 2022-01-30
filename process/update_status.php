<?php
include './conn.php';
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['value']) && isset($data['apt_id'])) {
    $value = $data['value'];
    $apt_id = $data['apt_id'];
   $updt_res=mysqli_query($conn,"UPDATE `appointments` SET `apt_status` = '$value' WHERE `appointments`.`appointment_id` = '$apt_id'");
   if ($updt_res) {
    echo json_encode(array("status" =>"true"));
   }
    //  echo json_encode(array("pay" => "UPDATE appointments SET payment_id='$payment_id',payment_amount='$amt',payment_status=1 WHERE appointment_id ='$apt_id'"));
    
}
?>
