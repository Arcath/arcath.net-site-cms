<?php
function output(){
	global $db, $ums, $user;
	$code=captcha(5);
	$out="<form action=\"?var=regsub\" method=\"POST\">
<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
<tr>
<td>Username:</td>
<td><input type=\"text\" name=\"uname\" width=\"20\" maxchars=\"255\" /></td>
</tr>
<tr>
<td>Password:</td>
<td><input type=\"password\" name=\"pass1\" width=\"20\" maxchars=\"255\" /></td>
</tr>
<tr>
<td>Confirm Password:</td>
<td><input type=\"password\" name=\"pass2\" width=\"20\" maxchars=\"255\" /></td>
</tr>
<tr>
<td>Email:</td>
<td><input type=\"text\" name=\"email1\" width=\"20\" maxchars=\"255\" /></td>
</tr>
<tr>
<td>Confirm Email:</td>
<td><input type=\"text\" name=\"email2\" width=\"20\" maxchars=\"255\" /></td>
</tr>
<tr>
<td><img src=\"images/verify.jpeg\" /></td>
<td>Verification Code:<br />
<input type=\"text\" name=\"code\" width=\"20\" maxchars=\"255\" /></td>
</tr>
<tr>
<td></td>
<td><input type=\"submit\" value=\"Register\" /></td>
</tr>
</table>
</font>";
	$_SESSION['code']=$code;
	return $out;
}
?>
