<?php 

// VARIABLES FROM FORM
$problem = mysql_real_escape_string($_POST['problem']);
$market = mysql_real_escape_string($_POST['market']);
$team = mysql_real_escape_string($_POST['team']);
$stage = mysql_real_escape_string($_POST['stage']);
$sector = mysql_real_escape_string($_POST['sector']);
$name = mysql_real_escape_string($_POST['name']);
$company = mysql_real_escape_string($_POST['company']);
$email = mysql_real_escape_string($_POST['email']);
$website = mysql_real_escape_string($_POST['website']);
$name = mysql_real_escape_string($_POST['name']);
$other = mysql_real_escape_string($_POST['other']);





// SEND MAIL TO / BCC / FROM

$to_email 	= "communications.2f092b36@creandum2.creandum.podio.com";
$bcc_email 	= "";
$from_email = "contactform@creandum.com";
$from_name 	= $name;




	// SEND EMAIL 

	date_default_timezone_set('Europe/Stockholm');
	require_once('library/mail/class.phpmailer.php');
	//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
	
	$mail             = new PHPMailer();
	
	$body             = " - Why would someone pay for your product / service? ". $problem." 
	 - How big is the market for your product/service? ".$market." 
	 - What makes your team extraordinary? ".$team."
	 - Other : ".$other." 
	 - Website: ".$website." 
	 - E-mail: ".$email;

	$mail->Subject    = $company." #".$stage." #".$sector." #Unsolicited";


	
	$mail->IsSMTP(); // telling the class to use SMTP // SMTP server
	$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
											   // 1 = errors and messages
											   // 2 = messages only
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = 'tls';               // sets the prefix to the servier
	$mail->Host       = "smtp.office365.com";      // sets GMAIL as the SMTP server
	$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
	$mail->Username   = "contactform@creandum.com";  // GMAIL username
	$mail->Password   = "Javu0311!!";            // GMAIL password
	
	$mail->SetFrom($from_email,$from_name);




	$mail->MsgHTML($body);
	
	$address = $to_email;
	$mail->AddAddress($address, $address);
	//$mail->AddBCC($bcc_email);
	
	//$mail->AddAttachment("images/phpmailer.gif");      // attachment
	//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
	
	if(!$mail->Send()) {
	  $mes = "Mail Error: ".$mail->ErrorInfo;
	} else {
	  $mes = "Thank you, we will be in touch shortly!";
	}

	$data['message'] = $mes;

	echo json_encode($data);

?>