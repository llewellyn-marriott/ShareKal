<div class="box3-wrapper">
	<div class="box3-header"> <a href="#">{$page_name}</a> </div>
	<div class="box3-content">
		<h2>{$guild.Name}</h2>
		Guild Exp: {$guild.Exp}
		<h3>Members ({$guild.MemberCount})</h3>
		<table class="list-table" cellpadding="0" cellspacing="0">
			<tr class="heading">
				<td><strong>Name</strong></td>
				<td><strong>Level</strong></td>
				<td><strong>Job</strong></td>
			</tr>
			{section name=members loop=$players}
			<tr bgcolor="{cycle values="#E0E0E0,#EAEAEA"}">
				<td><a href="{$settings.site.root}/board/player/view?pid={$players[members].PID}&sid={$players[members].Server.SID}">{$players[members].Name}</a></td>
				<td>{$players[members].Level}</td>
				<td>{$players[members].SpecialtyName}</td>
			</tr>
			{/section}
		</table>
	</div>
	<div class="box3-footer">
	</div>
</div>
