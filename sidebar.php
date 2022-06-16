<?php
$smarty->assign('user_links', GetUserLinks($current_user['SiteAdmin']));
$smarty->assign('servers_status', GetServersStatus($current_user['SiteAdmin']));
$smarty->assign('sidebar_menu_links', GetMenuLinks($current_user['SiteAdmin'],true));
?>