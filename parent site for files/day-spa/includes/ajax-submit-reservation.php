<?php
/**
 * Ajax Submit - Reservation Modal
 *
 * @package WP Day Spa
 * @subpackage Include
 */

$service=$_POST['service'];
$guests=$_POST['guests'];
$datetime=$_POST['datetime'];
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];

$servicetype=$_POST['servicetype'];

$youremail=$_POST['ctreservationemail'];
$subject=$_POST['ctreservationsubject'];

$isValidate = true;

if($isValidate == true){
	$to = $youremail;
	$subject = $subject;
	$msg = $service . "\r\n" . $guests . "\r\n" . $datetime . "\r\n" . $servicetype . "\r\n" . $phone . "\r\n" . $message;
	$headers = "From:" . $name ."<" . $email . ">" . "\r\n";
	$headers .= "Reply-To:" . $email . "\r\n";
	//$headers = "Bcc: someone@domain.com" . "\r\n";
	$headers = "X-Mailer: PHP/" . phpversion();
	mail ($to, $subject, $msg, "From: $name <$email>");
	echo "true";
} else {
	echo '{"jsonValidateReturn":'.json_encode($arrayError).'}';
} ?>