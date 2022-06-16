<div class="box3-wrapper">
	<div class="box3-header"> <a href="#">{$page_name}</a> </div>
	<div class="box3-content"> {if $error != ""}
		<div class="error">{$error}</div>
		{/if}
		<form action="{$settings.site.root}/board/account/login" method="post">
			<strong>Username:</strong><br />
			<input class="text_field" autocomplete="off" name="username" type="text" />
			<br />
			<strong>Password:</strong><br />
			<input class="text_field" autocomplete="off" name="password" type="password" maxlength="8" />
			<br />
			<input type="submit" value="Login" />
			<input type="hidden" name="redirect" value="{$request.redirect}" />
		</form>
		<br />
		<a href="{$settings.site.root}/board/account/recoverdetails">Forgot Login?</a><br />
	</div>
	<div class="box3-footer">
	</div>
</div>