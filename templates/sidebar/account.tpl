<div class="box2-wrapper">
	<div class="box2-header"> <a href="#">Account</a> </div>
	<div class="box2-content"> Welcome, <b>{$current_user.ID}</b><br />
		<br />
		Register Date:<br />
 <b>{$current_user.RegisterDate}</b> <br />
		Email:<br />
 <b>{$current_user.Email}</b><br />
		<br />

		{if $current_user.Activated == 0}
		<div class="error">Your account isnt activated yet, you will not be able to play until you <a href="{$settings.site.root}/board/account/activate">activate</a> it.</div>
		<br />
		{/if}
		<div class="player-list"> {section name=playerlist loop=$current_user.Players}
			<a class="player" href="{$settings.site.root}/board/player/view?pid={$current_user.Players[playerlist].PID}&sid={$current_user.Players[playerlist].Server.SID}">
			<div class="class-icon" style="background-image: url({$settings.site.root}/{$settings.theme.root}/images/{$current_user.Players[playerlist].ClassName}_icon_med.png)"> </div>
			<div class="player-info">
				<div class="name">{$current_user.Players[playerlist].ColoredName}</div>
				<div class="info">{$current_user.Players[playerlist].Level} {$current_user.Players[playerlist].SpecialtyName}</div>
				<div class="info"><em>{$current_user.Players[playerlist].Server.Name}</em></div>
			</div>
			</a> {/section} </div>
		<br />
		{section name=links loop=$user_links}<a href="{if $user_links[links].Local}{$settings.site.root}/board/{/if}{$user_links[links].URL}">{$user_links[links].Text}</a><br />
		{/section} </div>
		<div class="box2-footer">
		</div>
</div>
