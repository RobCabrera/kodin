<?php
$email = $_POST['email'];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo '<div class="alert alert-danger" role="alert">Invalid Email Address.</div>';
}else{

	require 'PHPMailer/PHPMailerAutoload.php';

	$filename = $_POST['filename'];
	//$filelocation = $_POST['filelocation'];


	$zip_file_name = "create_own_tos.zip";

	$zip = new ZipArchive();
	$zip->open($zip_file_name, ZipArchive::CREATE);

	$zip->addFile('view/js/impress.js');
	$zip->addFile('view/css/impress-demo.css');
	$zip->addFile('view/css/custom-style.css');
	$zip->addFile('view/README.txt');
	$zip->addFile('view/'.$filename);

	$zip->close();


	$mail = new PHPMailer;

	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com'; 
	$mail->SMTPAuth = plain;                            
	$mail->Username = 'zameermfm@gmail.com';              
	$mail->Password = 'jbadvgdwkyocqxja';                       
	$mail->SMTPSecure = 'tls';                        
	$mail->Port = 587;    

	$mail->From = 'system@agreed.com';
	$mail->FromName = 'system';
	$mail->addAddress($email);     // Add a recipient

	$mail->addAttachment(basename($zip_file_name));    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Your document has arrived.';
	$mail->Body = "Attached, please find the copy of your Own Interactive TOS";
	// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()) {
		echo '<div class="alert alert-danger" role="alert">Message could not be sent.</div>';
		//echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo '<div class="alert alert-success" role="alert">Message has been sent</div>';
	}
}
