<?php
SetPageName("Activate");
$errors = array(0 => "Invalid SN/Username",
1 => "Your account is already activated");
function DisplayForm($error)
{
	global $smarty;
	$smarty->Assign("error",$error);
	DisplayPage($GLOBALS['page']);
}
if(isset($_REQUEST['username']) && isset($_REQUEST['sn']))
{
	$username = $_REQUEST['username'];
	$sn = $_REQUEST['sn'];
	if(ctype_alnum($username) && ctype_alnum($sn))
	{
		$uid = GetUIDFromID($username);
		$user = GetUser($uid);
		if($user['Activated'] != 1)
		{
			if($user['SN'] == $sn)
			{
				ActivateUser($uid);
				DisplayRedirect(5000,$GLOBALS['settings']["site"]['root']."/board/community/news","Your account has been activated you can now login.");
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