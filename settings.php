<?php
$settings = parse_ini_file("config/settings.ini",true);
$settings["site"]["root"] = str_replace("{HTTP_HOST}",$_SERVER['HTTP_HOST'],$settings["site"]["root"]);
//$settings["site_root"] = "http://".$_SERVER['HTTP_HOST']."/arturas/private/sharekal_2_0_0";
//$settings["site_name"] = "SITE_NAME";
//$settings["server_name"] = "SERVER_NAME";
//$settings["splitter"] = " :: ";
////Email Settings
//$settings["email_host"] = "mail.arturasserver.com";
//$settings["email_username"] = "public@arturasserver.com";
//$settings["email_password"] = "public";
//$settings["email_from"] = "public@arturasserver.com";
//$settings["email_fromname"] = "Kal Online Server";
////recaptcha
//$settings["recaptcha_public"] = "6Lfrqr4SAAAAADBl5Ac4txn8maZtD8pOuY9h0Dkj";
//$settings["recaptcha_private"] = "6Lfrqr4SAAAAAOOj-MGFE-TWu2Egnk71-G89bkZR";
////database
//$settings["local_db"] = "sharekal_2_0_0";
//$settings["remote_db"] = "sharekal_2_0_0";
////server status check time in seconds
//$settings["status_check_time"] = 60;
?>