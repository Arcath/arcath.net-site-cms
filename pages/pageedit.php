<?php
function output(){
	global $editor, $db;
	$page=$_GET['page'];
	$out="<form action=\"pageeditsub\" method=\"POST\">
<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
<tr>
<td>Title:</td>
<td><input type=\"text\" name=\"title\" width=\"20\" maxchars=\"255\" value=\"".$db->getvalue('title','pages','sname',$page)."\" /></td>
</tr>
<tr>
<td>Short Name:</td>
<td><input type=\"text\" name=\"sname\" width=\"20\" maxchars=\"255\" value=\"$page\" /></td>
</tr>
<tr>
<td>File</td>
<td>NEED FANCY FILE LIST</td>
</tr>
<tr>
<td>Content:</td>
<td>".$editor->disp(70,15,'content',$db->getvalue('content','pages','sname',$page))."</td>
</tr>
</table>
</form>";
	return $out;
}
?>
