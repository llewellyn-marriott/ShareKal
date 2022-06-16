<div class="box2-wrapper">
	<div class="box2-header"> <a href="#">Login</a> </div>
	<div class="box2-content">
		<form action="{$settings.site.root}/board/account/login" method="post">
			<strong>Username:</strong><br />
			<input class="text-field" autocomplete="off" name="username" type="text" />
			<br />
			<strong>Password:</strong><br />
			<input class="text-field" autocomplete="off" name="password" type="password" maxlength="8" />
			<br />
			<input type="submit" value="Login" />
		</form>
		<br />
		<a href="{$settings.site.root}/board/account/recover-details">Forgot Login?</a><br />
		<a href="{$settings.site.root}/board/account/register">Need an account?</a><br />
	</div>
	<div class="box2-footer">
		</div>
</div>
