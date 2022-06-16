 {section name=menu loop=$menu_links} <a href="{if $menu_links[menu].Local}{$settings.site.root}/board/{/if}{$menu_links[menu].URL}">{$menu_links[menu].Text}</a> {/section} 

 <div id="search-bar">
<form action="{$settings.site.root}/board/server/database/search" method="get">
 <input class="text-field" name="query" type="text" value="Database Search" onfocus="value=''" />
 <input type="submit" value="Search" />
 </form>
 </div>