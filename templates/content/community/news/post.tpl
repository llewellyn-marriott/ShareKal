<div class="box3-wrapper">
	<div class="box3-header"> <a href="#">{$page_name}</a> </div>
	<div class="box3-content"> {if $error != ""}
		<div class="error">{$error}</div>
		{/if}<strong>Subject:</strong><br>
		<form action="{$settings.site.root}/board/community/news/post" method="post">
			<input type="text" name="subject" value="{$post.Subject|default:$request.subject}" />
			<br />
			<strong>Icon:</strong><br />
			{html_options name=icon options=$icons selected=$post.Icon} <br>
			<strong>Body:</strong><br>
			<textarea name="body" cols="60" rows="15" >{$post.Edit_Body|default:$request.body}</textarea>
			<br>
			<input type="hidden" name="nid" value="{$post.NID}" />
			<input type="submit" name="post" value="Post"/>
		</form>
	</div>
	<div class="box3-footer">
	</div>
</div>
