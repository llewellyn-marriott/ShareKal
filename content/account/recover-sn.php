<?php
SetPageName("Recover SN");

$errors = array(0 => "You have already got your S/N",1 => "There was an error sending the email.");

function DisplayForm($error)
{
	global $smarty,$page;
	$smarty->Assign("error",$error);
	DisplayPage($GLOBALS['page']);
}
if(!GotSN($current_user['UID']))
{
	$smarty->Assign("GotSN",false);
	if(isset($_POST['confirm']))
	{
		
			$send = SendSNEmail($current_user['UID']);
			SetGotSN($current_user['UID']);
			if($send)
			{
				DisplayRedirect(5000,$GLOBALS['settings']["site"]['root']."/board/community/news","Your S/N has been sent to your email.");
			}
			else
			{
				DisplayForm($errors[1]);
			}
		
	}
	else
	{
		// display form
		DisplayForm("");
	}

}
else
{
	$smarty->Assign("GotSN",true);
	DisplayForm($errors[0]);
}
?>