<?php
function topbox(){
	global $user;
	$out="<div class=\"topcont\">Welcome ".$user['name']."<br />";
	if($user['group']==0){
		$out.="<form action=\"?var=loginsub\" method=\"POST\"><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
<tr>
<td>Username:</td>
<td><input type=\"text\" name=\"uname\" width=\"20\" maxchars=\"255\" /></td>
</tr>
<tr>
<td>Password</td>
<td><input type=\"password\" name=\"pass\" width=\"20\" maxchars=\"255\" /><input type=\"submit\" value=\"Login\" /></td>
</tr>
</table></form>";
	}
	$out.="</div>";
	return $out;
}
?>
