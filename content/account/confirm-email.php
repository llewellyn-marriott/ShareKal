<?php
SetPageName("Confirm Email Change");
$errors = array(0 => "Confirm key is wrong."
					  );
function DisplayForm($error)
{
	global $smarty;
	$smarty->Assign("error",$error);
	DisplayPage($GLOBALS['page']);
}
if(isset($_REQUEST['key']))
{
	$key = $_REQUEST['key'];
	//check if key is valid
	if(ctype_alnum($key))
	{
		//check if key is same as user
		if($key == $current_user['ConfirmEmailKey'])
		{
			ChangeEmail($current_user['UID']);
			DisplayRedirect(2000,$GLOBALS['settings']["site"]['root']."/board/community/news","Your email has been changed.");
		}
		else
		{
			DisplayForm($errors[0]);
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