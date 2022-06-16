<div class="box3-wrapper">
	<div class="box3-header"> <a href="#">{$page_name} - {$player.Name} ({$player.Server.Name})</a> </div>
	<div class="box3-content"> {if $error != ""}
		<div class="error">{$error}</div>
		{/if}
		{if $player.Online == true}
		<p>This player may be logged in, changes may not save.</p>
		{/if}
		<form method="post" action="{$settings.site.root}/board/player/edit/edit-stats">
			<input type="hidden" name="pid" value="{$request.pid}" />
			<input type="hidden" name="sid" value="{$request.sid}" />
			<table width="500" border="0">
				<tr>
					<td>Class:</td>
					<td><input type='text' value='{$player.Class}' name='Class'></td>
				</tr>
				<tr>
					<td>Specialty:</td>
					<td><input type='text' value='{$player.Specialty}' name='Specialty'></td>
				</tr>
				<tr>
					<td>Level:</td>
					<td><input type='text' value='{$player.Level}' name='Level'></td>
				</tr>
				<tr>
					<td>Contribute:</td>
					<td><input type='text' value='{$player.Contribute}' name='Contribute'></td>
				</tr>
				<tr>
					<td>Exp:</td>
					<td><input type='text' value='{$player.Exp}' name='Exp'></td>
				</tr>
				<tr>
					<td>Strength:</td>
					<td><input type='text' value='{$player.Strength}' name='Strength'></td>
				</tr>
				<tr>
					<td>Health:</td>
					<td><input type='text' value='{$player.Health}' name='Health'></td>
				</tr>
				<tr>
					<td>Intelligence:</td>
					<td><input type='text' value='{$player.Intelligence}' name='Intelligence'></td>
				</tr>
				<tr>
					<td>Wisdom:</td>
					<td><input type='text' value='{$player.Wisdom}' name='Wisdom'></td>
				</tr>
				<tr>
					<td>Dexterity:</td>
					<td><input type='text' value='{$player.Dexterity}' name='Dexterity'></td>
				</tr>
				<tr>
					<td>CurHP:</td>
					<td><input type='text' value='{$player.CurHP}' name='CurHP'></td>
				</tr>
				<tr>
					<td>CurMP:</td>
					<td><input type='text' value='{$player.CurMP}' name='CurMP'></td>
				</tr>
				<tr>
					<td>PUPoint:</td>
					<td><input type='text' value='{$player.PUPoint}' name='PUPoint'></td>
				</tr>
				<tr>
					<td>SUPoint:</td>
					<td><input type='text' value='{$player.SUPoint}' name='SUPoint'></td>
				</tr>
				<tr>
					<td>Killed:</td>
					<td><input type='text' value='{$player.Killed}' name='Killed'></td>
				</tr>
				<tr>
					<td>Map:</td>
					<td><input type='text' value='{$player.Map}' name='Map'></td>
				</tr>
				<tr>
					<td>X:</td>
					<td><input type='text' value='{$player.X}' name='X'></td>
				</tr>
				<tr>
					<td>Y:</td>
					<td><input type='text' value='{$player.Y}' name='Y'></td>
				</tr>
				<tr>
					<td>Z:</td>
					<td><input type='text' value='{$player.Z}' name='Z'></td>
				</tr>
				<tr>
					<td>Face:</td>
					<td><input type='text' value='{$player.Face}' name='Face'></td>
				</tr>
				<tr>
					<td>Hair:</td>
					<td><input type='text' value='{$player.Hair}' name='Hair'></td>
				</tr>
				<tr>
					<td>RevivalId:</td>
					<td><input type='text' value='{$player.RevivalId}' name='RevivalId'></td>
				</tr>
				<tr>
					<td>Rage:</td>
					<td><input type='text' value='{$player.Rage}' name='Rage'></td>
				</tr>
				<tr>
					<td colspan="2"><input type='submit' value='Edit' name='submit'></td>
				</tr>
			</table>
		</form>
	</div>
	<div class="box3-footer"> </div>
</div>
