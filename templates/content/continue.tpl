<div class="box3-wrapper">
	<div class="box3-header"> <a href="#">{$page_name} - Continue</a> </div>
	<div class="box3-content">
		{section name=continue loop=$messages}
		{$messages[continue]}<br />
		{/section}<br />
		<a href="{$continue_url}">Continue</a> </div>
		<div class="box3-footer">
	</div>
</div>
