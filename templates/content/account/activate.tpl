<div class="box3-wrapper">
	<div class="box3-header"> <a href="#">{$page_name}</a> </div>
	<div class="box3-content">  {if $error != ""}
			<div class="error">{$error}</div>
			{/if}
			<form action="{$settings.site.root}/board/account/activate" method="post">
				<strong>Username:</strong><br />
				<input type="text" class="text_field" name="username" />
				<br />
				<strong>SN:</strong><br />
				<input type="text" class="text_field" name="sn" />
				<br />
				<input type="submit" name="submit" value="Activate" />
			</form>
	</div>
	<div class="box3-footer">
	</div>
</div>