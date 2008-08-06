<?php
function topbox(){
	global $user;
	$out="<div class=\"topcont\">Welcome ".$user['name']."<br />";
	if($user['group']==0){
		
	}
	$out.="</div>";
	return $out;
}
?>
