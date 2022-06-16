<?php
$errors = array(0 => "Invalid username/password",1 => "You need to activate your account before logging in.");
SetPageName("Login");
function DisplayForm($error)
{
	global $smarty;
	$smarty->Assign("error",$error);
	DisplayPage($GLOBALS["page"]);
}

//check if form submited
if(isset($_REQUEST['username']) && isset($_REQUEST['password']))
{
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	if($username != "" || $password != "")
	{
	  if(ctype_alnum($username) && ctype_alnum($password))
	  {
		  if(strlen($username) > 3 && strlen($username) < 13 && strlen($password) > 3 && strlen($password) < 13)
		  {
			  $uid = GetUIDFromID($username);		
			  $user = GetUser($uid);
			  //check if user exists
			  if($user)
			  {
				  if( Decode_Password($user['PWD']) == $password)
				  {

					 //login
					 $_SESSION['uid'] = $uid;
					 //checks if the user needs to be unbanned
					 CheckAutoUnban($user['UID']);
					 if(isset($_REQUEST['redirect']))
					 {
						
						DisplayRedirect(2000,$_REQUEST['redirect'],"You have been logged in successfully.");
					 }
					 else
					 {
						 DisplayRedirect(2000,$GLOBALS["settings"]["site"]["root"]."/board/community/news","You have been logged in successfully.");
					 }
				  }
				  else
				  {
					  //wrong password
					  DisplayForm($errors[0]);
  
				  }
			  }
			  else
			  {
				  //contains non alnum chars
			  	DisplayForm($errors[0]);
			  }
				  
		  }
		  else
		  {
			  //is wrong length
			  DisplayForm($errors[0]);
		  }
	  }
	  else
	  {
		  //contains non alnum chars
		  DisplayForm($errors[0]);
	  }	
	}
	else
	{
		//nothing entered
		DisplayForm("");
	}
}
else
{
//display form
DisplayForm("");
}
