<?php
function output(){
	global $editor, $db;
	$out="<form action=\"?var=pagenewsub\" method=\"POST\">
<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
<tr>
<td>Title:</td>
<td><input type=\"text\" name=\"title\" width=\"20\" maxchars=\"255\" /></td>
</tr>
<tr>
<td>Short Name:</td>
<td><input type=\"text\" name=\"sname\" width=\"20\" maxchars=\"255\" /></td>
</tr>
<tr>
<td>File</td>
<td><select name=\"file\">\n";
	$used=0;
	$dir=opendir('pages/');
	while($file=readdir($dir)){
		if($file!="." && $file!=".."){
			$out.="<option value=\"$file\">$file</option>\n";
		}
	}
	$out.="<option value=\"\" $sel>Use Text Field</option>\n";
	closedir($dir);
	$out.="</select></td>
</tr>
<tr>
<td>Content:</td>
<td>".$editor->disp(70,15,'content','<b>Please select "Use Text Field" to use this box</b>')."</td>
</tr>
<tr>
<td>Permissions:</td>
<td><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
<tr>
<td></td>
<td>Can See?</td>
</tr>
<tr>
<td>Guests:</td>
<td><input type=\"checkbox\" name=\"0\" value=\"1\" $chk/></td>
</tr>\n";
$result=$db->query("SELECT * FROM `{PREFIX}groups` ORDER BY `name` ASC");
while($row=mysql_fetch_array($result)){
	$group=$row['id'];
	$out.="<tr>
<td>".$row['name']."</td>
<td><input type=\"checkbox\" name=\"".$row['id']."\" value=\"1\" /></td>
</tr>\n";
}
$out.="</table></td>
</tr>
<tr>
<td></td>
<td><input type=\"submit\" value=\"Save\"></td>
</tr>
</table>
</form>";
	return $out;
}
?>
