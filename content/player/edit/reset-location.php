<?php
SetPageName("Reset Location");
if(isset($_REQUEST['pid']) && isset($_REQUEST['sid']))
{
	$pid = $_REQUEST['pid']+0;
	$player = GetPlayer($pid,$sid);
	if($player['UID'] == $current_user['UID'])
	{
		ResetPlayerLocation($pid,$sid);
		DisplayRedirect(3000,$GLOBALS["settings"]["site"]["root"]."/board/player/view?pid=".$pid."&sid=".$sid,"Your location has been reset.");
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