<?php
SetPageName("Change Email");
$errors = array(0 => "S/N is wrong.",
					  1 => "Email is invalid.",
					  2 => "This email is already associated with another account."
					  );
function DisplayForm($error)
{
	global $smarty;
	$smarty->Assign("error",$error);
	DisplayPage($GLOBALS['page']);
}
if(isset($_POST['sn']) && isset($_POST['email']))
{
	$sn = $_POST['sn'];
	$email = $_POST['email'];
	//check if sn is valid
	if(ctype_alnum($sn))
	{
		//check if email is valid
		if(!ereg('[^A-Za-z0-9_@.-]', $email) && strstr($email,"@"))
		{
			//check if correct sn
			if($sn == $current_user['SN'])
			{
				//check that no one else is already using the email
				if(!EmailExists($email))
				{
					//send confirm email
					SendConfirmEmail($current_user['UID'],$email);
					DisplayRedirect(5000,$GLOBALS['settings']["site"]['root']."/board/community/news","A confirmation email has been sent, please check your email.");
				}
				else
				{
					DisplayForm($errors[1]);
				}
			}
			else
			{
				DisplayForm($errors[0]);
			}
		}
		else
		{
			DisplayForm($errors[1]);
		}
	}
	else
	{
		DisplayForm($errors[0]);
	}
}
else
{
	DisplayForm("");
}
?>