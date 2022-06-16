<?php
$mtime = microtime(); 
$mtime = explode(" ",$mtime); 
$mtime = $mtime[1] + $mtime[0]; 
$starttime = $mtime; 

include("init.php");
include("sidebar.php");
$SiteAdmin = -1;

if(isset($_SESSION['SiteAdmin']))
{
	$SiteAdmin = $_SESSION['SiteAdmin'];
}

if(isset($_REQUEST['page']))
{
	$page = $_REQUEST['page'];

	if(str_ends_with($page,"/"))
	{
		$page = substr($page,0,strlen($page) -1);
	}
	if(!file_exists("content/".$page.".php"))
	{
		$page = "404";
	}
}
else
{
	$page = "community/news";
}
include("menu.php");

$mtime = microtime(); 
$mtime = explode(" ",$mtime); 
$mtime = $mtime[1] + $mtime[0]; 
$endtime = $mtime; 
$totaltime = ($endtime - $starttime); 
$smarty->assign('gen_time',$totaltime);
$smarty->assign('page', $page);

if(HasPagePermission($page,$current_user['SiteAdmin'],$sid))
{
	include("content/".$page.".php");
}
else
{
	DisplayPermissionError();
}





?>