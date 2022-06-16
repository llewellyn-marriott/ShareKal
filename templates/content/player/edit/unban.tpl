<div class="box3-wrapper">
	<div class="box3-header"> <a href="#">{$page_name}</a> </div>
	<div class="box3-content"> {if $error != ""}
		<div class="error">{$error}</div>
		{/if} <b>Please confirm you want to unban this player.</b>
		<form action="{$settings.site.root}/board/player/edit/unban" method="post">
			<input type="hidden" name="pid" value="{$request.pid}" />
			<input type="hidden" name="sid" value="{$request.sid}" />
			<input type="submit" name="confirm" value="Confirm" />
		</form>
	</div>
	<div class="box3-footer">
	</div>
</div>
