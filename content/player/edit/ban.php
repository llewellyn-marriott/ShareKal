<?php

$errors = array(0 => "Invalid Unban Date");
SetPageName("Ban Player");
function DisplayForm($error)
{
	global $smarty;
	$smarty->Assign("error",$error);
	DisplayPage($GLOBALS["page"]);
}
if(isset($_REQUEST['pid']) && isset($_REQUEST['sid']))
{
	$pid = $_REQUEST['pid'] + 0;
	$player = GetPlayer($pid,$sid);
	$smarty->Assign("player",$player);
	//check if form submited
	if(isset($_REQUEST['Date_Month']) && isset($_REQUEST['Date_Day']) && isset($_REQUEST['Date_Year']) && isset($_REQUEST['reason'])&& isset($_REQUEST['display_reason']))
	{
		$date_year = $_REQUEST['Date_Year']+0;
		$date_month = $_REQUEST['Date_Month']+0;
		$date_day = $_REQUEST['Date_Day']+0;
		if(checkdate($date_month,$date_day,$date_year))
		{
			$unban_date = $date_year."-".$date_month."-".$date_day;
			$reason = htmlspecialchars($_REQUEST['reason'], ENT_QUOTES);
			$display_reason =  htmlspecialchars($_REQUEST['display_reason'], ENT_QUOTES);
			BanUser($player['UID'],$unban_date,$reason,$current_user['UID'],$display_reason);
			DisplayRedirect(5000,$GLOBALS['settings']["site"]['root']."/board/player/view?pid=".$player['PID']."&sid=".$player['Server']['SID'],$player['Name']." has been banned until ".$unban_date);
		}
		else
		{
			//display form
			DisplayForm($errors[0]);
		}
	}
	else
	{
		//display form
		DisplayForm("");
	}
}
else
{
	DisplayPermissionError();
}