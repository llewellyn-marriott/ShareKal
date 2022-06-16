<?php
SetPageName("Set Main Character");
if(isset($_REQUEST['pid']) && isset($_REQUEST['sid']))
{
	$pid = $_REQUEST['pid'] + 0;
	$sid = $_REQUEST['sid'] + 0;
	$player = GetPlayer($pid,$sid);
	SetMainCharacter($current_user['UID'],$player['PID'],$player['Server']['SID']);
	DisplayRedirect(5000,$GLOBALS['settings']["site"]['root']."/board/player/view?pid=".$player['PID']."&sid=".$player['Server']['SID'],$player['Name']." has been set as your main character.");
}
else
{
	DisplayPermissionError();
}
?>