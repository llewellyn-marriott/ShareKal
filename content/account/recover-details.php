<?php
require('recaptchalib.php');
SetPageName("Recover Account Details");
// error list
$errors = array(0 => "No account exists with that username and email.",
1 => "Invalid Captcha.",
2 => "Invalid Username.",);


function DisplayForm($error)
{
	global $smarty;
	
	$smarty->Assign("error",$error);
	DisplayPage($GLOBALS['page']);
}
//assign captcha
$smarty->assign('captcha',GetCaptcha());

if(isset($_POST['email']))
{
	
	if($_POST["recaptcha_response_field"])
	{
		$email = $_POST['email'];
		//get captcha response
		$resp = GetCaptchaResponse();
		//check if captcha is valid
		if($resp->is_valid)
		{
			//check if email is valid
			if(!ereg('[^A-Za-z0-9_@.-]', $email) && strstr($email,"@"))
			{
				//check if email exists
				if(EmailExists($email))
				{
					$uid = GetUIDFromEmail($email);
					SendRecoveryEmail($uid);
					DisplayRedirect(5000,"index.php?page=main","An email has been sent with your account details.");
				}
			}
			else
			{
				//email not valid
				DisplayForm($errors[0]);
			}
		}
		else
		{
			//captcah wrong
			DisplayForm($errors[1]);
		}
	}
	else
	{
		// no captcha set
		DisplayForm($errors[1]);
	}
}
else
{
	// display form
	DisplayForm("");
}

?>