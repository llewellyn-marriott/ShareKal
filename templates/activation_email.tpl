<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
{literal}
<style>
body {
	font-family:Arial, Helvetica, sans-serif;
	color:#333;
}
</style>
{/literal}
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$subject}</title>
</head>
<body>
<h3>Welcome to {$server_name}</h3>
Before you can use your account you must verify your email address by activating your account, to do this enter your SN <a href="{$activation_url}">here</a>. <br />
Or <br />
{$activation_url}<br />
<br />
Your account details are as follows:<br />
<b>Username:</b> {$username}<br />
<b>Password:</b> {$password}<br />
<b>SN: </b>{$sn}<br />
</body>
</html>
