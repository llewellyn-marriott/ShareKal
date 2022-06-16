<div class="box1-wrapper">
	<div class="box1-header"> <a href="#">Server Status</a> </div>
	<div class="box1-content"> {section name=status loop=$servers_status} <strong>{$servers_status[status].Name}</strong><br />
		<div class="server-status"><font color="{if $servers_status[status].Status == 1}green{else}red{/if}">{if $servers_status[status].Status == 1}Online{else}Offline{/if}</font></div>
		{/section}
		 </div>
	<div class="box1-footer"> </div>
</div>
