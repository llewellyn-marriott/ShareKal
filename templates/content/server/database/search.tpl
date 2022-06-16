<div class="box3-wrapper">
	<div class="box3-header"> <a href="#">{$page_name}</a> </div>
	<div class="box3-content"> {section name=server_select loop=$servers} <a class="button" href="{$settings.site.root}/board/server/database/search?sid={$servers[server_select].SID}&query={$request.query}">{$servers[server_select].Name}</a> {/section}
		<h3>Players</h3>
		<em>{$player_results_count} results (Max 20)</em><br />
		<br />
		<table class="list-table" cellpadding="0" cellspacing="0">
			<tr class="heading">
				<td><strong>Name</strong></td>
				<td><strong>Level</strong></td>
				<td><strong>Job</strong></td>
				<td><strong>Guild</strong></td>
			</tr>
			{section name=results loop=$players}
			<tr bgcolor="{cycle values="#E0E0E0,#EAEAEA"}">
				<td><a href="{$settings.site.root}/board/player/view?pid={$players[results].PID}&sid={$players[results].Server.SID}">{$players[results].Name}</a></td>
				<td>{$players[results].Level}</td>
				<td><img src="{$settings.site.root}/{$settings.theme.root}/images/{$players[results].ClassName}_icon_small.png" /> {$players[results].SpecialtyName}</td>
				<td><a href="{$settings.site.root}/board/guild/view?gid={$players[results].Guild.GID}&sid={$players[results].Server.SID}">{$players[results].Guild.Name}</a></td>
			</tr>
			{/section}
		</table>
		<h3>Guilds</h3>
		<em>{$guild_results_count} results (Max 20)</em><br />
		<br />
		<table class="list-table" cellpadding="0" cellspacing="0">
			<tr class="heading">
				<td><strong>Name</strong></td>
				<td><strong>Members</strong></td>
				<td><strong>Exp</strong></td>
			</tr>
			{section name=results loop=$guilds}
			<tr bgcolor="{cycle values="#E0E0E0,#EAEAEA"}">
				<td><a href="{$settings.site.root}/board/guild/view?gid={$guilds[results].GID}&sid={$guilds[results].Server.SID}">{$guilds[results].Name}</a></td>
				<td>{$guilds[results].MemberCount}</td>
				<td>{$guilds[results].Exp}</td>
			</tr>
			{/section}
		</table>
	</div>
	<div class="box3-footer">
	</div>
</div>
