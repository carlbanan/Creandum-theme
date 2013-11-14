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
$reference = mysql_real_escape_string($_POST['reference']);




// SEND MAIL TO / BCC / FROM

$to_email 	= "carl@oystr.se";
$bcc_email 	= "pontus@guided.se";
$from_email = "pitch@creandum.com";
$from_name 	= "Creandum pitch";




	// SEND EMAIL 

	date_default_timezone_set('Europe/Stockholm');
	require_once('library/mail/class.phpmailer.php');
	//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
	
	$mail             = new PHPMailer();
	
	$body             = "<h1>Pitch</h1>
							<table style='padding:30px 0;border:0;vertical-align:top;'>
								<tr>
									<th style='min-width:120px;vertical-align:top;padding:20px 0;text-align:left;'>Problem:</th>
									<td style='min-width:380px;vertical-align:top;padding:20px 0;'>".$problem."</td>
								</tr>
								<tr>
									<th style='vertical-align:top;padding:20px 0;text-align:left;'>Market:</th>
									<td style='vertical-align:top;padding:20px 0;'>".$market."</td>
								</tr>
								<tr>
									<th style='vertical-align:top;padding:20px 0;text-align:left;'>Team:</th>
									<td style='vertical-align:top;padding:20px 0;'>".$team."</td>
								</tr>
								<tr >
									<th style='vertical-align:top;padding:20px 0;text-align:left;'>Stage:</th>
									<td style='vertical-align:top;padding:20px 0;'>".$stage."</td>
								</tr>
								<tr >
									<th style='vertical-align:top;padding:20px 0;text-align:left;'>Sector:</th>
									<td style='vertical-align:top;padding:20px 0;'>".$stage."</td>
								</tr>
								<tr>
									<th style='vertical-align:top;padding:20px 0;text-align:left;'>Name:</th>
									<td style='vertical-align:top;padding:20px 0;'>".$stage."</td>
								</tr>
								<tr>
									<th style='vertical-align:top;padding:20px 0;text-align:left;'>Startup name:</th>
									<td style='vertical-align:top;padding:20px 0;'>".$company."</td>
								</tr>
								<tr >
									<th style='vertical-align:top;padding:20px 0;text-align:left;'>Website:</th>
									<td style='vertical-align:top;padding:20px 0;'>".$website."</td>
								</tr>
								<tr>
									<th style='vertical-align:top;padding:20px 0;text-align:left;'>Email:</th>
									<td style='vertical-align:top;padding:20px 0;'>".$email."</td>
								</tr>
							</table><h3>Skicka från Creandum.com/contact.</h3>";

	
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


	$mail->Subject    = "Pitch from ".$name;

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