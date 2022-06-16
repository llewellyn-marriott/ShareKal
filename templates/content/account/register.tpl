<div class="box3-wrapper">
	<div class="box3-header"> <a href="#">{$page_name}</a> </div>
	<div class="box3-content"> {if $error != ""}
		<div class="error">{$error}</div>
		{/if}
		<form action="{$settings.site.root}/board/account/register" method="post">
			<table align="center">
				<tr>
					<td><strong>Username</strong></td>
					<td><input autocomplete="off" class="text_field" name="username" type="text" value="{$request.username}" maxlength="12" /></td>
				</tr>
				<tr>
					<td colspan="2"><div class="small_label">4 - 12 alpha-numeric (letters or numbers)</div></td>
				</tr>
				<tr>
					<td><strong>Password</strong></td>
					<td><input autocomplete="off" class="text_field" name="password" type="password" /></td>
				</tr>
				<tr>
					<td colspan="2"><div class="small_label">4 - 8 alpha-numeric (letters or numbers)</div></td>
				</tr>
				<tr>
					<td><strong>Password Again</strong></td>
					<td><input autocomplete="off" class="text_field" name="password2" type="password" /></td>
				</tr>
				<tr>
					<td colspan="2"><div class="small_label">Same as entered above</div></td>
				</tr>
				<tr>
					<td><strong>Email Address</strong></td>
					<td><input autocomplete="off" class="text_field" name="email" type="text" value="{$request.email}" /></td>
				</tr>
				<tr>
					<td colspan="2"><div class="small_label">This must be an active email, an email will be sent to activate the account.</div></td>
				</tr>
				<tr>
					<td colspan="2"><input type="checkbox" name="accept" value="1">
						I have read the <a href="{$settings.site.root}/board/community/rules">rules</a> and have entered the correct information.</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input name="register" type="submit" value="Register" /></td>
				</tr>
			</table>
		</form>
	</div>
	<div class="box3-footer">
	</div>
</div>
