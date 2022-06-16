<div class="box3-wrapper">
	<div class="box3-header"> <a href="#">{$page_name}</a> </div>
	<div class="box3-content">
		<p>To change your email you need to S/N which was sent to you when you made your account, if you dont have it you can <a href="{$settings.site.root}/board/account/recover-sn">recover it</a>.</p>
		{if $error != ""}
		<div class="error">{$error}</div>
		{/if}
		<form method="post" action="{$settings.site.root}/board/account/change-email">
			<table>
				<tr>
					<td><strong>S/N</strong></td>
					<td><input type="text" name="sn" class="text_field" autocomplete="off" /></td>
				</tr>
				<tr>
					<td colspan="2"><div class="small_label">This was given to you when you registered.</div></td>
				</tr>
				<tr>
					<td><strong>New Email</strong></td>
					<td><input type="text"  class="text_field"  autocomplete="off" name="email" /></td>
				</tr>
				<tr>
					<td colspan="2"><div class="small_label">The new email address, you will have to confirm this.</div></td>
				</tr>
				<tr>
				<td colspan="2"><input type="submit" /> 
			</table>
		</form>
	</div>
	<div class="box3-footer">
	</div>
</div>
