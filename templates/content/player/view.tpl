<div class="box3-wrapper">
	<div class="box3-header"> <a href="#">{$page_name}</a> </div>
	<div class="box3-content">
		<table width="400" border="0">
			<tr>
				<td width="130" rowspan="6"><img src="{$settings.site.root}/{$settings.theme.root}/images/{$player.ClassName}_med.jpg" /></td>
				<td colspan="2"><strong>{$player.NameLink}</strong></td>
			</tr>
			<tr>
				<td colspan="2">{$player.Level} {$player.SpecialtyName}</td>
			</tr>
			<tr>
				<td colspan="2"><em>{$player.Server.Name}</em></td>
			</tr>
			<tr>
				<td width="100">Guild:</td>
				<td><strong><a href="{$settings.site.root}/board/guild/view?gid={$player.Guild.GID}&sid={$player.Guild.Server.SID}">{$player.Guild.Name}</a></strong></td>
			</tr>
			<tr>
				<td>Contribution:</td>
				<td><strong>{$player.SUPoint}</strong></td>
			</tr>
			<tr>
				<td>Rank:</td>
				<td>{$player.Rank.Name}</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td>
				<table width="125">
						<tr>
							<td>Health Point:</td>
							<td><strong>{$player.CurHP}</strong></td>
						</tr>
						<tr>
							<td>Magic Point:</td>
							<td><strong>{$player.CurMP}</strong></td>
						</tr>
						<tr>
							<td>Strength:</td>
							<td><strong>{$player.Strength}</strong></td>
						</tr>
						<tr>
							<td>Health:</td>
							<td><strong>{$player.Health}</strong></td>
						</tr>
						<tr>
							<td>Intelligence:</td>
							<td><strong>{$player.Intelligence}</strong></td>
						</tr>
						<tr>
							<td>Wisdom:</td>
							<td><strong>{$player.Wisdom}</strong></td>
						</tr>
						<tr>
							<td>Agility:</td>
							<td><strong>{$player.Dexterity}</strong></td>
						</tr>
						<tr>
							<td>Stat Points:</td>
							<td><strong>{$player.PUPoint}</strong></td>
						</tr>
					</table></td>
				<td colspan="2" id="player-links">{include file="player_links.tpl"}</td>
				</td>
			</tr>
		</table>
	</div>
	<div class="box3-footer"> </div>
</div>
