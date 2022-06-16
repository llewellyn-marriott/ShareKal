<?php
//errors
$errors = array(
0=>"Cannot find guild");
// set page name
SetPageName("View Guild");

$gid = $_REQUEST['gid'] + 0;
if(GuildExists($gid,$sid))
{
	$guild = GetGuild($gid,$sid);
	$smarty->Assign("guild",$guild);
	$smarty->Assign("players",GetPlayersInGuild($gid,$sid));
	DisplayPage($page);
}
else
{
	//guild doesnt exist
	DisplayError($errors[0]);
}

?>