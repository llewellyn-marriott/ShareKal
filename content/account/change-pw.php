<?php
SetPageName("Change Password");
$errors = array(0 => "S/N is wrong.",
					  1 => "Password is wrong.",
					  2 => "New password is not valid.",
					  3 => "New password does not match."
					  );
function DisplayForm($error)
{
	global $smarty;
	$smarty->Assign("error",$error);
	DisplayPage($GLOBALS['page']);
}
if(isset($_POST['sn']) && isset($_POST['currentpw']) && isset($_POST['newpw']) &&  isset($_POST['newpw2']))
{
	$sn = $_POST['sn'];
	$pw = $_POST['currentpw'];
	$newpw = $_POST['newpw'];
	$newpw2 = $_POST['newpw2'];
	if(ctype_alnum($sn))
	{
		if(ctype_alnum($pw) && $pw == Decode_Password($current_user['PWD']))
		{
			if(ctype_alnum($newpw) && ctype_alnum($newpw2) && strlen($newpw) > 3 && strlen($newpw) <= 8)
			{
				if($newpw == $newpw2)
				{
					ChangePassword($current_user['UID'],$newpw);
					session_destroy();
					DisplayRedirect(5000,$GLOBALS['settings']["site"]['root']."/board/account/login","Your password has been changed, you have been logged out.");
				}
				else
				{
					DisplayForm($errors[3]);
				}
			}
			else
			{
				DisplayForm($errors[2]);
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