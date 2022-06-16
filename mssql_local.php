<?php
$con = mssql_connect($GLOBALS["settings"]['mssql_local']['host'],$GLOBALS["settings"]['mssql_local']['username'],$GLOBALS["settings"]['mssql_local']['password']);
if(!$con)
{
	die("Unable to connect to MsSQL Database.");
}
$smarty->assign("con",$con);
?>