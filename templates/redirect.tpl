{include file="head.tpl"}
<body>
{literal} 
<script type="text/JavaScript">
<!--
setTimeout("location.href = '{/literal}{$url}{literal}';",{/literal}{$time|default:'3000'}{literal});
-->
</script>{/literal}
<div id="redirect-box" class="box3-wrapper">
	<div class="box3-header"> <a href="#">Redirecting...</a> </div>
	<div class="box3-content"> {$message}<br>
		<br>
		You will be redirected in {math equation="$time/1000"} seconds, if not click <a href="{$url}">here</a> </div>
		<div class="box3-footer"></div>
</div>

</body>
