<?php

namespace app\misc;

use app\database\DBController;
use app\modules\settings\classes\Session;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'mailer/Exception.php';
require 'mailer/PHPMailer.php';
require 'mailer/SMTP.php';

class Email
{
	public static function send($data, $EmailID, $Subject)
	{
		$sender = 'no-reply@PrayagEdu.com';
		$organisation = 'PrayagEdu';

		$param = array(
			array(":Description", $data),
			array(":EmailID", $EmailID),
			array(":Subject", $Subject),
			array(":SessionID", Session::getCurrentSessionID())
		);

		$query = "INSERT INTO EmailDetails(Description, EmailID, Subject, SessionID) VALUES (:Description,:EmailID,:Subject,:SessionID);";
		//	 <img align="left" alt="'.$organisation.'" height="100" width="100px" src="https://PrayagEdu.in/assets/logo.png" style="height:auto!important;padding-left:14px;outline:none;text-decoration:none;margin:0px;border:0px;" title="'.$organisation.'" class="CToWUd">

		$result = DBController::ExecuteSQL($query, $param);
		if ($result) {

			$html = '<html lang="en">
						<head>
						</head>
						<body>
							<div style="height:100%;width:100%;background-color:#ebebeb;margin:0;padding:0" bgcolor="#ebebeb">
								<center>
									<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" id="m_-2713487906417072868bodyTable" style="height:100%;border-collapse:collapse;width:100%;background-color:#ebebeb;margin:0;padding:0" bgcolor="#ebebeb">
										<tbody>
											<tr>
												<td align="center" valign="top" id="m_-2713487906417072868bodyCell" style="height:100%;width:100%;border-top-width:0;margin:0;padding:10px">
													<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;max-width:600px!important;border:0">
														<tbody>
															<tr>
																<td style="line-height:32px">&nbsp;</td>
															</tr>
															<tr>
																<td valign="top" id="m_-2713487906417072868templatePreheader" style="border-top-color:darkcyan;border-top-style:solid;border-top-width:6px;border-bottom-width:0;padding-top:9px;padding-bottom:9px;background:#ffffff none no-repeat center/cover" bgcolor="#ffffff">
																	<table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
																		<tbody>
																			<tr>
																				<td valign="top" style="padding-top:9px">
																					<table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;border-collapse:collapse" width="100%">
																						<tbody>
																							<tr>
																								<td valign="top" style="text-align:center;word-break:break-word;color:#656565;font-family:Helvetica;font-size:12px;line-height:150%;padding:0px 18px 9px" align="center">
																								</td>
																								<td>
																									<h2 style="font-size: 5em; margin:0">' . $organisation . '</h2>
																								</td>
																							</tr>
																						</tbody>
																					</table>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</td>
															</tr>
															<tr>
																<td valign="top" id="m_-2713487906417072868templateBody" style="border-top-width:0;border-bottom-color:#eaeaea;border-bottom-width:2px;border-bottom-style:none;padding-top:0;padding-bottom:9px;background:#ffffff none no-repeat center/cover" bgcolor="#ffffff">
																	<table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
																		<tbody>
																			<tr>
																				<td valign="top" style="padding-top:9px">
																					<table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;border-collapse:collapse" width="100%">
																						<tbody>
																							<tr>
																								<td valign="top" style="font-family:\'Open Sans\',Helvetica,Arial,sans-serif;font-size:16px;padding:0 32px 9px">
																									' . $data . '
																									<p style="color:#333333;margin:10px 0;padding:0">
																										Thank you,<br>' . $organisation . '
																									</p>
																								</td>
																							</tr>
																						</tbody>
																					</table>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</td>
															</tr>
															<tr>
																<td valign="top" id="m_-2713487906417072868templateFooter" style="border-top-width:0;border-bottom-width:0;padding-top:16px;padding-bottom:16px;background:#f7f7f7 none no-repeat center/cover" bgcolor="#f7f7f7">
																	<table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
																		<tbody>
																			<tr>
																				<td valign="top" style="padding-top:9px">
																					<table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;border-collapse:collapse" width="100%">
																						<tbody>
																							<tr>
																								<td valign="top" style="padding-top:0;padding-bottom:9px;font-size:12px;font-family:\'Open Sans\',Helvetica,Arial,sans-serif;word-break:break-word;color:#656565;line-height:150%;text-align:center" align="center">
																									
																									<em>Copyright © 2020</em>
																									<br>Iewduh Techz Private Limited
																									<br>Shillong 793001,Meghalaya, India
																								</td>
																							</tr>
																						</tbody>
																					</table>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</center>
								<div class="yj6qo"></div>
								<div class="adL"></div>
							</div>
						</body>
					</html>';

			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: <' . $sender . '>' . "\r\n";
			$headers .= 'BCC: care@techz.in' . "\r\n";

			return @mail($EmailID, $Subject, $html, $headers);
		} else {
			return false;
		}
	}

	function sendMail()
	{
		echo "kahkasa";
		$mail = new PHPMailer(true);

		try {
			//Server settings
			$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'tzhomework@gmail.com';                     //SMTP username
			$mail->Password   = '3[HV*vsPa]aT}%W{';                               //SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
			$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

			//Recipients
			$mail->setFrom('tzhomework@gmail.com', 'Mailer');
			$mail->addAddress('dmonpapang@gmail.com', 'Joe User');     //Add a recipient
			// $mail->addAddress('ellen@example.com');               //Name is optional
			// $mail->addReplyTo('info@example.com', 'Information');
			// $mail->addCC('cc@example.com');
			// $mail->addBCC('bcc@example.com');

			//Attachments
			// $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
			// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'Here is the subject';
			$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			$mail->send();
			echo 'Message has been sent';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}
}
