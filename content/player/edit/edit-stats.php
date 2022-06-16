<?php
$stats = array(
"Class",
"Specialty",
"Level",
"Contribute",
"Exp",
"Strength",
"Health",
"Intelligence",
"Wisdom",
"Dexterity",
"CurHP",
"CurMP",
"PUPoint",
"SUPoint",
"Killed",
"Map",
"X",
"Y",
"Z",
"Face",
"Hair",
"RevivalId",
"Rage"
);

$errors = array(0 => "Invalid Unban Date");
SetPageName("Edit Player Stats");
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
	$smarty->Assign("stats",$stats);
	//check if form submited
	if(ArrayIsset($stats))
	{
		UpdatePlayerFromForm($player['PID'],$player['Server']['SID'],$stats);
		DisplayRedirect(5000,$GLOBALS['settings']["site"]['root']."/board/player/edit/edit-stats?pid=".$player['PID']."&sid=".$player['Server']['SID'],$player['Name']." has been edited.");
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