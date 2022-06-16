<div class="box3-wrapper">
	<div class="box3-header"> <a href="#">{$page_name} - {$server.Name}</a> </div>
	<div class="box3-content"> <strong>Server:</strong><br />
		{section name=server_select loop=$servers} <a class="button" href="{$settings.site.root}/board/server/ranking?sid={$servers[server_select].SID}">{$servers[server_select].Name}</a> {/section}
		<div class="top-classes">
			<div class="top-class"><img src="{$settings.site.root}/{$settings.theme.root}/images/knight_med.jpg" /><br />
				<strong><a href="{$settings.site.root}/board/player/view?pid={$topknight.PID}&sid={$topknight.Server.SID}">{$topknight.Name}</a></strong></div>
			<div class="top-class"><img src="{$settings.site.root}/{$settings.theme.root}/images/mage_med.jpg" /><br />
				<strong><a href="{$settings.site.root}/board/player/view?pid={$toparcher.PID}&sid={$toparcher.Server.SID}">{$topmage.Name|default:None}</a></strong></div>
			<div class="top-class"><img src="{$settings.site.root}/{$settings.theme.root}/images/archer_med.jpg" /><br />
				<strong><a href="{$settings.site.root}/board/player/view?pid={$topmage.PID}&sid={$topmage.Server.SID}">{$toparcher.Name}</a></strong></div>
		</div>
		<table class="list-table" cellpadding="0" cellspacing="0">
			<tr class="heading">
				<td><strong>Rank</strong></td>
				<td><strong>Name</strong></td>
				<td><strong>Level</strong></td>
				<td><strong>Job</strong></td>
				<td><strong>Guild</strong></td>
			</tr>
			{section name=top loop=$top100}
			<tr bgcolor="{cycle values="#E0E0E0,#EAEAEA"}">
				<td>{$top100[top].Rank}</td>
				<td><a href="{$settings.site.root}/board/player/view?pid={$top100[top].PID}&sid={$top100[top].Server.SID}">{$top100[top].Name}</a></td>
				<td>{$top100[top].Level}</td>
				<td><img src="{$settings.site.root}/{$settings.theme.root}/images/{$top100[top].ClassName}_icon_small.png" /> {$top100[top].SpecialtyName}</td>
				<td>{$top100[top].Guild.Name}</td>
			</tr>
			{/section}
		</table>
	</div>
	<div class="box3-footer">
	</div>
</div>
