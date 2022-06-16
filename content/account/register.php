<?php

SetPageName("Register");
// error list
$errors = array(0 => "Username must be 4 - 12 Alpha Numeric characters.",
					  1 => "Email is not valid.",
					  2 => "Password must be 4 - 12 Alpha Numeric characters.",
					  3 => "You must accept the agreement.",
					  4 => "Username is already in use.",
					  5 => "Email is already in use.",
					  6 => "Email could not be sent.",
					  7 => "Passwords do not match."
					  
					  );


function DisplayForm($error)
{
	global $smarty;
	$smarty->Assign("error",$error);
	DisplayPage($GLOBALS["page"]);
}

if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password2']))
{
	if(isset($_POST['accept']) && $_POST['accept'] == 1)
	{
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		if(strlen($username) <= 12 && strlen($username) > 3 && ctype_alnum($username))
		{
			if(!ereg('[^A-Za-z0-9_@.-]', $email) && strstr($email,"@"))
			{
				if(strlen($password) <= 8 && strlen($password) > 3 && ctype_alnum($password))
				{
					if($password == $password2)
					{
						if(!UsernameExists($username))
						{
							if(!EmailExists($email))
							{
								//register
								$sn = RandomKeys(15);
								$date = date("Y-m-d h:m:s");
								$dob =  "1919-01-01";
								if(SendActivationEmail($username, $password, $email, $sn))
								{				
									Register($username,$password,$dob,$email,$sn,$date);
									DisplayRedirect(5000,$GLOBALS['settings']["site"]['root']."/board/community/news","You have registered successfully, check your email for activation instructions.");
								}
								else
								{
									$register_error = $register_errors[6];
									DisplayForm();
								}
							}
							else
							{
								// email in use
								DisplayForm($errors[5]);
							}
						}
						else
						{
							//id in use
							DisplayForm($errors[4]);
						}
					}
					else
					{
						//passwords dont match
						DisplayForm($errors[7]);
					}
				}
				else
				{
					//password invalid
					DisplayForm($errors[2]);
				}
			}
			else
			{
				//email not valid
				DisplayForm($errors[1]);
			}
		}
		else
		{
			//username wrong
			DisplayForm($errors[0]);
		}
	}
	else
	{
		// no accept button pressed
		DisplayForm($errors[3]);
	}
}
else
{
	// display form
	DisplayForm("");
}

?>