<?php
SetPageName("Reset Guild Join Time");
if(isset($_REQUEST['pid']) && isset($_REQUEST['sid']))
{
	$pid = $_REQUEST['pid']+0;
	$player = GetPlayer($pid,$sid);
	if($player['UID'] == $current_user['UID'])
	{
		ResetPlayerGuildJoinTime($pid,$sid);
		DisplayRedirect(3000,$GLOBALS["settings"]["site"]["root"]."/board/player/view?pid=".$pid."&sid=".$sid,"Your guild join time has been reset.");
	}
	else
	{
		DisplayPermissionError();
	}
}
else
{
	DisplayPermissionError();
}

?>