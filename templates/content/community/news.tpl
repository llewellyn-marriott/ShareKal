<div id="content-box-wrapper">
	<div class="box5-wrapper">
		<div class="box5-content" id="event-box"> <a id="active-event-button" href="#">&nbsp;</a>
			<div class="event-controls"> {section name=event_box loop=$events}
				<input type="hidden" id="event-{$events[event_box].EID}-url" value="{if $events[event_box].Local}{$settings.site.root}/board/{/if}{$events[event_box].URL}" />
				<a href="javascript:ChangeEvent({$events[event_box].EID},true)">{math equation="x + y" x=$events[event_box].EID y=1}</a> {/section} </div>
		</div>
	</div>
	{section name=news loop=$posts}
	<div class="box4-wrapper">
		<div class="box4-header">
			<div class="post-icon" style="background-image:url({$settings.site.root}/{$settings.theme.root}/images/post_icons/{$posts[news].Icon})"></div>
			<div class="post-title"><a href="#">{$posts[news].Display_Subject}</a></div>
		</div>
		<div class="box4-content">
			<div class="news-post-info">by <strong>{$posts[news].Poster.PrimaryPlayer.NameLink}</strong> {$posts[news].Date}&nbsp;&nbsp;&nbsp;{if $can_edit}<a href="{$settings.site.root}/board/community/news/post?nid={$posts[news].NID}">Edit Post</a> - <a href="{$settings.site.root}/board/community/news/post?delete=1&nid={$posts[news].NID}">Delete Post</a>{/if}</div>
			<div class="box"> {$posts[news].Display_Body|nl2br} </div>
		</div>
		<div class="box4-footer"> </div>
	</div>
	{/section} </div>
<div id="sidebar2"> {include file="sidebar/top10.tpl"}
	{include file="sidebar/forum_links.tpl"}
	{include file="sidebar/vote.tpl"} </div>
