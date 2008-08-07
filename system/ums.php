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
		$cutoff=time()-86400;
		$db->query("DELETE FROM `{PREFIX}sessions` WHERE `time` <= $cutoff");
		return $user;
	}
	function load($id){
		global $db;
		//First the static variables
		$user['id']=$id;
		$user['name']=$db->getvalue('name','users','id',$id);
		$user['email']=$db->getvalue('email','users','id',$id);
		$user['group']=$db->getvalue('group','users','id',$id);
		//Dynamic stufffffff
		return $user;
		
	}
	function cansee($page){
		global $user, $db, $ums;
		$group=$user['group'];
		$result=$db->query("SELECT * FROM `{PREFIX}page_permissions` WHERE `page` = $page AND `group` = $group LIMIT 1");
		while($row=mysql_fetch_array($result)){
			$out=$row['cansee'];
		}
		return $out;
	}
}
$ums=new ums;
$user=$ums->init();
?>
