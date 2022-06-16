<?php
error_reporting(E_ALL);
//made by Llewellyn Marriott (Arturas)
$close_site = false;
if(isset($_REQUEST['devmode']))
{
	$close_site = false;
}

if($close_site)
{
	die("Site temporarily offline for maintenance.");
}
session_name("sharekal");
session_start();
include("bbcode.php");
include("settings.php");
include("functions.php");
include('Smarty.class.php');

// create smarty engine

$smarty = new Smarty();
$smarty->caching = false;


//mssql

if( $_SERVER['SERVER_NAME'] == "localhost")
{
	include("mssql_local.php");
}
else
{
	include("mssql.php");
}

//version
$version = "2.38";
if(isset($_REQUEST['version']))
{
	echo $version;
}

SelectWebsiteDB();

if(isset($_SESSION['uid']))
{
	$uid = $_SESSION['uid'];
	if($uid > 0)
	{
		$current_user = GetUser($uid);
		$current_user['Players'] = GetPlayers($uid);
	}
	else
	{
		$current_user = array("SiteAdmin" => -1,"UID" => 0);
	}
}
else
{
	$current_user = array("SiteAdmin" => -1,"UID" => 0);
}

if(isset($_REQUEST['sid']))
{
	$sid = $_REQUEST['sid'] + 0;
}
else
{
	$sid = 1;
}

$smarty->assign('current_user', $current_user);
$smarty->assign('version', $version);
$smarty->assign('url', "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]);
$smarty->assign('request', $_REQUEST);
$smarty->assign('session', $_SESSION);
$smarty->assign('sid', $sid);
$smarty->assign('settings', $GLOBALS["settings"]);




?>
