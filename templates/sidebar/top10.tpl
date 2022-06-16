<div class="box1-wrapper">
	<div class="box1-header"> <a href="#">Top 10</a> </div>
	<div class="box1-content">
	<ol class="top10-list">
	{section name=top10 loop=$top10}
	<li><a href="{$settings.site.root}/board/player/view?pid={$top10[top10].PID}&sid={$top10[top10].Server.SID}">{$top10[top10].Name}</a></li>
	{/section}
	</ol>
	</div>
	<div class="box1-footer">
		</div>
</div>
