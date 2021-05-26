<?php




					#Form variables
					$theirName = $_POST['name'];     // This is the name in the form they type
					$theirEmail = $_POST['email'];     // This is the email in the form they type
					$theirPhone = $_POST['telephone'];   // This is the phone in the form they type
					$theirMessage = $_POST['message'];   // This is the message in the form they type


					#Custom Fields variables from Wordpress
					$clubName = $_POST['popSendName']; //The club name
					$clubEmail = $_POST['popSendEmail']; //The email
					$clubAddress = $_POST['popSendAddress']; //The club address
					$clubCity= $_POST['popSendCity']; //The club city
					$clubPhone = $_POST['popSendPhone']; //The club phone


if ($theirName !== '' && $theirEmail !== '' && $theirPhone !== ''){
	if (isset($_POST['cap'])){

		$secret         = '6LcPcG0UAAAAAGPBZ4DVnG1IdF0E_vPRMW3eCS81';
		$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['cap']);
		$responseData   = json_decode($verifyResponse);

		if ($responseData->success){




						# Here we configure the e-mail that gets sent
						$subject = "Information Request";
						$headers  = "From: " . strip_tags('donotreply@domain.com') . "\r\n";
						$headers .= "Reply-To: ". strip_tags('donotreply@domain.com') . "\r\n";
						$headers .= "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";

						$message  = '
						<table width="500" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td>Name:</td>
								<td style="margin-left: 5px;">'.$theirName.'</td>
							</tr>
							<tr>
								<td>Email:</td>
								<td style="margin-left: 5px;">'.$theirEmail.'</td>
							</tr>
							<tr>
								<td>Phone:</td>
								<td style="margin-left: 5px;">'.$theirPhone.'</td>
							</tr>
							<tr>
								<td>Message:</td>
								<td style="margin-left: 5px;">'.$theirMessage.'</td>
							</tr>
						</table>';



						# send actual email here
						mail($clubEmail,$subject,$message,$headers);


											// Enter HTML email autoresponder here
												$finished_msg = '';



				  	mail($theirEmail,$subject,$finished_msg,$headers);

						//This array will get printed to browser console when submitted form
				  	echo $theirName.'|'.$theirEmail.'|'.$theirPhone.'|'.$m.'|'."Success".'|'.$r.'|'.$ea.'|';


  } else {
		echo 'null'.'|'.'null'.'|'.'null'.'|'.'null'.'|'."Error with captcha".'|'.'null'.'|'.'null'.'|';
	}

} else {
	echo 'null'.'|'.'null'.'|'.'null'.'|'.'null'.'|'."Check off reCaptcha".'|'.'null'.'|'.'null'.'|';
}

} else {
	echo $theirName.'|'.$theirEmail.'|'.$theirPhone.'|'."asd".'|'."Fill out all fields!";
}










?>
