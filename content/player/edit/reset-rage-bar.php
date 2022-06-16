<?php
SetPageName("Reset Rage Bar");
if(isset($_REQUEST['pid']) && isset($_REQUEST['sid']))
{
	$pid = $_REQUEST['pid']+0;
	$player = GetPlayer($pid,$sid);
	if($player['UID'] == $current_user['UID'])
	{
		ResetPlayerRageBar($pid,$sid);
		DisplayRedirect(3000,$GLOBALS["settings"]["site"]["root"]."/board/player/view?pid=".$pid."&sid=".$sid,"Your rage bar has been reset.");
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