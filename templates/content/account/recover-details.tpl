<div class="box3-wrapper">
	<div class="box3-header"> <a href="#">{$page_name}</a> </div>
	<div class="box3-content"> {if $error != ""}
			<div class="error">{$error}</div>
			{/if}
			<form action="{$settings.site.root}/board/account/recover-details" method="post">
				<table align="center">
					<tr>
						<td><strong>Email</strong></td>
						<td><input autocomplete="off" class="text-field" name="email" type="text" value="{$request.email}"/></td>
					</tr>
					<tr>
						<td colspan="2"><div class="small_label">The email you registered your account with</div></td>
					</tr>
					<tr>
						<td colspan="2">{$captcha}</td>
					</tr>
					<tr>
						<td colspan="2" align="center"><input name="recoverdetails" type="submit" value="Submit" /></td>
					</tr>
				</table>
			</form>
</div>
<div class="box3-footer">
	</div>
</div>