<?php

SetPageName("Post News");
$errors = array(0 => "You must set a main character before making a news post.");

function DisplayForm($error)
{
	global $smarty;
	$smarty->Assign("error",$error);
	$smarty->Assign("icons",GetImageList($GLOBALS['settings']['theme']['root']."/images/post_icons/"));
	DisplayPage($GLOBALS["page"]);
}

	
if(isset($_REQUEST['subject']) && isset($_REQUEST['body'])&& isset($_REQUEST['icon']))
{
	$subject = $_REQUEST['subject'];
	$body = $_REQUEST['body'];
	$icon = $_REQUEST['icon'];
	if(isset($_REQUEST['nid']))
	{
		$nid = $_REQUEST['nid']+0;
	}
	else
	{
		$nid = 0;
	}
	if(MainCharacterSet($current_user['UID']))
	{
		if($nid > 0)
		{
			EditNews($nid,$subject, $body, $current_user['UID'],$icon);
			DisplayRedirect(1000,$GLOBALS["settings"]["site"]["root"]."/board","News post edited successfully.");
		}
		else
		{
			AddNews($subject, $body, $current_user['UID'],$icon);
			DisplayRedirect(1000,$GLOBALS["settings"]["site"]["root"]."/board","News posted successfully.");
		}
	}
	else
	{
		DisplayForm($errors[0]);
	}
}
elseif(isset($_REQUEST['delete']) && isset($_REQUEST['nid']))
{
	$nid = $_REQUEST['nid'];
	if($nid > 0)
	{
		DeleteNews($nid, $current_user['UID']);
		DisplayRedirect(1000,$GLOBALS["settings"]["site"]["root"]."/board","News post deleted successfully.");
	}
	else
	{
		DisplayRedirect(1000,$GLOBALS["settings"]["site"]["root"]."/board","Unable to find post.");
	}
}
else
{
	if(isset($_REQUEST['nid']))
	{
		$nid = $_REQUEST['nid'];
	}
	else
	{
		$nid = 0;
	}
	
	if($nid > 0)
	{
		SetPageName("Edit News");
		$smarty->Assign("post",GetNewsPost($nid));
	}
	else
	{
		SetPageName("Post News");
	}
	DisplayForm("");
}




?>