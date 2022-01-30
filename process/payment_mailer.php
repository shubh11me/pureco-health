<?php
include('smtp/PHPMailerAutoload.php');

$html='<!DOCTYPE html>
<html>
<body>
<h4>Hello '.$name.', Your appointment for '.$test.' is booked on '.$date.' , Pureco Health Care Services will be in your contact shortly on your registered mobile no.</h4>
<h3>Your appointment ID is:-'.$apt_id.'</h3>
<h6>Thanks,<br>
Regards,<br>
Pureco Heath Care Services.

</body>
</html>
';

?>

<?php
$subject='Appointment is Booked on '.$date;
$to=$email;

function smtp_mailer($to,$subject, $html){
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
	$mail->Body =$html;
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
?>
