<?php
include './conn.php';
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['payment_id']) && isset($data['amount']) && isset($data['apt_id'])) {
    $amt = $data['amount'];
    $payment_id = $data['payment_id'];
    $apt_id = $data['apt_id'];
    $name=$data['name'];
    $test=$data['test'];
    $date=$data['date'];
    $email=$data['email'];
   
    //  echo json_encode(array("pay" => "UPDATE appointments SET payment_id='$payment_id',payment_amount='$amt',payment_status=1 WHERE appointment_id ='$apt_id'"));
    $res = mysqli_query($conn, "UPDATE appointments SET payment_id='$payment_id',payment_amount='$amt',payment_status=1,apt_status='Booked' WHERE appointment_id ='$apt_id'");
    if ($res) {
        include './payment_mailer.php';
        echo json_encode(array("payment" => "complete","email"=>smtp_mailer($to,$subject, $html)));
    } else {
        echo json_encode(array("payment" => "incomplete"));
    }
}
?>
