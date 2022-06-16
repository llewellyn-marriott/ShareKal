<?php
//errors
$errors = array(
0=>"Cannot find player",
1=>"You do not have permission to view this player",);
// set page name
SetPageName("View Player");

$pid = $_REQUEST['pid'] + 0;
if(PlayerExists($pid,$sid))
{
	$player = GetPlayer($pid,$sid);
	//check if player is owned by account that is logged in
	$smarty->Assign("player",$player);
	$smarty->Assign("player_links",GetPlayerLinks($pid,$sid));
}
else
{
	//player doesnt exist
	DisplayError($errors[0]);
}


//display
DisplayPage($page);

?>