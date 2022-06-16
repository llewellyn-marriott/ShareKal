<div class="box3-wrapper">
	<div class="box3-header"> <a href="#">{$page_name}</a> </div>
	<div class="box3-content"> {if $error != ""}
		<div class="error">{$error}</div>
		{/if}
		<form action="{$settings.site.root}/board/server/database/search" method="get">
			<input class="text-field" name="query" type="text" />
			<input type="submit" value="Search" /><br>
{section name=server_select loop=$servers}
			<input type="radio" name="sid" value="{$servers[server_select].SID}">
			{$servers[server_select].Name}<br>
			{/section}
		</form>
	</div>
	<div class="box3-footer">
	</div>
</div>
