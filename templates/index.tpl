{include file="head.tpl"}

<body onLoad="LoadEvents({$event_count}, '{$settings.site.root}/{$settings.theme.root}/images/events/events.jpg')">

<div id="wrapper">
<div id="header"></div>
	<div id="top-menu">{include file="menu.tpl"}</div>
	<div id="content-wrapper">
		<div id="sidebar">
			{if $current_user.SiteAdmin < 0}
			{include file="sidebar/login.tpl"}
			{/if}
			{if $current_user.SiteAdmin >= 0}
			{include file="sidebar/account.tpl"}
			{/if}
			{include file="sidebar/menu.tpl"}
			{include file="sidebar/server_status.tpl"}
		</div>
		<div id="content"> {$content} </div>
	</div>
	<!-- Do not remove credits, thanks -->
	<div id="footer">Site coded and designed by <a href="mailto:arty@arturasserver.com">Arturas</a><br>
	Page generated in {$gen_time} seconds.<br>
Version <a href="http://www.arturasserver.com/?page=viewproject&prid=3">{$version}</a>
</div>
</div>

</body>
</html>