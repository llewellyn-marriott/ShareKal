<?php
include("reborn/ars.class.php");
$errors = array(
	0 => "No Errors",
	1 => "You cannot reborn any more.",
	2 => "You do not meet level requirements.",
	3 => "Could not find player.",
	4 => "Your account is logged in to game, please logout.",
	5 => "ARS has an invalid license."
	);
	
$messages = array();
function AddResponseMessage($message)
{
	global $messages;
	$messages[count($messages)] = $message;
}

SetPageName("Reborn");
if(isset($_REQUEST['pid']) && isset($_REQUEST['sid']))
{
	$pid = $_REQUEST['pid']+0;
	$player = GetPlayer($pid,$sid);
	$server = GetServer($sid);
	if($player['UID'] == $current_user['UID'])
	{
		$reborn = new Reborn();
		$reborn->Connect($GLOBALS['settings']['mssql']['host'],$GLOBALS['settings']['mssql']['username'],$GLOBALS['settings']['mssql']['password']);
		$reborn->SetRebornDB($GLOBALS['settings']['reborn']['db']);
		$reborn->SetKalDB($server['kal_db']);
		$reborn->SetKalAuth($GLOBALS['settings']['mssql']['kal_auth']);
		
		$reborn->LoadPlayer($pid);
		
		if($reborn->DoReborn())
		{
			// message types
			//0 = skill upgraded
			//1 = skill not upgraded
			//2 = new prefix
			//3 = new suffix
			//4 = moved location
			//5 = new hair
			//6 = new face
			//7 = new guild
			//8 = new job
			//9 = new level
			
			foreach($reborn->Messages as $key => $value)
			{
				switch($value['type'])
				{
					case 0:
					AddResponseMessage("Your Skill ".$SkillNames[$reborn->Player['Class']][$value['value']]." has been upgraded");
					break;
					case 1:
					AddResponseMessage("Your Skill ".$SkillNames[$reborn->Player['Class']][$value['value']]." was not upgraded");
					break;
					case 2:
					AddResponseMessage("You have a new prefix: ".$value['value']."");
					break;
					case 3:
					AddResponseMessage("You have a new suffix: ".$value['value']."");
					break;
					case 4:
					AddResponseMessage("You have moved location");
					break;
					case 5:
					AddResponseMessage("You have a new hair style");
					break;
					case 6:
					AddResponseMessage("You have a new look");
					break;
					case 7:
					AddResponseMessage("You have joined a new guild");
					break;
					case 8:
					AddResponseMessage("You have a new job");
					break;
					case 9:
					AddResponseMessage("You have been reborn at a new level");
					break;
				}
			}
			$smarty->Assign("messages",$messages);
			DisplayContinue($messages,$GLOBALS["settings"]["site"]["root"]."/board/player/view?pid=".$pid."&sid=".$sid);
		}
		else
		{
			$error = $errors[$reborn->GetLastError()];
			DisplayRedirect(3000,$GLOBALS["settings"]["site"]["root"]."/board/player/view?pid=".$pid."&sid=".$sid,$error);
		}
	}
	else
	{
		DisplayPermissionError();
	}
}
else
{
	DisplayPermissionError();
}
?>