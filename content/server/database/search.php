<?php
SetPageName("Search Database");
if($sid <= 0 || !ServerExists($sid))
{
	$sid = 1;
}
if(isset($_REQUEST['query']))
{
	$query = $_REQUEST['query'];
}
else
{
	$query = "";
}
if($query == "Database Search")
{
	$query = "";
}
if(ctype_alnum($query) || $query == "")
{
	$smarty->assign('server', GetServer($sid));
	$smarty->assign('servers', GetServers());
	
	$player_results = SearchPlayers($query,$sid,20);
	$player_results_count = count($player_results);
	$smarty->assign('players',$player_results);
	$smarty->assign('player_results_count',$player_results_count);
	
	$guild_results = SearchGuilds($query,$sid,20);
	$guild_results_count = count($guild_results);
	$smarty->assign('guilds', $guild_results);
	$smarty->assign('guild_results_count', $guild_results_count);
	
	DisplayPage($page);
}
else
{
	DisplayError("Search query must contain alpha numeric characters only.");
}

?>