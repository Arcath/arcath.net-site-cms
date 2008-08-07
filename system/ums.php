<?php
//Arcath.net UMS
class ums{
	function init(){
		global $global, $db, $ums;
		if(!isset($_COOKIE[$global['cookie']])){
			$user['group']=0;
			$user['name']="Guest";
		}else{
			//User Fetching here
			$userid=$db->getvalue('user','sessions','hash',$_COOKIE[$global['cookie']]);
			$user=$ums->load($userid);
			$hash=$_COOKIE[$global['cookie']];
			setcookie($global['cookie'],$_COOKIE[$global['cookie']],time()+86400);
			$db->query("UPDATE `{PREFIX}sessions` SET `time` = '".time()."' WHERE `hash` = '$hash'");
		}
		//Session maintence
		return $user;
	}
	function load($id){
		global $db;
		//First the static variables
		$user['name']=$db->getvalue('name','users','id',$id);
		$user['email']=$db->getvalue('email','users','id',$id);
		$user['group']=$db->getvalue('group','users','id',$id);
		//Dynamic stufffffff
		return $user;
		
	}
}
$ums=new ums;
$user=$ums->init();
?>
