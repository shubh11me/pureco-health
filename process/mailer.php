<?php
include('smtp/PHPMailerAutoload.php');

$html='<!DOCTYPE html>
<html>
<body>
<h4>Hello '.$sname.', Your appointment is recieved Please complete the payment by clicking the link below.</h4>
<h3>Note:-The Appointment will be not completed until the completion of your payment</h3>
<a href="https://purecohealthcare.com//payment.php?apt_id='.$aptid.'">Click to complete the payment</a>
<h6>Thanks,<br>
Regards,<br>
Pureco Heath Care Services.

</body>
</html>
';

?>

<?php
$subject='Appointment is Processed please complete the payment';
$to=$email;
smtp_mailer($to,$subject, $html);
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->SMTPDebug  = 0;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->CharSet = 'UTF-8';
	$mail->Username = "purecohealth@gmail.com";
	$mail->Password = "shubhaM123*#";
	$mail->SetFrom("purecohealth@gmail.com","Pureco Health Care Services");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->IsHTML(true);
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		// echo $mail->ErrorInfo;
	}else{
		return 'Sent';
	}
}
?>'
