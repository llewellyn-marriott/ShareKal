<?php
$con = mssql_connect($GLOBALS["settings"]["mssql"]['host'],$GLOBALS["settings"]['mssql']['username'],$GLOBALS["settings"]['mssql']['password']);
if(!$con)
{
	die("Unable to connect to MsSQL Database.");
}
$smarty->assign("con",$con);
?>