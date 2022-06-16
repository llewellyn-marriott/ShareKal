<?php
// set page name
SetPageName("Ranking");
if($sid <= 0 || !ServerExists($sid))
{
	$sid = 1;
}
$smarty->assign('server', GetServer($sid));
$smarty->assign('servers', GetServers());
$smarty->assign('top100', GetTopPlayers(100,1));
$smarty->assign('topknight', GetTopClass(0,1));
$smarty->assign('topmage', GetTopClass(1,1));
$smarty->assign('toparcher', GetTopClass(2,1));

DisplayPage($page);

?>