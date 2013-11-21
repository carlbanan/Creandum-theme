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

$to_email 	= "p.wiehager@gmail.com";
$bcc_email 	= "pontus@guided.se";
$from_email = "pitch@creandum.com";
$from_name 	= "Creandum pitch";




	// SEND EMAIL 

	date_default_timezone_set('Europe/Stockholm');
	require_once('library/mail/class.phpmailer.php');
	//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
	
	$mail             = new PHPMailer();
	
	$body             = $problem."\n".$market."\n".$team."\n".$other."\n".$website."\n".$email;

	$mail->Subject    = $company." #".$stage." #".$sector;


	
	$mail->IsSMTP(); // telling the class to use SMTP
	$mail->Host       = "smtp.gmail.com";	 // SMTP server
	$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
											   // 1 = errors and messages
											   // 2 = messages only
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
	$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
	$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
	$mail->Username   = "pontus@outletsverige.se";  // GMAIL username
	$mail->Password   = "ckr30a/k!!";            // GMAIL password
	
	$mail->SetFrom($from_email,$from_name);




	$mail->MsgHTML($body);
	
	$address = $to_email;
	$mail->AddAddress($address, $address);
	$mail->AddBCC($bcc_email);
	
	//$mail->AddAttachment("images/phpmailer.gif");      // attachment
	//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
	
	if(!$mail->Send()) {
	  $mes = "Mail Error: ".$mail->ErrorInfo;
	} else {
	  $mes = "Tack för pitchten! Vi återkommer.";
	}

	$data['message'] = $mes;

	echo json_encode($data);

?>