<?php
function SetPageName($name)
{
	global $smarty;
	// set page title
	$smarty->assign('page_title', $GLOBALS["settings"]["site"]["name"].$GLOBALS["settings"]["site"]["splitter"].$name);
	// set page name
	$smarty->assign('page_name', $name);
}
function SelectWebsiteDB()
{
	if($_SERVER['SERVER_NAME'] == "localhost")
	{
		mssql_select_db($GLOBALS["settings"]["mssql_local"]["db"]);
	}
	else
	{
		mssql_select_db($GLOBALS["settings"]["mssql"]["db"]);
	}
}
function GetNameLink($player)
{
	global $smarty;
	$smarty->assign("player_name_link",$player);
	return $smarty->fetch("name_link.tpl");
}
function GetColoredName($player)
{
	global $smarty;
	$smarty->assign("player_colored_name",$player);
	return $smarty->fetch("colored_name.tpl");
}
function ResetPlayerRageBar($pid,$sid)
{
	SelectKalDB($sid);
	mssql_query("UPDATE Player SET [Rage] = 617142 WHERE PID = ".$pid);
}
function ResetPlayerLocation($pid,$sid)
{
	SelectKalDB($sid);
	mssql_query("UPDATE Player SET [X] = 258306 WHERE PID = ".$pid);
	mssql_query("UPDATE Player SET [Y] = 258294 WHERE PID = ".$pid);
	mssql_query("UPDATE Player SET [Z] = 16889 WHERE PID = ".$pid);
	mssql_query("UPDATE Player SET [Map] = 0 WHERE PID = ".$pid);
}
function ResetPlayerGuildJoinTime($pid,$sid)
{
	SelectKalDB($sid);
	mssql_query("DELETE FROM GuildMember WHERE [GID]=0 AND PID=".$pid);
}
function ServerExists($SID)
{
	SelectWebsiteDB();
	$query = "SELECT [SID] FROM Servers WHERE [SID] = ".$SID;
	$result = mssql_query($query);
	return mssql_num_rows($result);
}
function SelectKalDB($SID)
{
	if(ServerExists($SID))
	{
		SelectWebsiteDB();
		$query = "SELECT [kal_db] FROM Servers WHERE [SID] = ".$SID;
		$result = mssql_query($query);
		$row = mssql_fetch_array($result);
		mssql_select_db($row["kal_db"]);
	}
}
function SelectKalAuthDB()
{
	mssql_select_db($GLOBALS['settings']['mssql']['kal_auth']);
}
function GetNewsPost($nid)
{
	SelectWebsiteDB();
	$query = "SELECT * FROM News WHERE NID = ".$nid;
	$result = mssql_query($query) or die("Error");
	$row = mssql_fetch_array($result);
	$row['Display_Body'] = bbcode_format(html_entity_decode($row['Body'],ENT_QUOTES));
	$row['Edit_Body'] = html_entity_decode($row['Body'],ENT_QUOTES);
	$row['Display_Subject'] = html_entity_decode($row['Subject'],ENT_QUOTES);
	$row['Poster'] = GetUser($row['UID']);
	return $row;
}
function GetNews($length)
{
	SelectWebsiteDB();
	$data = array();
	$query = "SELECT TOP ".$length." NID FROM [News] WHERE Deleted = 0 ORDER BY NID DESC";
	$result = mssql_query($query) or die("Error");
	$i = 0;
	while($row = mssql_fetch_array($result))
	{
		$data[$i] = GetNewsPost($row['NID']);
		$i ++;
	}
	return $data;
}
function GetEvents()
{
	SelectWebsiteDB();
	$data = array();
	$query = "SELECT * FROM [Events] ORDER BY EID ASC";
	$result = mssql_query($query) or die("Error");
	$i = 0;
	while($row = mssql_fetch_array($result))
	{
		$data[$i] = $row;
		$i ++;
	}
	return $data;
}
function GetEventsCount()
{
	SelectWebsiteDB();
	$data = array();
	$query = "SELECT EID FROM [Events] ORDER BY EID ASC";
	$result = mssql_query($query) or die("Error");
	return mssql_num_rows($result);
}
function GetTopClass($class,$sid)
{
	SelectKalDB($sid);
	$query = "SELECT TOP 1 [PID] FROM Player WHERE [SiteAdmin] = 0 AND [Class] = ".$class." ORDER BY [Level] DESC, [Exp] DESC";
	$result = mssql_query($query) or die("Error");
	$row['Name'] = "None";
	while($row = mssql_fetch_array($result))
	{
		$row = GetPlayer($row['PID'],$sid);
		return $row;
	}
	
	
}
function GetSpecialtyName($Spec, $Class)
{
	if($Class == 0 && $Spec == 1){
  return 'Wondering Knight';
  }elseif($Class == '0' && $Spec == '3'){
  return 'Apprentice Knight';
  }elseif($Class == '0' && $Spec == '7'){
  return 'Vagabond';
  }elseif($Class == '0' && $Spec == '11'){
  return 'Commander';
  }elseif($Class == '0' && $Spec > '12'){
  return 'God Of Sword';
  }elseif($Class == '1' && $Spec == '1'){
  return 'Scholar';
  }elseif($Class == '1' && $Spec == '3'){
  return 'Literary Person';
  }elseif($Class == '1' && $Spec == '7'){
  return 'Hermit';
  }elseif($Class == '1' && $Spec == '11'){
  return 'CJB';
  }elseif($Class == '1' && $Spec > '12'){
  return 'God of Magic';
  }elseif($Class == '2' && $Spec == '1'){
  return 'Wondering Archer';
  }elseif($Class == '2' && $Spec == '3'){
  return 'Apprentice Archer';
  }elseif($Class == '2' && $Spec == '7'){
  return 'Expert Archer';
  }elseif($Class == '2' && $Spec == '11'){
  return 'IC';
  }elseif($Class == '2' && $Spec > '12'){
  return 'God of Bow';
  }
}
function GetTopPlayers($top,$sid)
{
	SelectKalDB($sid);
	$data = array();
	$query = "SELECT TOP ".$top." PID FROM [Player] WHERE [Admin] = 0 ORDER BY [Level] DESC, [Exp] DESC";
	$result = mssql_query($query) or die("Error");
	$i = 0;
	while($row = mssql_fetch_array($result))
	{
		$row = GetPlayer($row['PID'],$sid);
		$row['Rank'] = $i + 1;
		$data[$i] = $row;
		$i ++;
	}
	return $data;
}
function GetNewsCount()
{
	SelectWebsiteDB();
	$query = "SELECT * FROM News WHERE Deleted=0";
	$result = mssql_query($query) or die("Error");
	return mssql_num_rows($result);
}
function ChangePassword($UID, $Password)
{
	SelectKalAuthDB();
	$query = "UPDATE Login SET [PWD] = ".Encode_Password($Password)." WHERE [UID] = ".$UID;
	return mssql_query($query);
}
function ChangeEmail($UID)
{
	SelectKalAuthDB();
	mssql_query("UPDATE Login SET [Email] = [ConfirmEmail] WHERE [UID] = ".$UID);
	mssql_query("UPDATE [Login] SET [ConfirmEmail] = '' WHERE [UID] = ".$UID);
	mssql_query("UPDATE [Login] SET [ConfirmEmailKey] = '' WHERE [UID] = ".$UID);
}
function SearchPlayers($query,$sid,$limit)
{
	SelectKalDB($sid);
	$query = "SELECT TOP ".$limit." PID FROM [Player] WHERE [Name] LIKE '%".$query."%' ORDER BY [Name] ASC";
	$result = mssql_query($query);
	$data = array();
	$i = 0;
	while($row = mssql_fetch_array($result))
	{
		$data[$i] = GetPlayer($row['PID'],$sid);
		$i++;
	}
	return $data;
}
function SearchGuilds($query,$sid,$limit)
{
	SelectKalDB($sid);
	$query = "SELECT TOP ".$limit." GID FROM [Guild] WHERE [Name] LIKE '%".$query."%' ORDER BY [Name] ASC";
	$result = mssql_query($query);
	$data = array();
	$i = 0;
	while($row = mssql_fetch_array($result))
	{
		$data[$i] = GetGuild($row['GID'],$sid);
		$i++;
	}
	return $data;
	
}
function GetServers()
{
	SelectWebsiteDB();
	$data = array();
	$query = "SELECT * FROM Servers";
	$result = mssql_query($query) or die("Error");
	$i = 0;
	while($row = mssql_fetch_array($result))
	{
		$data[$i] = $row;
		$i ++;
	}
	return $data;
}
function GetHighestSiteAdmin($uid,$sid)
{
	$servers = GetServers();
	$highest_admin = 0;
	if($uid == 0)
	{
		return 0;
	}
	foreach($servers as $key => $value)
	{
		if($value['SID'] == $sid || $sid == -1)
		{
			SelectKalDB($value['SID']);
			$query = "SELECT SiteAdmin FROM Player WHERE [UID] =".$uid;
			$result = mssql_query($query) or die("Error");
			while($row = mssql_fetch_array($result))
			{
				if($row['SiteAdmin'] > $highest_admin)
				{
					$highest_admin = $row['SiteAdmin'];
				}
			}
		}
	}
	return $highest_admin;
}
function GetPlayers($uid)
{
	$servers = GetServers();
	$data = array();
	$i = 0;
	foreach($servers as $key => $value)
	{
		SelectKalDB($value['SID']);
		$query = "SELECT [PID] FROM Player WHERE [UID] =".$uid;
		$result = mssql_query($query) or die("Error");
		while($row = mssql_fetch_array($result))
		{
			$data[$i] = GetPlayer($row['PID'],$value['SID']);
			$i++;
		}
	}
	return $data;
}
function GetImageList($directory)
{
	$data = array();
	if ($handle = opendir($directory)) 
	{
		while (false !== ($file = readdir($handle))) 
		{
			if ($file != "." && $file != "..") 
			{
				$data[$file] = $file;
			}
		}
		closedir($handle);
	}
	return $data;
}
function GetUser($uid)
{
	SelectKalAuthDB();
	$query = "SELECT * FROM Login WHERE [UID] =".$uid;
	$result = mssql_query($query) or die("Error");
	if(mssql_num_rows($result))
	{
		$row = mssql_fetch_array($result);
		$row['SiteAdmin'] = GetHighestSiteAdmin($uid, -1);
		if($row['PrimaryPID'] != 0)
		{
			$row['PrimaryPlayer'] = GetPlayer($row['PrimaryPID'],$row['PrimarySID']);
		}
		return $row;
	}
	else
	{
		return false;
	}
}
function GetServer($sid)
{
	SelectWebsiteDB();
	if(ServerExists($sid))
	{
		$query = "SELECT * FROM Servers WHERE [SID] =".$sid;
		$result = mssql_query($query) or die("Error");
		$row = mssql_fetch_array($result);
		return $row;
	}
}
function GetPlayer($pid,$sid)
{
	if(ServerExists($sid))
	{
		SelectKalDB($sid);
		$query = "SELECT * FROM [Player] WHERE [PID] = ".$pid;
		$result = mssql_query($query) or die("Error");
		$row = mssql_fetch_array($result);
		$row['Server'] = GetServer($sid);
		$row['Guild'] = GetGuild($row['GID'],$sid);
		$row['SpecialtyName'] = GetSpecialtyName($row['Specialty'],$row['Class']);
		$row['ClassName'] = GetClassName($row['Class']);
		$row['Rank'] = GetRank($row['SiteAdmin']);
		$row['Name'] = htmlspecialchars($row['Name'], ENT_QUOTES);
		$row['ColoredName'] = GetColoredName($row);
		$row['NameLink'] = GetNameLink($row);
		return $row;
	}
}
function GetRank($site_admin)
{
	SelectWebsiteDB();
	$query = "SELECT * FROM [Ranks] WHERE [SiteAdmin] = ".$site_admin;
	$result = mssql_query($query);
	//checks if there is a rank for this SiteAdmin
	if(mssql_num_rows($result))
	{
		$row = mssql_fetch_array($result);
		return $row;
	}
	if($site_admin != 0)
	{
		//if not just get 0
		return GetRank(0);
	}
	return false;
}
function GetClassName($Class)
{
	switch($Class)
	{
	case 0:
		return "knight";
	case 1:
		return "mage";
	case 2:
		return "archer";
	case 3:
		return "assasin";
	default: 
		return "unknown";
	}
}
function GetGuild($gid,$sid)
{
	if(ServerExists($sid))
	{
		SelectKalDB($sid);
		$query = "SELECT * FROM Guild WHERE [GID] =".$gid;
		$result = mssql_query($query) or die("Error");
		$row = mssql_fetch_array($result);
		$num = mssql_num_rows($result);
		$row['Server'] = GetServer($sid);
		$row['MemberCount'] = GetGuildMemberCount($gid,$sid);
		if(!$num)
		{
			$row['Name'] = "None";
		}
		
		return $row;
	}
}
function GetGuildMemberCount($gid,$sid)
{
	SelectKalDB($sid);
	$query = "SELECT PID FROM Player WHERE GID = ".$gid;
	$result = mssql_query($query);
	return mssql_num_rows($result);
}

function DisplayRedirect($time,$url,$message)
{
	global $smarty;
	$smarty->Assign("time",$time);
	$smarty->Assign("url",$url);
	$smarty->Assign("message",$message);
	$smarty->Display("redirect.tpl");
}
function DisplayPermissionError()
{
	global $smarty;
	SetPageName("Error");
	$smarty->Assign("content",$smarty->fetch("permission_error.tpl"));
	$smarty->Display("index.tpl");
}
function DisplayError($error)
{
	global $smarty;
	$smarty->Assign("error",$error);
	DisplayPage("error");
}
function DisplayContinue($messages,$url)
{
	global $smarty;
	$smarty->Assign("messages",$messages);
	$smarty->Assign("continue_url",$url);
	DisplayPage("continue");
}
function GetUIDFromID($id)
{
	SelectKalAuthDB();
	$query = "SELECT * FROM Login WHERE [ID] = '".$id."'";
	$result = mssql_query($query) or die("Error");
	$row = mssql_fetch_array($result);
	return $row['UID']+0;
}
function GetUIDFromEmail($email)
{
	SelectKalAuthDB();
	$query = "SELECT * FROM Login WHERE [Email] = '".$email."'";
	$result = mssql_query($query) or die("Error");
	$row = mssql_fetch_array($result);
	return $row['UID']+0;
}

function UsernameExists($id)
{
	SelectKalAuthDB();
	$query = "SELECT * FROM Login WHERE [ID] = '".$id."'";
	$result = mssql_query($query) or die("Error");
	return mssql_num_rows($result);
}
function EmailExists($email)
{
	SelectKalAuthDB();
	$query = "SELECT * FROM Login WHERE [Email] = '".$email."'";
	$result = mssql_query($query) or die("Error");
	return mssql_num_rows($result);
}
function GotSN($uid)
{
	SelectKalAuthDB();
	$query = "SELECT * FROM Login WHERE [GotSN] = 1 AND UID =".$uid;
	$result = mssql_query($query) or die("Error");
	return mssql_num_rows($result);
}
function PlayerExists($pid,$sid)
{
	SelectKalDB($sid);
	$query = "SELECT [PID] FROM [Player] WHERE [PID] = '".$pid."'";
	$result = mssql_query($query) or die("Error");
	return mssql_num_rows($result);
}
function GetPlayersInGuild($gid,$sid)
{
	SelectKalDB($sid);
	$query = "SELECT [PID] FROM [Player] WHERE [GID] =".$gid;
	$result = mssql_query($query);
	$data = array();
	$i = 0;
	while($row = mssql_fetch_array($result))
	{
		$data[$i] = GetPlayer($row['PID'],$sid);
		$i++;
	}
	return $data;
}
function GuildExists($gid,$sid)
{
	SelectKalDB($sid);
	$query = "SELECT GID FROM Guild WHERE [GID] = '".$gid."'";
	$result = mssql_query($query) or die("Error");
	return mssql_num_rows($result);
}
//made by Hijax?
function RandomKeys($length)
{
  $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
  for($i=0;$i<$length;$i++)
  {
   if(isset($key))
     $key .= $pattern{rand(0,35)};
   else
     $key = $pattern{rand(0,35)};
  }
  return $key;
}

function SendEmail($email, $subject, $body)
{
	
	require("class.phpmailer.php");
	$mail = new PHPMailer();
	$mail->SetLanguage( 'en', 'phpmailer/language/' );
	$mail->IsSMTP();                                   // send via SMTP
	$mail->Host     = $GLOBALS["settings"]["email"]["host"]; // SMTP servers
	$mail->SMTPAuth = true;     // turn on SMTP authentication
	$mail->Username = $GLOBALS["settings"]["email"]["username"];  // SMTP username
	$mail->Password = $GLOBALS["settings"]["email"]["password"]; // SMTP password
	$mail->From     = $GLOBALS["settings"]["email"]["from"];
	$mail->FromName = $GLOBALS["settings"]["server"]["name"];
	$mail->AddAddress($email); 
	$mail->IsHTML(true);                                 // send as HTML
	$mail->Subject  =  $subject;
	$mail->Body  =  $body;
	if(!$mail->Send())
	{
		return false;
	}
	else
	{
		return true;
	}
}

function SendActivationEmail($username, $password, $email, $sn)
{	
	global $smarty;
	$smarty->assign('username',$username);
	$smarty->assign('password',$password);
	$smarty->assign('sn',$sn);
	$smarty->assign('email',$email);
	$smarty->assign('server_name',$GLOBALS['settings']["server"]['name']);
	$smarty->assign('activation_url',$GLOBALS['settings']["site"]['root']."/board/account/activate");
	$smarty->assign('email',$email);
	
	$subject = $GLOBALS['settings']['site']['name'];
	$body = $smarty->fetch("activation_email.tpl");
	if(!SendEmail($email,$subject,$body))
	{
		return false;
	}
	else
	{
		return true;
	}
}
function SendRecoveryEmail($uid)
{	
	global $smarty;
	
	$user = GetUser($uid);
	
	$smarty->assign('username',$user['ID']);
	$smarty->assign('password',Decode_Password($user['PWD']));
	
	$email = $user['Email'];
	$subject = $GLOBALS['settings']["site"]['name'];
	
	$body = $smarty->fetch("recovery_email.tpl");
	if(!SendEmail($email,$subject,$body))
	{
		return false;
	}
	else
	{
		return true;
	}
}
function SetGotSN($uid)
{
	SelectKalAuthDB();
	mssql_query("UPDATE [Login] SET [GotSN] = 1 WHERE UID = ".$uid);
}
function SendSNEmail($uid)
{	
	global $smarty;
	
	$user = GetUser($uid);
	
	$smarty->assign('sn',$user['SN']);
	
	$email = $user['Email'];
	$subject = $GLOBALS['settings']["site"]['name'];
	
	$body = $smarty->fetch("sn_email.tpl");
	if(!SendEmail($email,$subject,$body))
	{
		return false;
	}
	else
	{
		return true;
	}
}
function SendConfirmEmail($uid,$email)
{	
	global $smarty;
	
	$user = GetUser($uid);
	$confirm_key = RandomKeys(15);
	
	SelectKalAuthDB();
	
	mssql_query("UPDATE [Login] SET [ConfirmEmailKey] = '".$confirm_key."' WHERE [UID] = ".$uid);
	mssql_query("UPDATE [Login] SET [ConfirmEmail] = '".$email."' WHERE [UID] = ".$uid);
	
	$smarty->assign('confirm_url',$GLOBALS['settings']["site"]['root']."/board/account/confirm-email?key=".$confirm_key);
	
	$subject = $GLOBALS['settings']["site"]['name'];
	
	$body = $smarty->fetch("confirm_email.tpl");
	if(!SendEmail($email,$subject,$body))
	{
		return false;
	}
	else
	{
		return true;
	}
}
function SendBanEmail($uid,$reason,$unban_date)
{	
	global $smarty;
	
	$user = GetUser($uid);
	
	$smarty->assign('username',$user['ID']);
	$smarty->assign('reason',$reason);
	$smarty->assign('unban_date',$unban_date);
	$smarty->assign('server_name',$GLOBALS['settings']["server"]['name']);
	
	$email = $user['Email'];
	$subject = $GLOBALS['settings']["site"]['name'];
	
	$body = $smarty->fetch("ban_email.tpl");
	if(!SendEmail($email,$subject,$body))
	{
		return false;
	}
	else
	{
		return true;
	}
}
function Register($id,$password,$dob,$email,$sn,$date)
{
	
	SelectKalAuthDB();
	$query = "INSERT INTO Login (ID, PWD, Birth, Type, ExpTime, Info, RegisterDate, Email, SN, Activated) VALUES ('".$id."',".Encode_Password($password).",'".$dob."',0,4000,10,'".$date."','".$email."','".$sn."',0)";
	$result = mssql_query($query) or die("Error");
	return $result;
}
function HasPagePermission($page,$admin,$sid)
{
	SelectWebsiteDB();
	$query = "SELECT * FROM Pages WHERE Name = '".$page."' AND [Min_SiteAdmin] <= ".$admin." AND [Max_SiteAdmin] >= ".$admin." AND ([SID] = -1 OR [SID] = ".$sid.")";
	$result = mssql_query($query) or die("Error");
	return mssql_num_rows($result);
}
function HasFeaturePermission($feature,$admin,$sid)
{
	SelectWebsiteDB();
	$query = "SELECT * FROM ServerFeatures WHERE Feature = '".$feature."' AND [Min_SiteAdmin] <= ".$admin." AND [Max_SiteAdmin] >= ".$admin." AND ([SID] = -1 OR [SID] = ".$sid.")";
	$result = mssql_query($query) or die("Error");
	return mssql_num_rows($result);
}
function GetUserLinks($admin)
{
	SelectWebsiteDB();
	$data = array();
	$query = "SELECT * FROM UserLinks WHERE Min_SiteAdmin <= ".$admin." AND Max_SiteAdmin >= ".$admin." ORDER BY [Order] ASC";
	$result = mssql_query($query) or die("Error");
	$i = 0;
	while($row = mssql_fetch_array($result))
	{
		$data[$i] = $row;
		$i ++;
	}
	return $data;
}
function GetPlayerLinks($pid,$sid)
{
	
	$data = array();
	$player = GetPlayer($pid,$sid);
	$player_admin = $player['SiteAdmin'];
	$server_admin = GetHighestSiteAdmin($GLOBALS['current_user']['UID'],$sid);
	$global_admin = GetHighestSiteAdmin($GLOBALS['current_user']['UID'],-1);
	SelectWebsiteDB();
	$query = "SELECT * FROM PlayerLinks WHERE 
	(
	(Min_SiteAdmin <= ".$player_admin." AND Max_SiteAdmin >= ".$player_admin." AND [GlobalSiteAdmin] = 0 AND [ServerSiteAdmin] = 0) OR
	(Min_SiteAdmin <= ".$server_admin." AND Max_SiteAdmin >= ".$server_admin." AND [GlobalSiteAdmin] = 0 AND [ServerSiteAdmin] = 1) OR
	(Min_SiteAdmin <= ".$global_admin." AND Max_SiteAdmin >= ".$global_admin." AND [GlobalSiteAdmin] = 1)
	)
	AND ([SID] = -1 OR [SID] = ".$sid.") ORDER BY [Order] ASC";
	$result = mssql_query($query) or die("Error");
	$i = 0;
	$owned = false;
	if($player['UID'] == $GLOBALS['current_user']['UID'])
	{
		$owned = true;
	}
	while($row = mssql_fetch_array($result))
	{
		$add = false;
		if($owned)
		{
			$add = true;
		}
		else
		{
			if($row['Global'] == "1")
			{
				$add = true;
			}
			
		}
		
		if($add)
		{
			$data[$i] = $row;
			$i ++;
		}
		
		
	}
	return $data;
}
function GetMenuLinks($admin,$sidebar)
{
	SelectWebsiteDB();
	$data = array();
	$query = "SELECT * FROM MenuLinks WHERE Min_SiteAdmin <= ".$admin." AND Max_SiteAdmin >= ".$admin." AND [Sidebar] = 0";
	if($sidebar)
	{
		$query = "SELECT * FROM MenuLinks WHERE Min_SiteAdmin <= ".$admin." AND Max_SiteAdmin >= ".$admin;
	}
	$result = mssql_query($query) or die("Error");
	$i = 0;
	while($row = mssql_fetch_array($result))
	{
		$data[$i] = $row;
		$i ++;
	}
	return $data;
}
function AddNews($subject,$body,$uid,$icon)
{
	SelectWebsiteDB();
	$date = date("Y-m-d h:m:s");
	$query = "INSERT INTO News (Subject,Body,UID,Date,Deleted,Icon) VALUES ('".htmlspecialchars($subject, ENT_QUOTES)."','".htmlspecialchars($body, ENT_QUOTES)."','".$uid."','".$date."',0,'".htmlspecialchars($icon, ENT_QUOTES)."')";
	$result = mssql_query($query) or die("Error");
	return $result;
}
function SetMainCharacter($uid,$pid,$sid)
{
	SelectKalAuthDB();
	mssql_query("UPDATE [Login] SET PrimaryPID = ".$pid.", PrimarySID = ".$sid." WHERE [UID] = ".$uid);
}
function MainCharacterSet($uid)
{
	SelectKalAuthDB();
	$query = "SELECT [UID] FROM [Login] WHERE PrimaryPID != NULL AND PrimarySID != NULL AND [UID] = ".$uid;
	$result = mssql_query($query);
	return mssql_num_rows($result);
}
function CheckAutoUnban($uid)
{
	SelectWebsiteDB();
	$query = "SELECT * FROM [Bans] WHERE [UID] = ".$uid." AND [Unbanned] = 0 ORDER BY [UnbanDate] DESC";
	$result = mssql_query($query);
	$row = mssql_fetch_array($result);
	if(mssql_num_rows($result))
	{
		$unban_date = $row['UnbanDate'];
		$unban_date_arr = explode("-",$unban_date);
		$unban_date = mktime(0,0,0,$unban_date_arr[1],$unban_date_arr[2],$unban_date_arr[0]);
		
		//check if its past unban date
		if(time() > $unban_date)
		{
			UnBanUser($uid);
		}
	}
}
function BanUser($uid,$unban_date,$reason,$banned_by,$display_reason)
{
	SelectWebsiteDB();
	$date = date("Y-m-d");
	$query = "INSERT INTO [Bans] (UID,BanDate,UnbanDate,Reason,Unbanned,BannedBy,DisplayReason) VALUES (".$uid.",'".$date."','".$unban_date."','".$reason."',0,".$banned_by.",'".$display_reason."')";
	mssql_query($query);
	SelectKalAuthDB();
	$query = "UPDATE [Login] SET [Type] = 10 WHERE [UID] = ".$uid;
	mssql_query($query);
	
	SendBanEmail($uid,$display_reason,$unban_date);
}
function UnBanUser($uid)
{
	SelectWebsiteDB();
	$date = date("Y-m-d");
	$query = "UPDATE [Bans] SET Unbanned = 1 WHERE [UID] = ".$uid;
	mssql_query($query);
	SelectKalAuthDB();
	$query = "UPDATE [Login] SET [Type] = 0 WHERE [UID] = ".$uid;
	mssql_query($query);
}
function EditNews($nid,$subject,$body,$uid,$icon)
{
	SelectWebsiteDB();
	$date = date("Y-m-d h:m:s");
	$query = "UPDATE News SET Subject = '".htmlspecialchars($subject, ENT_QUOTES)."', Body = '".htmlspecialchars($body, ENT_QUOTES)."' , UID = ".$uid.", Date = '".$date."', Icon = '".htmlspecialchars($icon, ENT_QUOTES)."' WHERE NID = ".$nid;
	$result = mssql_query($query) or die("Error");
	return $result;
}

function DeleteNews($nid, $uid)
{
	SelectWebsiteDB();
	$date = date("Y-m-d h:m:s");
	$query = "UPDATE News SET Deleted = 1, UID = ".$uid." WHERE NID = ".$nid;
	$result = mssql_query($query) or die("Error");
	return $result;
}


function UserIsActivated($uid)
{
	SelectKalAuthDB();
	$query = "SELECT * FROM Login WHERE UID = '".$uid."' AND Activated = 1";
	$result = mssql_query($query) or die("Error");
	return mssql_num_rows($result);
}
function ActivateUser($uid)
{
	SelectKalAuthDB();
	$query = "UPDATE Login SET [Type] = 0 WHERE [UID] = ".$uid;
	$query = "UPDATE Login SET [Activated] = 1 WHERE [UID] = ".$uid;
	$result = mssql_query($query) or die("Error");
	return $result;
}
function alnum2($str)
{
	if (ereg('[^A-Za-z0-9 @_.,]', $str)) { 
  		return false;
	} 
	else
	{ 
  		return true; 
	} 
}
function alnum3($str)
{
	if (ereg('[^A-Za-z0-9_. ]', $str)) { 
  		return false;
	} 
	else
	{ 
  		return true; 
	} 
}
//encode/decode functions (not mine)
function Decode_Password($Password)
{
	$Decode = "";
    $DecTable = array('95'=>'!', '88'=>'"', '9D'=>'#', '4C'=>'$', 'F2'=>'%', 
						'3E'=>'&', 'BB'=>'\'', 'C0'=>'(', '7F'=>')', '18'=>'*', '70'=>'+', 
						'A6'=>',', 'E2'=>'-', 'EC'=>'.', '77'=>'/', '2C'=>'0', '3A'=>'1',
						'4A'=>'2', '91'=>'3', '5D'=>'4', '7A'=>'5', '29'=>'6', 'BC'=>'7',
						'6E'=>'8', 'D4'=>'9', '40'=>':', '17'=>';', '2E'=>'<', 'CB'=>'=',
						'72'=>'>', '9C'=>'?', 'A1'=>'@', 'FF'=>'A', 'F3'=>'B', 'F8'=>'C', 
						'9B'=>'D', '50'=>'E', '51'=>'F', '6D'=>'G', 'E9'=>'H', '9A'=>'I',
						'B8'=>'J', '84'=>'K', 'A8'=>'L', '14'=>'M', '38'=>'N', 'CE'=>'O',
                        '92'=>'P', '5C'=>'Q', 'F5'=>'R', 'EE'=>'S',	'B3'=>'T', '89'=>'U',
						'7B'=>'V', 'A2'=>'W', 'AD'=>'X', '71'=>'Y', 'E3'=>'Z', 'D5'=>'[',
						'BF'=>'\\', '53'=>']', '28'=>'^', '44'=>'_', '33'=>'`', '48'=>'a',
						'DB'=>'b', 'FC'=>'c', '09'=>'d', '1F'=>'e', '94'=>'f', '12'=>'g',
						'73'=>'h', '37'=>'i', '82'=>'j', '81'=>'k', '39'=>'l', 'C2'=>'m',
						'8D'=>'n', '7D'=>'o', '08'=>'p', '4F'=>'q', 'B0'=>'r', 'FE'=>'s', 
						'79'=>'t', '0B'=>'u', 'D6'=>'v', '23'=>'w', '7C'=>'x', '4B'=>'y',
						'8E'=>'z', '06'=>'{', '5A'=>'|', 'CC'=>'}', '62'=>'~');
						
	for ($i = 0; $i < strlen($Password); $i++)
	{
		$Hex = sprintf("%02x", ord($Password[$i]));
        $Decode .= $DecTable[strtoupper($Hex)];
	}

    return $Decode;
}
function Encode_Password($Password)
{
    $EncTable = array('!'=>'95', '"'=>'88', '#'=>'9D', '$'=>'4C', '%'=>'F2', 
						'&'=>'3E', '\''=>'BB', '('=>'C0', ')'=>'7F', '*'=>'18', '+'=>'70', 
						','=>'A6', '-'=>'E2', '.'=>'EC', '/'=>'77', '0'=>'2C', '1'=>'3A',
						'2'=>'4A', '3'=>'91', '4'=>'5D', '5'=>'7A', '6'=>'29', '7'=>'BC',
						'8'=>'6E', '9'=>'D4', ':'=>'40', ';'=>'17', '<'=>'2E', '='=>'CB',
						'>'=>'72', '?'=>'9C', '@'=>'A1', 'A'=>'FF', 'B'=>'F3', 'C'=>'F8',
						'D'=>'9B', 'E'=>'50', 'F'=>'51', 'G'=>'6D', 'H'=>'E9', 'I'=>'9A',
						'J'=>'B8', 'K'=>'84', 'L'=>'A8', 'M'=>'14', 'N'=>'38', 'O'=>'CE',
						'P'=>'92', 'Q'=>'5C', 'R'=>'F5', 'S'=>'EE', 'T'=>'B3', 'U'=>'89',
						'V'=>'7B', 'W'=>'A2', 'X'=>'AD', 'Y'=>'71', 'Z'=>'E3', '['=>'D5',
						'\\'=>'BF', ']'=>'53', '^'=>'28', '_'=>'44', '`'=>'33', 'a'=>'48',
						'b'=>'DB', 'c'=>'FC', 'd'=>'09', 'e'=>'1F', 'f'=>'94', 'g'=>'12',
						'h'=>'73', 'i'=>'37', 'j'=>'82', 'k'=>'81', 'l'=>'39', 'm'=>'C2',
						'n'=>'8D', 'o'=>'7D', 'p'=>'08', 'q'=>'4F', 'r'=>'B0', 's'=>'FE',
						't'=>'79', 'u'=>'0B', 'v'=>'D6', 'w'=>'23', 'x'=>'7C', 'y'=>'4B',
						'z'=>'8E', '{'=>'06', '|'=>'5A', '}'=>'CC', '~'=>'62');
						
    $Encode = "0x";

    for ($i = 0; $i < strlen($Password); $i++)
        $Encode .= $EncTable[$Password[$i]];

    return $Encode;
}
//re captcha
function GetCaptcha()
{
	global $captcha_error;
	$captcha_error=null;
	return recaptcha_get_html($GLOBALS["settings"]["recaptcha"]["public"], $captcha_error);
}
function GetCaptchaResponse()
{
	return recaptcha_check_answer($GLOBALS["settings"]["recaptcha"]["private"],
		$_SERVER["REMOTE_ADDR"],
		$_POST["recaptcha_challenge_field"],
		$_POST["recaptcha_response_field"]);
}
function DisplayPage($page)
{
	global $smarty;
	// page contents
	$smarty->assign('content', $smarty->fetch('content/'.$page.'.tpl'));
	// display
	$smarty->display('index.tpl');
}
function str_ends_with($string, $test) {
    $strlen = strlen($string);
    $testlen = strlen($test);
    if ($testlen > $strlen) return false;
    return substr_compare($string, $test, -$testlen) === 0;
}
function GetServersStatus($admin)
{
	$servers = GetServers();
	$data = array();
	$i = 0;
	foreach($servers as $key => $value)
	{
		if(HasFeaturePermission("status",$admin,$value['SID']))
		{
			$value['Status'] = GetServerStatus($value['SID']);
			$data[$i] = $value;
			$i++;
		}
	}
	return $data;
}
function ServerOnline($ip,$port)
{
	$fp = @fsockopen ($ip, $port, $errno, $errstr, 5); 
	if ($fp) 
	{
		return 1;
	}
	else
	{	
		return 0;
	}
}
function GetServerStatus($sid)
{
	//select website database
	SelectWebsiteDB();
	//retrieve last update time and status from db
	$query = "SELECT * FROM ServerStatus WHERE [SID] = ".$sid;
	$result = mssql_query($query);
	$row = mssql_fetch_array($result);
	
	//get time difference
	$time_start = $row['Last_Update'];
	$time_end = microtime(true);

	$td = $time_end - $time_start;
	//check if its time to check the status again
	if($td >= $GLOBALS["settings"]["server_status"]["cache_time"])
	{
		//check status again
		$server = GetServer($sid);
		$status = ServerOnline($server["IP"],$server["Port"]);
		mssql_query("UPDATE ServerStatus SET [Status] = ".$status." WHERE [SID] = ".$sid);
		mssql_query("UPDATE ServerStatus SET [Last_Update] = ".microtime(true)." WHERE [SID] = ".$sid);
		return $status;
	}
	else
	{
		//if not return status
		return $row['Status'];
	}
}
function ArrayIsset($array)
{
	foreach($array as $key => $value)
	{
		if(!isset($_REQUEST[$value]))
		{
			return false;
		}
	}
	return true;
}
function UpdatePlayerFromForm($pid,$sid,$stats)
{
	SelectKalDB($sid);
	foreach($stats as $key => $value)
	{
		mssql_query("UPDATE Player SET [".$value."] = ".($_REQUEST[$value] + 0)." WHERE [PID] = ".$pid);
	}
}
?>