<?php
function output(){
	global $editor, $db;
	$page=$_GET['page'];
	$out="<form action=\"?var=pageeditsub\" method=\"POST\">
<input type=\"hidden\" name=\"osname\" value=\"$page\" />
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
<td><select name=\"file\">\n";
	$used=0;
	$dir=opendir('pages/');
	while($file=readdir($dir)){
		if($file!="." && $file!=".."){
			if($file==$db->getvalue('file','pages','sname',$page)){
				$sel="SELECTED";
				$used=1;
			}else{
				$sel="";
			}
			$out.="<option value=\"$file\" $sel>$file</option>\n";
		}
	}
	if($used==0){
		$sel="SELECTED";
	}else{
		$sel="";
	}
	$out.="<option value=\"\" $sel>Use Text Field</option>\n";
	closedir($dir);
	$out.="</select></td>
</tr>
<tr>
<td>Content:</td>
<td>".$editor->disp(70,15,'content',$db->getvalue('content','pages','sname',$page))."</td>
</tr>
<tr>
<td>Permissions:</td>
<td><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
<tr>
<td></td>
<td>Can See?</td>
</tr>
<tr>
<td>Guests:</td>\n";
$pageid=$db->getvalue('id','pages','sname',$page);
$result=$db->query("SELECT * FROM `{PREFIX}page_permissions` WHERE `page` = '$pageid' AND `group` = '0' LIMIT 1");
while($row=mysql_fetch_array($result)){
	if($row['cansee']==1){
		$chk="CHECKED";
	}else{
		$chk="";
	}
}
$out.="<td><input type=\"checkbox\" name=\"0\" value=\"1\" $chk/></td>
</tr>\n";
$result=$db->query("SELECT * FROM `{PREFIX}groups` ORDER BY `name` ASC");
while($row=mysql_fetch_array($result)){
	$group=$row['id'];
	$result2=$db->query("SELECT * FROM `{PREFIX}page_permissions` WHERE `page` = '$pageid' AND `group` = '$group' LIMIT 1");
	while($row2=mysql_fetch_array($result2)){
	        if($row2['cansee']==1){
        	        $chk="CHECKED";
	        }else{
        	        $chk="";
	        }
	}
	$out.="<tr>
<td>".$row['name']."</td>
<td><input type=\"checkbox\" name=\"".$row['id']."\" value=\"1\" $chk/></td>
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
