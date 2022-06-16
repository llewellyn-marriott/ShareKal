<div class="box3-wrapper">
	<div class="box3-header"> <a href="#">{$page_name}</a> </div>
	<div class="box3-content">
		<p>To change your password you need to S/N which was sent to you when you made your account, if you dont have it you can <a href="{$settings.site.root}/board/account/recover-sn">recover it</a>.</p>
		 {if $error != ""}
		<div class="error">{$error}</div>
		{/if}
		<form method="post" action="{$settings.site.root}/board/account/change-pw">
			<table>
				<tr>
					<td><strong>S/N</strong></td>
					<td><input type="text" name="sn" class="text_field" autocomplete="off" /></td>
				</tr>
				<tr>
					<td colspan="2"><div class="small_label">This was given to you when you registered.</div></td>
				</tr>
				<tr>
					<td><strong>Current Password</strong></td>
					<td><input type="password"  class="text_field"  autocomplete="off" name="currentpw" /></td>
				</tr>
				<tr>
					<td colspan="2"><div class="small_label">Your current password.</div></td>
				</tr>
				<tr>
					<td><strong>New Password</strong></td>
					<td><input type="password" name="newpw"  class="text_field"  autocomplete="off"  maxlength="8" /></td>
				</tr>
				<tr>
					<td colspan="2"><div class="small_label">Your new password, 4 - 8 alpha-numeric characters (numbers and letters).</div></td>
				</tr>
				<tr>
					<td><strong>New Password Again</strong></td>
					<td><input type="password" name="newpw2"  class="text_field"  autocomplete="off"  maxlength="8" /></td>
				</tr>
				<tr>
					<td colspan="2"><div class="small_label">Enter your new password again to confirm.</div></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" value="Change" name="submit" /></td>
				</tr>
			</table>
		</form>
	</div>
	<div class="box3-footer">
	</div>
</div>
