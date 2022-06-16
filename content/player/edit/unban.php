<?php
SetPageName("Unban Player");
if(isset($_REQUEST['pid']) && isset($_REQUEST['sid']))
{
	$pid = $_REQUEST['pid'] + 0;
	$sid = $_REQUEST['sid'] + 0;
	$player = GetPlayer($pid,$sid);
	if(isset($_REQUEST['confirm']))
	{
		UnbanUser($player['UID']);
		DisplayRedirect(5000,$GLOBALS['settings']['site_root']."/board/player/view?pid=".$player['PID']."&sid=".$player['Server']['SID'],$player['Name']." has been unbanned.");
	}
	else
	{
		DisplayPage($page);
	}
}
else
{
	DisplayPermissionError();
}
?>