<div class="box3-wrapper">
	<div class="box3-header"> <a href="#">Ban Player - {$player.Name} ({$player.Server.Name})</a> </div>
	<div class="box3-content">
	{if $error != ""}
		<div class="error">{$error}</div>
		{/if}
	<p>This will automatically unban the players account when they login to the site after/on the unban date.</p>
	<form method="post" action="{$settings.site.root}/board/player/edit/ban">
	<input type="hidden" name="pid" value="{$request.pid}" />
	<input type="hidden" name="sid" value="{$request.sid}" />
	Reason (shown to admins):<br>
	<textarea name="reason" cols="50" rows="10"></textarea>
	<br>
	Display Reason (shown to the user):<br>
	<textarea name="display_reason" cols="50" rows="10"></textarea>
	<br>
	Unban Date: <br>
	{html_select_date}<br>
	<input type="submit" name="submit" value="Ban" />
	</form>
	</div>
	<div class="box3-footer">
	</div>
</div>