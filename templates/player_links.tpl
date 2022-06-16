<strong>Links:</strong><br>
{section name=links loop=$player_links}
<a href="{$settings.site.root}/board/{$player_links[links].URL}?pid={$player.PID}&sid={$player.Server.SID}">{$player_links[links].Text}</a><br />
{/section}