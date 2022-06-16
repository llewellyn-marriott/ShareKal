<?php
// set page name
SetPageName("News");
// get news
$post_count = GetNewsCount();
//check for edit
$smarty->assign("can_edit",HasPagePermission("community/news/post",$current_user['SiteAdmin'],$sid));

$smarty->assign('posts',GetNews(5));
$smarty->assign('top10',GetTopPlayers(10,1));
$smarty->assign('events',GetEvents());
$smarty->assign('event_count',GetEventsCount());

$smarty->assign('post_count',$post_count);

DisplayPage($page);

?>