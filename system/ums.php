<?php
//Arcath.net UMS
class ums{
	function init(){
		global $global;
		if(!isset($_COOKIE[$global['cookie']])){
			$user['group']=0;
			$user['name']="Guest";
		}else{
			//User Fetching here
		}
		//Session maintence
		return $user;
	}
}
$ums=new ums;
$user=$ums->init();
?>
