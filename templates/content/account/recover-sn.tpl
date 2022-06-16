<div class="box3-wrapper">
	<div class="box3-header"> <a href="#">{$page_name}</a> </div>
	<div class="box3-content"> {if $error != ""}
		<div class="error">{$error}</div>
		{/if}
		{if $GotSN == false}
		<b>Please confirm, This can only be done once.</b>
		<form action="{$settings.site.root}/board/account/recover-sn" method="post">
			<input type="submit" name="confirm" value="Confirm" />
		</form>
		{/if}
		 </div>
		 <div class="box3-footer">
	</div>
</div>
