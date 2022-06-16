<div class="box1-wrapper">
	<div class="box1-header"> <a href="#">Menu</a> </div>
	<div class="box1-content"> {section name=sidebar_menu loop=$sidebar_menu_links} <a href="{if $sidebar_menu_links[sidebar_menu].Local}{$settings.site.root}/board/{/if}{$sidebar_menu_links[sidebar_menu].URL}">{$sidebar_menu_links[sidebar_menu].Text}</a><br>
		{/section} </div>
		<div class="box1-footer">
		</div>
</div>
